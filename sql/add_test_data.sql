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

INSERT INTO Creature (name, race, creatureClass, level, weapon, strength, dexterity, constitution, intelligence, wisdom, charisma) VALUES
					('Martti','Ihminen', 'Seppä', 1,  'Vasara', 8, 7, 8, 4, 4, 4);
INSERT INTO Creature (name, race, creatureClass, level, weapon, strength, dexterity, constitution, intelligence, wisdom, charisma) VALUES
					('Maija', 'Jättiläinen', 'Ritari', 1, 'Miekka', 10, 10, 10, 10, 10, 10);


