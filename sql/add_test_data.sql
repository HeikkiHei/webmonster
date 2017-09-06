INSERT INTO Gamemaster (name, password, moderator) VALUES ('heikkihei', 'tsohasalasana', TRUE);
INSERT INTO Gamemaster (name, password, moderator) VALUES ('kayttaja', 'salasana', FALSE);
INSERT INTO Gamemaster (name, password, moderator) VALUES ('moderator', 'moderator', TRUE);

\copy Name (name) FROM '/home/heikkiah/htdocs/webmonster/name.txt'
\copy CreatureClass (name, description) FROM '/home/heikkiah/htdocs/webmonster/class.txt' WITH DELIMITER ','
\copy Race (name, description) FROM '/home/heikkiah/htdocs/webmonster/race.txt' WITH DELIMITER ',' 
\copy Weapon (name, description, minDamage, maxDamage) FROM '/home/heikkiah/htdocs/webmonster/weapon.txt' WITH DELIMITER ','

INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 8);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 10);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 20);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 30);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (3, 30);
