-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Gamemaster (
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
password varchar(50) NOT NULL
);

CREATE TABLE Name (
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
description varchar(200) NOT NULL
);

CREATE TABLE CreatureClass (
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
description varchar(200) NOT NULL
);

CREATE TABLE Race (
id SERIAL PRIMARY KEY,
name varchar(50) NOT NULL,
description varchar(200) NOT NULL
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
owner int REFERENCES Gamemaster(id) NOT NULL,
name varchar(50) NOT NULL,
race varchar(50) NOT NULL,
creatureClass varchar(50) NOT NULL,
level int NOT NULL,
weapon varchar(50) NOT NULL,
strength int NOT NULL,
dexterity int NOT NULL,
constitution int NOT NULL,
intelligence int NOT NULL,
wisdom int NOT NULL,
charisma int NOT NULL,
hitpoints int NOT NULL
);