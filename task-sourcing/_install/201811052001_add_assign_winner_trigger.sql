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