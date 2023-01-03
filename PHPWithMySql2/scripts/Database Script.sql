-- Must run this script as the root user.

DROP DATABASE IF EXISTS globe_bank;
CREATE DATABASE globe_bank;

DROP USER IF EXISTS 'globeBankAdmin'@'localhost';
CREATE USER 'globeBankAdmin'@'localhost'
IDENTIFIED BY 'globe_bank01!';
GRANT ALL PRIVILEGES ON globe_bank.* -- .* means all tables
TO 'globeBankAdmin'@'localhost';

SHOW PRIVILEGES; -- Shows all the privileges
SHOW GRANTS FOR 'globeBankAdmin'@'localhost';

-- Revokes all privileges
-- REVOKE ALL PRIVILEGES, 
-- GRANT OPTION
-- FROM 'globeBankAdmin'@'localhost';
