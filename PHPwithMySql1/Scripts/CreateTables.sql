USE globe_bank;
-- SHOW TABLES;
-- SHOW FIELDS FROM subjects;
-- SHOW COLUMNS FROM subjects;
DROP TABLE subjects;
CREATE TABLE subjects (
	id INT NOT NULL AUTO_INCREMENT,
    menu_name VARCHAR(255),
    position INT,
    visible TINYINT,
    PRIMARY KEY (id)
);
 