/* Up
*/
ALTER TABLE users 
  ADD balance integer DEFAULT 0 NOT NULL;


/* Down
ALTER TABLE users
  DROP COLUMN balance;
*/