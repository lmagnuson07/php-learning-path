USE globe_bank;

DROP TABLE IF EXISTS pages;
DROP TABLE IF EXISTS subjects;
CREATE TABLE subjects (
	id INT NOT NULL AUTO_INCREMENT,
    menu_name VARCHAR(255),
    position INT,
    visible TINYINT,
    PRIMARY KEY (id)
);

INSERT INTO subjects
	(menu_name, position, visible)
VALUES
	('About Globe Bank', 1, 1),
    ('Consumer', 2, 1),
    ('Small Business', 3, 0),
    ('Commercial', 4, 1);
SELECT * FROM subjects;
    
    
    