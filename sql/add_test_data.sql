INSERT INTO Gamemaster (name, password, moderator) VALUES ('heikkihei', 'tsohasalasana', TRUE);
INSERT INTO Gamemaster (name, password, moderator) VALUES ('kayttaja', 'salasana', FALSE);
INSERT INTO Gamemaster (name, password, moderator) VALUES ('moderator', 'moderator', TRUE);

\copy Name (name) FROM '/home/heikkiah/htdocs/webmonster/assets/name.txt'
\copy CreatureClass (name, description) FROM '/home/heikkiah/htdocs/webmonster/assets/class.txt' WITH DELIMITER ','
\copy Race (name, description) FROM '/home/heikkiah/htdocs/webmonster/assets/race.txt' WITH DELIMITER ',' 
\copy Weapon (name, description, minDamage, maxDamage) FROM '/home/heikkiah/htdocs/webmonster/assets/weapon.txt' WITH DELIMITER ','

INSERT INTO Creature (owner_id, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES (1, 'Brogan Hahn', 'Skaab', 'Barbarian', 1, 8, 7, 8, 4, 4, 4, 15);		
 INSERT INTO Creature (owner_id, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES (1, 'Todd Siegler', 'Skeleton', 'Bard', 1, 10, 10, 10, 10, 10, 10, 15);		
 		
 INSERT INTO Creature (owner_id, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES (2, 'Guy Harrison', 'Kenku', 'Druid', 2, 10, 10, 10, 10, 10, 10, 15);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 8);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 10);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 20);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 30);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (3, 30);
