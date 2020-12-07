CREATE DATABASE Konyvtar;
USE Konyvtar;

CREATE TABLE Olvasok(Olvasojegy_azonosito CHAR(8) PRIMARY KEY,
Felhasznaloi_nev VARCHAR(40) NOT NULL,
Jelszo CHAR(40) NOT NULL,
Tagsag_ervenyesseg DATE NOT NULL,
Csaladi_nev VARCHAR(40) NOT NULL,
Utonev VARCHAR(40) NOT NULL,
Szuletesi_csaladi_nev VARCHAR(40),
Szuletesi_utonev VARCHAR(40),
Szuletesi_hely VARCHAR(40) NOT NULL,
Szuletesi_datum DATE NOT NULL,
Anyja_szuletesi_csaladi_neve VARCHAR(40) NOT NULL,
Anyja_szuletesi_utoneve VARCHAR(40) NOT NULL,
Lakcim_iranyitoszam INTEGER NOT NULL,
Lakcim_varos VARCHAR(40) NOT NULL,
Lakcim_utca VARCHAR(40) NOT NULL,
Lakcim_hazszam VARCHAR(40) NOT NULL,
Telefonszam CHAR(11),
Email VARCHAR(40));

CREATE TABLE Konyvek(ISBN VARCHAR(13) PRIMARY KEY,
Szerzok VARCHAR(200) NOT NULL,
Cim VARCHAR(50) NOT NULL,
Kiado VARCHAR(50),
Kiadasi_ev INTEGER,
Cutter VARCHAR(10),
ETO_jelzet VARCHAR(10),
Oldalak_szama INTEGER,
Targyszavak VARCHAR(100));

CREATE TABLE Peldanyok(Azonosito CHAR(13) PRIMARY KEY,
ISBN VARCHAR(13) NOT NULL REFERENCES Konyv(ISBN),
Leltarbavetel_datuma DATE NOT NULL,
Megjegyzes VARCHAR(100));

CREATE TABLE Konyvtarosok(Felhasznaloi_nev VARCHAR(20) PRIMARY KEY,
Jelszo CHAR(40) NOT NULL,
Csaladi_nev VARCHAR(40) NOT NULL,
Utonev VARCHAR(40) NOT NULL,
Szuletesi_csaladi_nev VARCHAR(40),
Szuletesi_utonev VARCHAR(40),
Szuletesi_hely VARCHAR(40) NOT NULL,
Szuletesi_datum DATE NOT NULL,
Anyja_szuletesi_csaladi_neve VARCHAR(40) NOT NULL,
Anyja_szuletesi_utoneve VARCHAR(40) NOT NULL,
Lakcim_iranyitoszam INTEGER NOT NULL,
Lakcim_varos VARCHAR(40) NOT NULL,
Lakcim_utca VARCHAR(40) NOT NULL,
Lakcim_hazszam VARCHAR(40) NOT NULL,
Telefonszam CHAR(11),
Email VARCHAR(40) NOT NULL,
Adminisztrator INTEGER NOT NULL);

CREATE TABLE Kolcsonzesek(
Peldany_id CHAR(13) NOT NULL REFERENCES Peldany(azonosito),
Olvaso CHAR(8) NOT NULL REFERENCES Olvaso(olvasojegy_azonosito),
Kolcsonzes_kezdete DATE NOT NULL,
Kolcsonzes_vege DATE,
Kiadta VARCHAR(20) NOT NULL REFERENCES Konyvtaros(Felhasznaloi_nev),
Visszavetelezte VARCHAR(20) REFERENCES Konyvtaros(Felhasznaloi_nev),
Hosszabbitva integer,
PRIMARY KEY(Peldany_id, Olvaso, Kolcsonzes_kezdete));

CREATE USER konyvtaros IDENTIFIED BY '1212';
GRANT SELECT, INSERT, UPDATE, DELETE ON Konyvtar.* TO konyvtaros;

CREATE USER olvaso IDENTIFIED BY '3434';
GRANT SELECT ON Konyvtar.* TO olvaso;
GRANT UPDATE ON Konyvtar.Olvasok TO olvaso;
