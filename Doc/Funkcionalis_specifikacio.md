# Funkcionális specifikáció

## 1. A rendszer céljai és nem céljai

## 2. Használati esetek
A rendszer használói a következők:
*	olvasó
*	könyvtáros
*	adminisztrátor
A rendszerhez tartozik még a kölcsönzés folyamata során használt vonalkód olvasó.

A rendszernek a következő funkciókat kell ellátnia:
*	az adminisztrátorok tudjanak könyvtárosokat regisztrálni és törölni
*	könyvtárosok tudjanak könyveket regisztrálni és törölni
*	könyvtárosok tudjanak olvasókat regisztrálni és törölni
*	könyvtárosok tudjanak könyveket kiadni és visszavenni
*	könyvtárosok az olvasók vagy könyvek listáját lekérdezhetik
*	olvasók belépés után meg tudják nézni a kölcsönzött könyveik listáját
*	olvasók belépés nélkül is tudnak keresni könyveket

Előfeltételek:
*	adminisztrátorok és könyvtárosok részére a rendszer használatához jogosultság, azaz jelszó szükséges
*	olvasóknak a kölcsönzéshez regisztráció szükséges

![usecase_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/usecasedia.jpg)

## 3. Megfeleltetés, hogyan fedik le a használati esetek a követelményeket
* K01, K02, K03: Az alkalmazást úgy hozzuk létre, hogy tartalmazza a kölcsönzők, könyvek és a kölcsönzés adminisztrációját, melyet a könyvtárosok felhasználó név/jelszó megadásával a rendszerbe belépve fognak elérni. Ezek fogják adni a rendszer fő funkcióit.
* K04: Különböző jogosultsági szinteket fogunk kialakítani. Az adminisztrátori jogosultsággal rendelkező könyvtárosok minden funkcióhoz hozzá fognak férni, felhasználói (könyvtáros/olvasó) fiókokat tudnak létrehozni/törölni. Könyvtárosok és az olvasó is jogosultságuk függvényében a rendszerbe belépve listákat és kimutatásokat tudnak lekérni.
* K05: A felhasználói felületet úgy alakítjuk ki, amely egy általános weboldal képét fogja nyújtani, az egyes funkciók egyértelmű elnevezést kapnak, és könnyen elérhetők lesznek.
* K06: A web alkalmazást úgy hozzuk létre, hogy rendszerbe való belépés nélkül is az online felületen keresztül is lehessen keresni könyveket az adatbázisban. 
* K07: A rendszer elkészítésekor ügyelünk a platformfüggetlen, robosztus működés kialakítására, ezért ellenőrizzük kódunk helyességét, hogy egy adott HTML elemet támogatják-e a böngészők, fontosabb alkalmazások és kisegítő technológiák. A HTML vizsgálathoz beleértjük a CSS vizsgálatot is. A teszteléseket elvégezzük Firefox, Chrome, Explorer, Opera, Safari böngészőkön, ill. Windows, Linux, iOs operációs rendszeren is.
* K08: A szabványos és elterjedt technológiák használata biztosítja. 
* K09: A kezelt adatokat MYSQL adatbázisban fogjuk tárolni. Az adatbázis használatával biztosítjuk az adatok bővíthetőségét. A applikációt PHP objektum orientált módon valósítjuk meg, amellyel új funkciókat könnyedén tudunk utólag hozzáadni a rendszerhez.
* K10: Azonos könyvtári folyamatok esetén a migrálás könnyedén megvalósítható, esetleges bővítések a K09 ponthoz írtak alapján gyorsan elérhetők. 

## 4. Képernyőtervek

A képernyőtervek egy html/css kód használatával megírt prototípus weboldal segítségével tekinthetők meg. A forrás fájlok a 
[prototype](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/tree/main/Doc/prototype) GitHub mappából tölthetőek le, ezt
követően lehet megjeleníteni az oldalakat böngészőben. A prototípus nem fed le minden forgatókönyvet, az űrlapok mezői
általában adatok nélkül szerepelnek, néhány esetben demonstratív jelleggel ki van töltve. Visszajelző üzenetek is csak az 
újonnan felvett olvasók, könyvtárosok és könyvek, valamint jelszómódosítás esetén vannak. Azonban a menürendszerből minden 
funkcióhoz tartozó képernyőterv - beviteli űrlapok, listák(demo adatokkal) - elérhetőek.

Főbb oldalak:
- **kezdolap.html**, amely minden felhasználó számára először jelenik meg.  

- **belepve_olvaso.html**, amely az olvasó bejelentkezése után érhető el, ez jelenleg nem érhető el a kezdőlapon keresztül.  

- **belepve.html**, amely az adminisztrátor könyvtáros bejelentkezése után jelenik meg. Ez a kezdőoldal *Belépés* menüpontján 
keresztül elérhető.  

**Megjegyzések:**  
- Adminisztrátori jogosultsággal nem rendelkező könyvtáros menürendszere annyiban tér el a fentitől, hogy a *Könyvtáros* menüpont 
nem szerepel az oldalán.  

- Az *Egyszerű keresés* és az *Részletes keresés* oldalak elérhetők a kezdőlapról és belépést követően is,
azonban a keresés eredménye oldalak a kezdőlapra visznek vissza, megváltozik a menürendszer, ez is tekinthető
a prototípus hiányosságának, azonban a keresési folyamatot így is demonstrálja a weboldal.

## 5. Forgatókönyvek

## 6. Funkció–követelmény megfeleltetés
