CREATE TABLE users (
  email    VARCHAR(60) PRIMARY KEY,
  password VARCHAR(60)  NOT NULL,
  name     VARCHAR(40) NOT NULL,
  is_admin BOOL DEFAULT FALSE
);