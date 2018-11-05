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