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
ID|Verzió|Követelmény|Funkció
--|------|---|--------
K01|V1.0|Kölcsönzők adminisztrációja|Olvasók regisztrálása, törlése és adataik módosítása, amit a könyvtárosok végezhetnek a használati esetekben leírtak szerint.  
K02|V1.0|Könyvek adminisztrációja|Könyvek regisztrálása és törlése, amit a könyvtárosok végezhetnek a használati esetekben leírtak szerint.
K03|V1.0|Kölcsönzés adminisztrációja|Könyvek kezeresése, kiadása, visszavétele, amit a könyvtárosok végezhetnek a használati esetekben leírtak szerint.
K04|V1.0|Felhasználói fiókok kezelése|A felhasználók bejelentkezésének kezelése és a felhasználói adatok módosításának lehetőségének biztosítása. Könyvtárosok regisztrálása, törlése és adataik módosítása, amit az adminisztrátorok végezhetnek a használati esetekben leírtak szerint.  
K05|V1.0|Egyszerűen használható kezelőfelület|A felhasználói felület megvalósítása szabványos html, css és javascript technológiák felhasználásval. 
K06|V1.0|Online elérhető nyilvános katalógus|A honlapon elérhető és kereshető lesz a könyvtár katalógusa bejelentkezés nélkül a látogatók számára is.  


