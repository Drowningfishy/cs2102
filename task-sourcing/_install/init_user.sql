CREATE TABLE users (
  email    VARCHAR(126) PRIMARY KEY,
  password VARCHAR(60)  NOT NULL,
  name     VARCHAR(256) NOT NULL,
  is_admin BOOL DEFAULT FALSE
);