DROP VIEW IF EXISTS maxPoint;
DROP VIEW IF EXISTS minPoint;
DROP VIEW IF EXISTS typeNumber;
DROP VIEW IF EXISTS getAssigned;
DROP VIEW IF EXISTS getBidedTasks;


CREATE VIEW maxPoint AS
SELECT b.task_id AS task_id, b.bidding_point AS Max
FROM bids b, tasks_owned t
WHERE b.bidding_point >= ANY (SELECT bidding_point FROM bids) AND t.task_id = b.task_id;

CREATE VIEW minPoint AS
SELECT b.task_id AS task_id, b.bidding_point AS Min
FROM bids b, tasks_owned t
WHERE b.bidding_point <= ANY(SELECT bidding_point FROM bids) AND t.task_id = b.task_id;

CREATE VIEW typeNumber AS
SELECT task_type,COUNT(*) AS num
FROM tasks_owned 
GROUP BY task_type
ORDER BY task_type;

CREATE VIEW getAssigned AS
SELECT t.task_id, t.task_name, t.expect_point, t.description, t.task_type, t.owner_email, b.bidding_point AS my_bid, a.assignee_email
FROM tasks_owned t
INNER JOIN assign a ON t.task_id = a.task_id
INNER JOIN bids b ON b.task_id = t.task_id AND a.assignee_email = b.bidder_email;

CREATE VIEW getBidedTasks AS
SELECT t.task_id, t.task_name, b.bidder_email,t.expect_point, t.description, t.task_type, t.owner_email, b.bidding_point AS my_bid 
FROM tasks_owned t, bids b 
WHERE t.task_id = b.task_id;