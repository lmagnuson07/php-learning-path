USE globe_bank;

DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  username VARCHAR(255),
  hashed_password VARCHAR(255),
  PRIMARY KEY (id)
  -- KEY `index_username` (`username`) -- adds an index
);

ALTER TABLE admins 
ADD INDEX index_username (username);

-- can create indexes and specify HASH or BTREE. BTREE is the default
-- CREATE INDEX index_username on admins(username) using HASH; -- storage engine does not support hash index.
-- CREATE INDEX index_username on admins(username) using BTREE;
-- SHOW INDEX FROM admins;

-- Add test records
-- INSERT INTO admins
-- 	(first_name, last_name, email, username, hashed_password)
-- VALUES
-- 	('Logan', 'Magnuson', 'logmagns07@gmail.com', 'logmagns07', 'mypassword'),
--     ('Steve', 'French', 'stevefrench06@mail.com', 'stevefrench06', 'coolpassword'),
--     ('John', 'Doe', 'johndoe12@mail.ca', 'johndoe12', 'johndoepassword');
-- SELECT * FROM admins;

