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