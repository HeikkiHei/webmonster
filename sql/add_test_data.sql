INSERT INTO Gamemaster (name, password, moderator) VALUES ('heikkihei', 'tsohasalasana', TRUE);
INSERT INTO Gamemaster (name, password, moderator) VALUES ('kayttaja', 'salasana', FALSE);




/*
INSERT INTO Name (name, description) VALUES ('Pekka', 'Perinteinen suomalainen mies');
INSERT INTO Name (name, description) VALUES ('Maija', 'Perinteinen suomalainen nainen');

INSERT INTO Race (name, description) VALUES ('Örkki', 'Vihreä ja pieni');
INSERT INTO Race (name, description) VALUES ('Jättiläinen', 'Ruskea ja iso');
*/
\copy Name (name) FROM '/home/heikkiah/htdocs/webmonster/name.txt'


\copy CreatureClass (name, description) FROM '/home/heikkiah/htdocs/webmonster/class.txt' WITH DELIMITER ','
\copy Race (name, description) FROM '/home/heikkiah/htdocs/webmonster/race.txt' WITH DELIMITER ',' 


INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Miekka', 'Iso ja terävä', 2, 12);
INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Lapio', 'Hidas ja painava', 1, 4);
INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Vasara', 'Sepän työkalu', 1, 10);

INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
('heikkihei', 'Brogan Hahn', 'Skaab', 'Barbarian', 1, 8, 7, 8, 4, 4, 4, 15);
INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
('heikkihei', 'Todd Siegler', 'Skeleton', 'Bard', 1, 10, 10, 10, 10, 10, 10, 15);

INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
('kayttaja', 'Guy Harrison', 'Kenku', 'Druid', 2, 10, 10, 10, 10, 10, 10, 15);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 2);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 2);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 3);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (3, 3);