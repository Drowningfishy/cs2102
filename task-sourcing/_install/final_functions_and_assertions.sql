CREATE OR REPLACE FUNCTION pointTransfer(valToAdd NUMERIC, bidder_email VARCHAR(255), owner_email VARCHAR(255))
RETURNS BOOLEAN AS $$
DECLARE bidder_point NUMERIC;
BEGIN
SELECT u.bidding_point_balance INTO bidder_point FROM users u WHERE u.email = bidder_email;
IF (bidder_point-valToAdd)>=0 THEN 
UPDATE users SET bidding_point_balance = bidding_point_balance - valToAdd WHERE email = bidder_email;
UPDATE users SET bidding_point_balance = bidding_point_balance + valToAdd WHERE email = owner_email;
RETURN TRUE;
ELSE
RETURN FALSE;
END IF;
END; $$
LANGUAGE PLPGSQL;

CREATE OR REPLACE FUNCTION advancedSearch(query TEXT, 
  OUT task_id NUMERIC, OUT task_name VARCHAR(255), OUT expect_point NUMERIC,
  OUT description VARCHAR(255), OUT owner_email VARCHAR(255), OUT relation VARCHAR(255))
RETURNS SETOF RECORD AS
$$
DECLARE
  v_rec RECORD;
  cur_tasks CURSOR FOR SELECT * FROM tasks_owned;
  rec_task RECORD;
  cur_bids CURSOR(bid_task_id NUMERIC) FOR SELECT * FROM bids WHERE bids.task_id = bid_task_id;
  val_found BOOL;
  rec_bid RECORD;
BEGIN
  OPEN cur_tasks;
  LOOP
    FETCH cur_tasks INTO rec_task;
    EXIT WHEN NOT FOUND;
    val_found := FALSE;
    IF rec_task.task_name LIKE '%' || query || '%' THEN
      relation := 'Task name: ' || REPLACE(rec_task.task_name, query, '<b>' || query || '</b>');
      val_found := TRUE;
    ELSIF rec_task.description LIKE '%' || query || '%' THEN
      relation := 'Task description: ' || REPLACE(rec_task.description, query, '<b>' || query || '</b>');
      val_found := TRUE;
    ELSIF rec_task.owner_email = query THEN
      relation := 'Task owner: ' || '<b>' || rec_task.owner_email || '</b>';
      val_found := TRUE;
    ELSE
      OPEN cur_bids(rec_task.task_id);
      LOOP
        FETCH cur_bids INTO rec_bid;
        EXIT WHEN NOT FOUND;

        IF rec_bid.bidder_email = query THEN
          relation := 'Task Bidder: ' || '<b>' || rec_bid.bidder_email || '</b>';
          val_found := TRUE;
          EXIT;
        END IF;
      END LOOP;
      CLOSE cur_bids;
    END IF;
    IF val_found THEN
      task_id := rec_task.task_id;
      task_name := rec_task.task_name;
      expect_point := rec_task.expect_point;
      description := rec_task.description;
      owner_email := rec_task.owner_email;
      RETURN NEXT;
    END IF;
  END LOOP;
END;
$$
language plpgsql;

CREATE OR REPLACE FUNCTION bid_insert_assertion() RETURNS TRIGGER AS $bid$  
DECLARE
  task_expect_point NUMERIC;
  user_point NUMERIC;
    BEGIN  
        SELECT t.expect_point INTO task_expect_point FROM tasks_owned t WHERE t.task_id = NEW.task_id;
        SELECT u.bidding_point_balance INTO user_point FROM users u WHERE u.email = NEW.bidder_email;
        IF NEW.bidding_point < task_expect_point OR NEW.bidding_point > user_point THEN
          RAISE EXCEPTION 'Error: Bidding point need be greater than expected point!';
        ELSE
          RETURN NEW; 
        END IF;
    END;  
$bid$  
LANGUAGE plpgsql;

CREATE TRIGGER bid_assertion BEFORE INSERT OR UPDATE
ON bids FOR EACH ROW
EXECUTE PROCEDURE bid_insert_assertion();

CREATE OR REPLACE FUNCTION assign_winner_assertion_func() RETURNS TRIGGER AS $winner_ref$  
DECLARE
  value_to_add NUMERIC;
  owner_email VARCHAR(255);
    BEGIN  
        SELECT b.bidding_point INTO value_to_add FROM bids b WHERE b.task_id = NEW.task_id AND b.bidder_email = NEW.assignee_email;
        SELECT t.owner_email INTO owner_email FROM tasks_owned t WHERE t.task_id = NEW.task_id;
        IF pointTransfer(value_to_add, NEW.assignee_email, owner_email) THEN
          RETURN NEW;
        ELSE
          RAISE EXCEPTION 'Error: User has insufficent balance!';
        END IF;
    END;  
$winner_ref$  
LANGUAGE plpgsql;

CREATE TRIGGER assign_winner_assertion BEFORE INSERT
ON assign FOR EACH ROW
EXECUTE PROCEDURE assign_winner_assertion_func();

CREATE OR REPLACE FUNCTION modify_task_assertion_func() RETURNS TRIGGER AS $task_ref$  
DECLARE
  winner NUMERIC;
    BEGIN  
        SELECT count(*) INTO winner FROM assign a WHERE a.task_id = OLD.task_id;
        IF winner > 0 THEN
          RAISE EXCEPTION 'Error: The task is assigned!';
        ELSE
          IF TG_OP = 'UPDATE' THEN
            RETURN NEW;
          ELSE
            RETURN OLD;
          END IF;
        END IF;
    END;  
$task_ref$  
LANGUAGE plpgsql;

CREATE TRIGGER modify_task_assertion BEFORE UPDATE OR DELETE
ON tasks_owned FOR EACH ROW
EXECUTE PROCEDURE modify_task_assertion_func();