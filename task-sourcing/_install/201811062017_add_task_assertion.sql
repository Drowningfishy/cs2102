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