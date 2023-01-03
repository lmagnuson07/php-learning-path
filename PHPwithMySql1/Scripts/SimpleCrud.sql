USE globe_bank;
-- SHOW TABLES;
-- SELECT * FROM subjects;

-- -------------- Insert ---------------------------
-- INSERT INTO subjects
-- 	(id, menu_name, position, visible)
-- VALUES
-- 	(1, 'About Globe Bank', 1, 1);
-- SELECT * FROM subjects;

-- INSERT INTO subjects
-- 	(menu_name, position, visible)
-- VALUES
-- 	('Consumer', 2, 1);
-- SELECT * FROM subjects;

-- INSERT INTO subjects
-- 	(menu_name, position, visible)
-- VALUES
-- 	('Small Business', 3, 1);
-- SELECT * FROM subjects;
-- SELECT * FROM subjects WHERE position=3 AND visible =1;

-- -------------- Update -----------------------
-- UPDATE subjects 
-- SET position='3', visible='0' WHERE id=3;
-- SELECT * FROM subjects;

-- ----------------- Delete -----------------
-- INSERT INTO subjects
-- 	(menu_name, position, visible)
-- VALUES
-- 	('Junk', 3, 1);
-- SELECT * FROM subjects;

-- DELETE FROM subjects
-- WHERE id=4 LIMIT 1; -- Limits the delete to one record
-- SELECT * FROM subjects;

-- ----------- Add an index to a tables foreign key -----------------
-- ALTER TABLE table
-- ADD INDEX index_name (column);