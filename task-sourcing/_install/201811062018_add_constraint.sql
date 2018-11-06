ALTER TABLE tasks_owned ADD CONSTRAINT no_expect_smaller_than_0 CHECK(expect_point>=0);

ALTER TABLE bids ADD CONSTRAINT no_bid_smaller_than_0 CHECK(bidding_point>=0);