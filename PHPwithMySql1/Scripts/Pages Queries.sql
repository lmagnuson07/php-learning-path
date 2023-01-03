USE globe_bank;

DROP TABLE IF EXISTS pages;
CREATE TABLE pages (
	id INT NOT NULL AUTO_INCREMENT,
    subject_id INT,
    menu_name VARCHAR(255),
    position INT,
    visible TINYINT,
    content TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);
ALTER TABLE pages
ADD INDEX fk_subject_id (subject_id);

INSERT INTO pages
	(subject_id, menu_name, position, visible, content)
VALUES
	(1, 'Globe Bank', 1, 1, null),
	(1, 'History', 2, 1, null),
    (1, 'Leadership', 3, 1, null),
    (1, 'Contact Us', 4, 1, null),
    (2, 'Banking', 1, 1, null),
    (2, 'Credit Cards', 2, 1, null),
    (2, 'Mortages', 3, 1, null),
    (3, 'Checking', 1, 1, null),
    (3, 'Loans', 2, 1, null),
    (3, 'Merchant Services', 3, 1, null);
SELECT * FROM pages;





