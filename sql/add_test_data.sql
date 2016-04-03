INSERT INTO Gamemaster (name, password) VALUES ('heikkihei', 'tsohasalasana');
INSERT INTO Gamemaster (name, password) VALUES ('kayttaja', 'salasana');

INSERT INTO Name (name, description) VALUES ('Pekka', 'Perinteinen suomalainen mies');
INSERT INTO Name (name, description) VALUES ('Maija', 'Perinteinen suomalainen nainen');

INSERT INTO CreatureClass (name, description) VALUES ('Ritari', 'Kiiltävä haarinska');
INSERT INTO CreatureClass (name, description) VALUES ('Maanviljelijä', 'Ei niin kiiltävä');

INSERT INTO Race (name, description) VALUES ('Örkki', 'Vihreä ja pieni');
INSERT INTO Race (name, description) VALUES ('Jättiläinen', 'Ruskea ja iso');

INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Miekka', 'Iso ja terävä', 2, 12);
INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Lapio', 'Hidas ja painava', 1, 4);
INSERT INTO Weapon (name, description, minDamage, maxDamage) VALUES ('Vasara', 'Sepän työkalu', 1, 10);

INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
					(1, 1, 1, 2, 1, 8, 7, 8, 4, 4, 4, 15);
INSERT INTO Creature (owner, name, race, creatureClass, level, strength, dexterity, constitution, intelligence, wisdom, charisma, hitpoints) VALUES
					(1, 2, 2, 1, 1, 10, 10, 10, 10, 10, 10, 15);


INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (1, 2);

INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 1);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 2);
INSERT INTO Inventory (creature_id, weapon_id) VALUES (2, 3);

