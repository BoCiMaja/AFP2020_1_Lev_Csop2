**Olvasó egyedet** jellemzi:  
 Olvasójegy azonosító, ami elsődleges kulcs,  
 Jelszó,  
 Felhasználói név,  
 Tagság érvényesség,  
 Családi név,   
 Utónév,  
 Születési családi név,  
 Születési utónév,  
 Születési hely,  
 Születési dátum,  
 Anyja születési családi neve,  
 Anyja születési utóneve,  
 Lakcím irányítószám,  
 Lakcím város,  
 Lakcím utca, 
 Lakcím házszám,  
 Telefonszám,  
 e-mail,  
 
 ** Könyv egyedet** jellemzi:  
 ISBN száma, ami elsődleges kulcs,  
 Szerző(k),  
 Cím,  
 Kiadó,   
 Kiadási év,  
 Cutter  
 ETO jelzet,  
 Oldalak száma,  
 Tárgyszavak,  
 
 
 **Példány egyedet** jellemzi:  
 Azonosító, ami elsődleges kulcs (vonalkód),  
 ISBN,   (mutat a könyvre)  
 Leltárba vétel dátuma,      
 Megjegyzés,  
 
 **Könyvtáros egyedet** jellemzi:  
 Felhasználói név elsődleges kulcs,  
 Jelszó,  
 Családi név,   
 Utónév,  
 Születési családi név,  
 Születési utónév,  
 Születési hely,  
 Születési dátum,  
 Anyja születési családi neve,  
 Anyja születési utóneve,  
 Lakcím irányítószám,  
 Lakcím város,  
 Lakcím utca,  
 Lakcím házszám,  
 Telefonszám,  
 e-mail,  
 Adminisztrátor (igen/nem)  
 
 **Kölcsönzések** egyedet jellemzi:  
 Példány_id				(Ez mutat a Példány tábla vonalkód mezőjére.)  
 Olvasó					(Mutat a kölcsönzőre.)  
 Kölcsönzés_kezdete	  
 Kölcsönzés_vége		(Ha null ki van adva a mű.)  
 Kiadta					(Mutat a könyvtárosra.)  
 Visszavételezte		(Mutat a könyvtárosra.)  
 Hosszabbítva
 
 ![Egyed-kapcsolat diagram](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/Er.png)  
 
 ![Relációsémák](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/Relacios.png)  
 
 ** Az adatbázis relációs sémái a létrehozás sorrendjében**  
 A táblák felvételének sorrendjében    
 Olvaso \[\ #Olvasojegyazonosito, Jelszo, Felhasználoi_nev, Tagság_ervenyesseg, Csaladi_nev, Utonev, Szuletesi_csaladi_nev, Szuletesi_utonev, Szuletesi_hely, Szuletesi_datum, Anyja_szuletesi_csaladi_neve, Anyja_szuletesi_utoneve, Lakcim_iranyitoszam, Lakcim_varos, Lakcim_utca, Lakcim_hazszam, Telefonszam, e-mail]  
 Konyv \[\ #ISBN, Szerzo(k), Cim, Kiado, Kiadasi_ev, Cutter, ETO_jelzet, Oldalak_szama, Targyszavak]  
 Peldany \[\ #Azonosito, ISBN, Leltarbavetel_datuma, Megjegyzes]  
 Konyvtaros \[\ #Felhasználoi_nev, Jelszo, Csaladi_nev, Utonev,Szuletesi_csaladi_nev, Szuletesi_utonev,	Szuletesi_hely, Szuletesi_datum, Anyja_szuletesi_csaladi_neve,Anyja_szuletesi_utoneve,Lakcim_iranyitoszam, Lakcim_varos,Lakcim_utca, Lakcim_hazszam, Telefonszam, e-mail, Adminisztrator]  
 Kolcsonzesek \[\ #Peldany_id, #Olvaso, #Kölcsönzés_kezdete, Kölcsönzés_vege, Kiadta, Visszavetelezte, Hosszabbitva]  
 
 ** A táblákat létrehozó parancsok **  
 
Create TABLE Olvaso(Olvasojegy_azonosito  CHAR(8) PRIMARY KEY,  
jelszo CHAR(40) NOT NULL,  
Felhasznaloi_nev VARCHAR2(40) NOT NULL,  
Tagsag_ervenyesseg DATE NOT NULL,  
Csaladi_nev VARCHAR2(40) NOT NULL,  
Utonev VARCHAR2(40) NOT NULL,  
Szuletesi_csaladi_nev VARCHAR2(40),    
Szuletesi_utonev VARCHAR2(40),  
Szuletesi_hely VARCHAR2(40) NOT NULL,  
Szuletesi_datum DATE NOT NULL,  
Anyja_szuletesi_csaladi_neve VARCHAR2(40) NOT NULL,  
Anyja_szuletesi_utoneve VARCHAR2(40) NOT NULL,  
Lakcim_iranyitoszam INTEGER NOT NULL,  
Lakcim_varos VARCHAR2(40) NOT NULL,   
Lakcim_utca VARCHAR2(40) NOT NULL,   
Lakcim_hazszam VARCHAR2(40) NOT NULL,  
Telefonszam CHAR(11),  
e_mail VARCHAR2(40));   

CREATE TABLE Konyv(ISBN VARCHAR(13) PRIMARY KEY,  
Szerzok VARCHAR2(200) NOT NULL,   
Cim VARCHAR2(50) NOT NULL,   
Kiado VARCHAR2(50),   
Kiadasi_ev INTEGER,   
Cutter VARCHAR2(3),  
ETO_jelzet VARCHAR2(10),  
Oldalak_szama INTEGER,  
Targyszavak VARCHAR2(100));  

CREATE TABLE Peldany(Azonosito CHAR(13) PRIMARY KEY,   
ISBN VARCHAR(13) NOT NULL REFERENCES Konyv(ISBN),   
Leltarbavetel_datuma DATE NOT NULL,  
Megjegyzes VARCHAR2(100));  
 
CREATE TABLE Konyvtaros(Felhasznaloi_nev varchar2(20) PRIMARY KEY,  
Jelszo CHAR(40) NOT NULL,  
Csaladi_nev VARCHAR2(40) NOT NULL,  
Utonev VARCHAR2(40) NOT NULL,  
Szuletesi_csaladi_nev VARCHAR2(40),   
Szuletesi_utonev VARCHAR2(40),  
Szuletesi_hely VARCHAR2(40) NOT NULL,  
Szuletesi_datum DATE NOT NULL,  
Anyja_szuletesi_csaladi_neve VARCHAR2(40) NOT NULL,  
Anyja_szuletesi_utoneve VARCHAR2(40) NOT NULL,  
Lakcim_iranyitoszam INTEGER NOT NULL,  
Lakcim_varos VARCHAR2(40) NOT NULL,  
Lakcim_utca VARCHAR2(40) NOT NULL,  
Lakcim_hazszam Varchar2(40) NOT NULL,  
Telefonszam CHAR(11),  
e_mail VARCHAR2(40) NOT NULL,  
Adminisztrator INTEGER NOT NULL);  

CREATE TABLE Kolcsonzesek(   
Peldany_id CHAR(13) NOT NULL REFERENCES Peldany(azonosito),   
Olvaso CHAR(8) NOT NULL REFERENCES Olvaso(olvasojegy_azonosito),   
Kolcsonzes_kezdete DATE NOT NULL,   
Kolcsonzes_vege DATE,   
Kiadta VARCHAR2(20) NOT NULL REFERENCES Konyvtaros(Felhasznaloi_nev),   
Visszavetelezte VARCHAR2(20) REFERENCES Konyvtaros(Felhasznaloi_nev),   
Hosszabbitva integer,  
PRIMARY KEY(Peldany_id, Olvaso, Kolcsonzes_kezdete));  

 
 
 