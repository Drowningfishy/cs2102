/*
  Author: Dai Xinru, Ma Yueqing
  Note: Drop everything before init database
*/
DROP TABLE IF EXISTS assign;
DROP TABLE IF EXISTS bids;
DROP TABLE IF EXISTS tasks_owned;
DROP TABLE IF EXISTS users;

CREATE SEQUENCE rank_id_seq;
CREATE	TABLE	users	(	
name	varchar(255)	NOT	NULL,	
email	varchar(255)	PRIMARY	KEY,	
password	varchar(255)	NOT	NULL,	
bidding_point_balance	NUMERIC	DEFAULT	600.00,
is_admin BOOL DEFAULT FALSE);	
	
CREATE	TABLE	tasks_owned	(	
task_id	NUMERIC	PRIMARY	KEY default nextval('rank_id_seq'),	
task_name	VARCHAR(255)	NOT	NULL,	
expect_point	NUMERIC	DEFAULT	0.00,	
description	VARCHAR(255),	
owner_email	VARCHAR(255)	NOT	NULL,	
FOREIGN	KEY(owner_email)	REFERENCES	users(email));		

ALTER SEQUENCE rank_id_seq owned by tasks_owned.task_id;

CREATE	TABLE	bids	(	
task_id	NUMERIC	NOT	NULL,	
bidder_email	VARCHAR(255)	NOT	NULL,	
bidding_point	NUMERIC	NOT	NULL,	
PRIMARY	KEY(task_id,bidder_email),	
FOREIGN	KEY(bidder_email)	REFERENCES	users(email),	
FOREIGN	KEY(task_id)	REFERENCES	tasks_owned(task_id));		
	
CREATE	TABLE	assign	(	
time	DATE	NOT	NULL,	
task_id	NUMERIC	PRIMARY	KEY,	
assignee_email	VARCHAR(255)	NOT	NULL,	
FOREIGN	KEY(task_id)	REFERENCES	tasks_owned(task_id),	
FOREIGN	KEY(assignee_email)	REFERENCES	users(email));	