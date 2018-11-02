
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

