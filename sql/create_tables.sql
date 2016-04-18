-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Gamemaster (
	id SERIAL PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL,
	password varchar(50) NOT NULL,
	moderator boolean NOT NULL
);

CREATE TABLE Name (
	id SERIAL PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL
);

CREATE TABLE CreatureClass (
	id SERIAL PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL,
	description varchar(200) NOT NULL
);

CREATE TABLE Race (
	id SERIAL PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL,
	description varchar(2000) NOT NULL
);

CREATE TABLE Weapon (
	id SERIAL PRIMARY KEY,
	name varchar(50) NOT NULL,
	description varchar(200) NOT NULL,
	minDamage int NOT NULL,
	maxDamage int NOT NULL
);

CREATE TABLE Creature (
	id SERIAL PRIMARY KEY,
	owner_id int REFERENCES Gamemaster(id) NOT NULL,
	name varchar(50) REFERENCES Name(name) NOT NULL,
	race varchar(50)REFERENCES Race(name) NOT NULL,
	creatureClass varchar(50) REFERENCES CreatureClass(name) NOT NULL,
	level int NOT NULL,
	strength int NOT NULL,
	dexterity int NOT NULL,
	constitution int NOT NULL,
	intelligence int NOT NULL,
	wisdom int NOT NULL,
	charisma int NOT NULL,
	hitpoints int NOT NULL
);

CREATE TABLE Inventory (
	creature_id INTEGER REFERENCES Creature(id) ON DELETE CASCADE NOT NULL ,
	weapon_id INTEGER REFERENCES Weapon(id) ON DELETE CASCADE NOT NULL 
);