# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv

## Tesztelést végezte: 	Szűcs  János
## Operációs rendszer:	WIN10
## Böngésző: 		Mozilla Firefox
## Dátum: 		2021.01.15.
## Talált hibák száma: 	0

## Könyvtáros könyvekkel kapcsolatos funkcióinak tesztelése

### Kezdőlap Katalógus új Könyv felvétele menüponton keresztül érhető el ez a funkció.  

* Első lépésben egy teljesen üres űrlap regisztrálását kíséreltem meg, a program elvárt viselkedésének megfelelően 10 db hibaüzenettel tért vissza, minden mezőnél külön-külön figyelmeztet a hiányosságokra.
* Következő tesztsorozatban egy-egy adatot adtam meg, a többi mezőt üresen hagytam.
* Egy szerző megadása esetén a Vezetéknév, Keresztnév formátumban megadott név esetén nem írt hibát a rendszer. 
* Két szerző megadása esetén a Vezetéknév, Keresztnév, Vezetéknév, Keresztnév, formátumban megadott név esetén hibát írt hibát a rendszer. 
* Két szerző megadása esetén a Vezetéknév, Keresztnév; Vezetéknév, keresztnév, formátumban megadott név esetén hibát írt hibát a rendszer, nem fogadja el a kisbetűvel kezdődő nevet
* Két szerző megadása esetén a Vezetéknév, Keresztnév; Vezetéknév, Keresztnév, formátumban megadott név esetén nem írt hibát a rendszer, elfogadja a két nevet.
* Három szerző megadása esetén a Vezetéknév, Keresztnév; Vezetéknév, Keresztnév; Vezetéknév, Keresztnév; formátumban megadott név esetén nem írt hibát a rendszer, elfogadja a három nevet.
* Három szerző megadása esetén a Vezetéknév, Keresztnév; Vezetéknév, keresztnév; Vezetéknév, Keresztnév; formátumban megadott név esetén nem írt hibát a rendszer, nem fogadja el a neveket.
* A kiadó kis kezdőbetűvel történő megadása esetén nem jelez hibát a rendszer. !!!
* A kiadó nagykezdőbetűvel történő megadása esetén nem jelez hibát a rendszer.
* A kiadó mező üresen történő megadása esetén hibát jelez a rendszer.
* Egy hat jegyű ISBN szám évszám nélküli megadásával hibát jelez a rendszer az elvárásoknak megfelelően.
* Egy13 jegyű ISBN szám  2011 évszámmal való megadásával nem jelez a rendszer az elvárásoknak megfelelően.
* Egy10 jegyű ISBN szám  2000 évszámmal való megadásával nem jelez hibát a rendszer az elvárásoknak megfelelően.
* Egy10 jegyű ISBN szám  2019 évszámmal való megadásával hibát jelez a rendszer az elvárásoknak megfelelően.
* A megfelelő formátumú Cutter jelzetet 123.1 N 1 elfogadja rendszer. 
* A megfelelő formátumú Cutter jelzetet N 1 elfogadja rendszer.
* A nem megfelelő formátumú Cutter jelzetet 123.1 nem fogadja rendszer. 
* A tárgyszavak kitöltése esetén amennyiben számot adtam meg hibát jelez a rendszer.
* A tárgyszavak kitöltése esetén amennyiben kisbetűs szót adtam meg, nem jelzett hibát a rendszer.
* A tárgyszavak kitöltése esetén amennyiben nagybetűvel kezdődő szót adtam meg, hibát jelzett a rendszer.
* A tárgyszavak kitöltése esetén amennyiben számmal kezdődő szót adtam meg, hibát jelzett a rendszer.
* A tárgyszavak kitöltése esetén amennyiben kisbetűvel kezdődő szót adtam meg, de szerepelt a szóban nagybetű, hibát jelzett a rendszer.
* A tárgyszavak kitöltése esetén amennyiben kisbetűvel kezdődő szót adtam meg, de szerepelt a szóban szám, hibát jelzett a rendszer.
* A tárgyszavak kitöltése esetén amennyiben több kisbetűvel kezdődő szót adtam meg vesszővel elválasztva nem jelzett hibát a rendszer.
* A tárgyszavak kitöltése esetén amennyiben egy kisbetűvel kezdődő szót adtam meg, majd vesszővel elválasztva egy nagybetűvel kezdődőt, hibát jelzett a rendszer.
* Üres cím esetén a rendszer hibát jelzett.
* Nagybetűvel kezdődő cím esetén a rendszer nem jelzett hibát.
* Számmal kezdődő címet elfogad a rendszer.
* Nagybetűvel kezdődő, vesszőt is tartalmazó címet elfogad a rendszer.
* A kiadási év, amely nagyobb az aktuális dátumhoz tartozó évnél, nem vihető fel a rendszerbe.
* A kiadási év (1899) amely kisebb, mint 1900, nem vihető fel a rendszerbe.
* A kiadási év (1900) amely nem kisebb, mint 1900, felvihető a rendszerbe.
* Az aktuális év, amely nem nagyobb az aktuális dátumhoz tartozó évnél, felvihető a rendszerbe.
* Az oldalak száma, amennyiben nincs megadva hibaüzenetet ad a rendszer.
* Amennyiben szöveg kerül az oldalak száma dobozba szintén hibaüzenetet kapunk, amely figyelmeztet arra, hogy számot kell megadni.
* Negatív számot sem fogad el az oldalak száma értékének.
* Oldalszámnak 10-et elfogadja a rendszer.
* Oldalszámnak 9-et nem fogadja el a rendszer.
* Oldalszámnak tetszőlegesen nagy számot elfogad a rendszer.
* Oldalszámnak törtszámot nem fogad el a rendszer.
* Az ETO jelzet szám megadása esetén nem jelez hibát.
* Az ETO jelzet szöveg megadása esetén nem jelez hibát.
* Az ETO jelzet üres érték esetén nem jelez hibát.
* Az azonosító üres érték megadása esetén hibát ad.
* Az azonosító negatív szám megadása esetén hibát ad.
* Az azonosító 4 jegyű szám esetén hibát jelez.
* Az azonosító 13 jegyű nem nullával kezdődő szám esetén nem jelez hibát.
* Az azonosító 13 jegyű nullával kezdődő szám esetén hibát jelez.

### A következő tesztsorozat a másodpéldány felvételének lehetőségét hivatott vizsgálni.

* Amennyiben minden érték megadása helyes, a rendszer jelezte, hogy a könyv felvétele sikeres, egyúttal felajánlotta, a másodpéldány felvételének lehetőségét. 
* A másodpéldány felvétele funkciót választva az űrlap kitöltve jelenik meg az azonosító kivételével. Az azonosítót megfelelő formátumban megadva a felvétel helyességét jelzi a rendszer. 
* A másodpéldány felvételénél, amennyiben az új azonosító nem megfelelő formátumú megkapjuk a megfelelő hibaüzenetet.
* A másodpéldány felvételénél, amennyiben az új azonosító már létező példány azonosítója, sikertelen könyvfelvétel üzenetet kapunk.

### A következő tesztsorozatban a példány törlését teszteltem

* Amennyiben létező azonosítót adtam meg, az Adatok lekérése funkció alapján megjelentek az adatok az űrlapon.
* Amennyiben nem létező azonosítót adtam meg, az Adatok lekérését követően hibaüzenet jelent meg jelezve, hogy nem létezik ilyen példány.
* A megfelelő azonosító megadása után, a rendszer jelezte, hogy a törlés sikeres.
* Egyszer már törölt példányt megpróbáltam újból törölni, de ebben az esetben elvárt hibaüzenetet kaptam.
