CREATE OR REPLACE FUNCTION bid_insert_assertion() RETURNS TRIGGER AS $bid$  
DECLARE
  task_expect_point NUMERIC;
    BEGIN  
        SELECT u.expect_point INTO task_expect_point FROM tasks_owned t WHERE t.task_id = NEW.task_id;
        IF NEW.bidding_point < task_expect_point THEN
          RAISE EXCEPTION 'Error: Bidding point need be greater than expected point!';
        ELSE
          RETURN NEW; 
        END IF;
    END;  
$bid$  
LANGUAGE plpgsql;

CREATE TRIGGER bid_assertion BEFORE INSERT UPDATE
ON tasks_owned FOR EACH ROW
EXECUTE PROCEDURE bid_insert_assertion();