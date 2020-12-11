# Rendszerterv

## 1. A rendszer célja

A cél egy olyan rendszer létrehozása, ami lehetővé teszi a könyvtári dolgozók számára

## 2. Projektterv

### 2.1 Projektszerepkörök, felelősségek
Scrum master: Béres Gábor
Feladata a kommunikáció a csapat tagjaival, a sprint időszakán belül daily meeting-eken az elvégzett és a következő feladatok átbeszélése, akadályok (impediment) feltárása. 

Product owner: Szűcs János
A prioritással és üzleti értékkel ellátott felhasználói sztorikat tartalmazó Product Backlog létrehozása és felügyelete.

Üzleti szereplők (Stakeholders):
- Megrendelő:  

### 2.2 Projektmunkások és felelősségeik

Frontend:
- Béres Gábor
- Németh Richárd
A felhasználók által elérhető felület kialakítása, amin keresztűl a backend által biztosított szolgáltatások igénybevételével elérhetőek a rendszerben a felhasználók rendelkezésére álló funkciók.

Backend:
- Béres Gábor
- Jakab Zsolt
- Németh Richárd
- Szűcs János
Feladatuk az adatbázis szerkezetek kialakítása, funkciók létrehozása, a frontend kiszolgálása adatokkal.

Tesztelés:
- Jakab Zsolt
- Németh Richárd
- Szűcs János
A szoftverekben meglévő hibák felderítése még az üzembehelyezés előtt. 
  
### 2.3 Ütemterv

||Funkció / Story | Feladat / Task | Prioritás | Becslés | Aktuális becslés | Elteltidő | Hátralévő idő ||
|-|---------------|----------------|-----------|---------|------------------|-----------|---------------|-|
||Követelmény specifikáció|        |         0 |      12 |               12 |        12 |             0 ||             
||Funkcionális specifikáció|       |         0 |      12 |               12 |        12 |             0 ||
||Rendszerterv|                    |           |      16 |               16 |         8 |             8 ||
||Adattárolás|Adatmodell megtervezése|       0 |       4 |                4 |         4 |             0 ||
||Adatbázis megvalósítása a szerveren|       1 |       1 |                1 |         0 |             1 ||
||Website|Képernyőtervek elkészítése|        2 |       8 |                8 |         0 |             8 ||
||Website|Prototípus elkészítése|            2 |       8 |                8 |         0 |             8 ||
||Website|Adatbázis létrehozása|             2 |       8 |                8 |         0 |             8 ||
||Website|Menüstruktúra elkészítése|         2 |       8 |                8 |         0 |             8 ||
||Honlap|Kezdőlap funkciók elkészítése|      2 |       8 |                8 |         0 |             8 ||
||Honlap|Login funkció megvalósítás|         2 |       8 |                8 |         0 |             8 ||
||Website|Katalógus funkció|                 2 |       8 |                8 |         0 |             8 ||
||Website|Olvasókhoz tartozó funkció|        2 |       8 |                8 |         0 |             8 ||
||Website|Könyvtáros funkciók kezelése|      2 |       8 |                8 |         0 |             8 ||
||Website|Tesztelés|                         2 |      16 |               16 |         0 |            16 ||


### 2.4 Mérföldkövek

- A prototipus bemutatása
- Az elkészült szoftver átadása 

## 3. Üzleti folyamatok modellje

### 3.1 Üzleti szereplők
A rendszert regisztrálás nélkül is lehet használni. Ekkor a látogató csak a kezdőlapot tudja elérni, azon belül csak a keresés és részletes keresés menüpontokhoz van hozzáférése.
Regisztrált üzleti szereplők az olvasó, könyvtáros és az adminisztrátori jogosultsággal rendelkező könyvtáros. Munkaidőben jelenlevő könyvtárosok munkaidejük elején be tudnak jelentkezni a rendszerbe és bejelentkezve maradhatnak munkaidejük alatt.

### 3.2 Üzleti folyamatok
Bejelentkezés mindenki számára ugyanolyan lefutású:
A ’Belépés’ menüpontra kattintva megjelenik a ’Felhasználó név’ és ’Jelszó’ beviteli űrlap. A mezők kitöltése után a ’Belépés’ gombra kattint a felhasználó. Ha az azonosítás sikeres, akkor a felhasználó belépett és megjelenik a jogosultságának megfelelő menüsor.
Ha nem sikerül az azonosítás, hibaüzenet jelenik meg.

#### Üzleti folyamatok könyvtárosok számára:
- Olvasó regisztrálása a rendszerben: 
A még nem regisztrált olvasó felkeresi a könyvtárban a rendszereléréssel rendelkező könyvtárost. A könyvtáros az ‘Olvasó’ menü, ‘Beiratkozás’ menüpontjára kattintva elkezdi a regisztrációt. A megjelenő űrlapon az olvasótól elkért, alábbi táblázat szerinti adatokat felviszi. A könyvtáros előkészít egy üres olvasójegyet. A ‘Beiratkozás’ űrlap ‘Olvasójegy azonosító’ mezőjébe belekattint,   és a vonalkód olvasóval beolvassa az olvasójegyen lévő vonalkódot. Ha befejezte az adatok felvitelét az ‘Olvasó felvétele a nyilvántartásba‘ gombra kattint. A rendszer ellenőrzi az adatok helyességét és ha megfelelőek, akkor az olvasót felveszi az adatbázisba. (Az olvasójegyet kézzel is kitölti az olvasó adataival.)

||Megnevezés||
|-|---------|-|
||Felhasználó név||
||Családi név||
||Születési családi név||
||Születési hely||
||Anyja születési családi neve||
||Lakcím, irányítószám||
||Lakcím, utca||
||Telefonszám||
||Olvasójegy azonosító||
||Jelszó||
||Utónév||
||Születési utónév||
||Születési dátum||
||Anyja születési utóneve||
||Lakcím, város||
||Lakcím, házszám||
||E-mail cím||

- Olvasó törlése a rendszerből:
A könyvtáros az ‘Olvasó‘ menü ‘Kiiratkozás‘ menüpontjára kattint, majd belekattint az űrlap ‘Olvasójegy azonosító‘ mezőbe és beolvassa az olvasójegyen lévő vonalkódot. Ha nincs meg az olvasójegy, akkor a könyvtáros a 'Olvasó neve' mezőbe írja be a nevet. A fenti adatok megadása után az ’Azonosítás’ gombra kattint. A megjelenő listából kiválasztja a keresett olvasót és az 'Olvasó kiválasztása' gombra kattint. Az űrlapon megjelennek a keresett olvasó adatai. A könyvtáros a ‘Tagság megszüntetése‘ gombra kattint és véglegesíti a törlést. A rendszer kitörli az adatbázisból az olvasót.

- Új könyv regisztrálása: 
A könyvtáros a ‘Katalógus‘ menü ‘Új könyv felvétele‘ menüpontra kattint és elkezdi a regisztrációt. A megjelenő űrlapon a könyv alábbi táblázatban szereplő adatait felviszi. Ha befejezte az adatok felvitelét az ‘Könyv felvétele katalógusba‘ gombra kattint. A rendszer ellenőrzi az adatok helyességét és ha megfelelőek, akkor az könyvet felveszi az adatbázisba.

||Megnevezés||
|-|---------|-|
||Szerző(k)||
||Kiadó||
||ISBN száma||
||Cutter||
||Tárgyszavak||
||Cím||
||Kiadási év||
||Oldalak száma||
||ETO jelzet||
||Azonosító||

- Könyv törlése: 
A könyvtáros az ‘Katalógus‘ menü ‘Könyv leselejtezése‘ menüpontját kiválasztja, majd belekattint az űrlap ‘Azonosító‘ mezőbe és beolvassa a könyvben lévő vonalkódot.  A beolvasás után az ‘Adatok lekérése‘ gombra kattint. A könyv adatai megjelennek az űrlapon. A könyvtáros a ‘Könyvpéldány törlése az adatbázisból‘ gombra kattintva véglegesíti a törlést. A rendszer kitörli az adatbázisból a könyvet.

- Kölcsönzés - könyv kiadása: 
A könyvtáros a ‘Kölcsönzés‘ menü ‘Könyv‘ kiadása menüpontra kattint. A megjelenő űrlapon az ‘Olvasójegy azonosító‘ mezőbe kattint és beolvassa az olvasójegyen lévő vonalkódot. Utána megnyomja az ‘Azonosítás‘ gombot. Ekkor megjelenik egy új űrlap a könyv adatainak megadásához. A könyvtáros az ‘Azonosító‘ mezőbe kattint és beolvassa a könyv vonalkódját. Utána az ‘Adatok lekérése‘ gombra kattint. Ha megjelennek a könyv adatai, akkor a ‘Könyv kikölcsönzése‘ gombra kattint. Az adatbázisban megtörténnek a bejegyzések az olvasóhoz és a könyvhöz.

- Kölcsönzés - könyv visszavétele: 
A könyvtáros a ‘Kölcsönzés‘ menü ‘Könyv visszavétele‘ menüpontra kattint. A megjelenő űrlapon az ‘Olvasójegy azonosító‘ mezőbe kattint és beolvassa az olvasójegyen lévő vonalkódot. Utána megnyomja az ‘Azonosítás‘ gombot. Ekkor megjelenik egy új űrlap a könyv adatainak megadásához. A könyvtáros az ‘Azonosító‘ mezőbe kattint és beolvassa a könyv vonalkódját. Utána az ‘Adatok lekérése‘ gombra kattint. Ha megjelennek a könyv adatai, akkor a ‘Könyv visszavétele‘ gombra kattint. Az adatbázisban megtörténnek a bejegyzések az olvasóhoz és a könyvhöz.

- Lekérdezés (listák, kimutatások): 
A könyvtárosok több lekérdezést is tudnak indítani. Egy példa:
A könyvtáros az ‘Olvasó‘ menü ‘Lejárt tagságok‘ menüpontjára kattint. Az adatbázisból lekért adatok megjelennek a képernyőn. Lehetősége van kijelölni az egyes felhasználókat és a kijelölteket törölni a ‘Törlés a nyilvántartásból‘ gombra kattintva.

#### Üzleti folyamatok adminisztrátor jogosultsággal rendelkező könyvtárosok számára:
Az adminisztrátorok minden a könyvtárosoknál felsorolt funkciót elérnek, továbbá a következőket:

- Könyvtáros regisztrálása: 
Az adminisztrátor az ‘Könyvtáros’ menü, ‘Regisztráció’ menüpontjára kattintva elkezdi a regisztrációt. A megjelenő űrlapot a könyvtáros alábbi táblázatban szereplő adataival kitölti. Ha olyan könyvtárost regisztrál, aki adminisztrátori jogosultságokkal is fog rendelkezni, akkor bejelöli az ’Adminisztrátori joggal rendelkezzen’ mezőt. Ha befejezte az adatok felvitelét az ’Könyvtáros felvétele a nyilvántartásba’ gombra kattint. A rendszer ellenőrzi az adatok helyességét és ha megfelelőek, akkor a könyvtárost felveszi az adatbázisba.

||Megnevezés||
|-|---------|-|
||Felhasználó név||
||Családi név||
||Születési családi név||
||Születési hely||
||Anyja születési családi neve||
||Lakcím, irányítószám||
||Lakcím, utca||
||Telefonszám||
||Jelszó||
||Utónév||
||Születési utónév||
||Születési dátum||
||Anyja születési utóneve||
||Lakcím, város||
||Lakcím, házszám||
||E-mail cím||

- Könyvtáros törlése:
Az adminisztrátor a ‘Könyvtáros‘ menü ‘Törlés‘ menüpontjára kattint.  Az adminisztrátor kitölti az űrlap mezőit. A fenti adatok megadása után az ’Adatok lekérése’ gombra kattint. Ha az adatbázisban a lekérés megtalálta a keresett könyvtárost, az adatai megjelennek az űrlapon. A könyvtáros a ‘Könyvtáros törlése nyilvántartásból‘ gombra kattintva véglegesíti a törlést. A rendszer kitörli az adatbázisból az könyvtárost.
 
#### Üzleti folyamatok olvasók számára:
- Keresés: 
Az olvasónak nem szükséges belépnie a rendszerbe a funkció eléréséhez. A felhasználó a ’Katalógus’ menü ’Keresés’ menüpontjára kattint. Megjelenő űrlap’ Keresett szerző, cím, vagy tárgyszavak:’ mezőjébe beírja a keresendő szöveget, majd a ’Keresés’ gombra kattint. A rendszer a találatokat listázza a képernyőn. Ha egy könyv sem felel meg a keresési feltételnek, akkor a „Nincs találat.” üzenet jelenik meg a képernyőn.

- Részletes keresés: 
Az olvasónak nem szükséges belépnie a rendszerbe a funkció eléréséhez. A felhasználó a ’Katalógus’ menü ’Részletes keresés’ menüpontjára kattint. A megjelenő űrlapon megadja a keresett könyv egyes adatait, majd ’Könyv keresése a katalógusban’ gombra kattint. A rendszer a találatokat listázza a képernyőn. Ha egy könyv sem felel meg a keresési feltételeknek, akkor a „Nincs találat.” üzenet jelenik meg a képernyőn.

- Személyes adatok módosítása:
Az olvasó az ’Olvasó’ menü ’Adatok módosítása’ menüpontra kattint. Megjelenik a képernyőn az olvasó összes adata. A szükséges adat módosítása után az ’Adatok módosítása’ gombra kattint. Az adatok módosítás előtt rendszer ellenőrzi a módosított adat helyességét. Ha az adatok jók, a rendszer az adatbázisban módosítja az olvasó adatait.

- Kölcsönzött könyvek listázása: 
Az olvasó az ’Olvasó’ menü ’Kikölcsönzött könyvek’ menüpontra kattint. A képernyőn megjelenik az olvasó által aktuálisan kikölcsönzött könyvek listája. Ha egy könyv sincs kikölcsönözve az olvasó által, akkor a „Jelenleg egy könyv sincs kikölcsönözve.” üzenet jelenik meg.

### 3.3 Üzleti entitások 
-	könyv
-	olvasójegy

## 4. Követelmények

### 4.1 Funkcionális követelmények 

### 4.2 Nemfunkcionális követelmények 

### 4.3 Törvényi előírások, szabványok 

## 5. Funkcionális terv

### 5.1 Rendszerszereplők
A rendszerünkben két rendszerszereplő csoportot különböztetünk meg. Az egyik a könyveket kölcsönző olvasók csoportja. A másik a könyvtári adminisztrációt végző könyvtárosok csoportja. Az olvasók igénybe veszik a könyvtár szolgáltatásait, míg a könyvtárosok ezt nyilvántartják és kiszolgálják az olvasókat. A könyvtárosok több jogosultsággal rendelkeznek, mint az olvasók. Az ő feladatuk még az olvasók értesítése problémák esetén, pl. elmaradás vagy lejárt tagság. A könyvtárosok csoport része az adminisztrátori jogosultsággal rendelkező könyvtárosok csoportja, akik teljes jogosultsággal rendelkeznek. Ők végzik a rendszerben a könyvtárosok adminisztrálását.

### 5.2 Rendszerhasználati esetek és lefutásaik 

![Kereses_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/kereses.png)

![Olvaso_sajat_adat_mod_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/olvaso_sajat_adat_mod.png)

![Olvaso_reg_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/olvaso_reg.png)

![Olvaso_del_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/olvaso_del.png)

![Olvaso_adat_mod_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/olvaso_adat_mod.png)

![Konyv_del_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyv_del.png)

![Konyv_kiad_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyv_kiad.png)

![Konyv_reg_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyv_reg.png)

![Konyv_vissza_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyv_vissza.png)

![Konyvtaros_reg_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyvtaros_reg.png)

![Konyvtaros_del_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyvtaros_del.png)

![Konyvtaros_adat_mod_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/rendszerhasznalati/konyvtaros_adat_mod.png)

### 5.3 Határ osztályok 

#### Az olvasó felhasználói tevékenységeihez kapcsolódó határosztályok
![olvaso_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/olvaso_hatarosztalyai.png)

#### A könyvtáros felhasználói tevékenységeihez kapcsolódó határosztályok  
Megjegyzés: A könyvkeresések eredményét leíró határosztályokat a fenti diagram tartalmazza  

![konyvtaros_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/konyvtaros_hatarosztalyai.png)

#### A könyvtáros felhasználó könyvkölcsönzési tevékenységeihez kapcsolódó határosztályok
![kolcsonzes_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/konyvkolcsonzes_hatarosztalyai.png)

#### A könyvtáros adminisztrátor kiegészítő felhasználói tevékenységeihez kapcsolódó határosztályok
![admin_dia](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/konyvtaros_adminisztrator_hatarosztalyai.png)

### 5.4 Menühierarchiák 

A menürendszert egy, a weboldal fejléce alatt található vízszintes, lenyíló menüket is tartalmazó navigációs sávban építettük fel.  

A rendszerbe való bejelentkezés előtt *Kezdőlap, Tájékoztató, Katalógus*, valamint *Belépés* menüpontok találhatók a navigációs sávban. 
Ezek közül egyedül a Katalógus tartalmaz lenyíló menüt, lehetővé téve az *Egyszerű keresés* valamint a *Részletes keresés* műveletek 
kezdeményezését a könyvtári katalógusban a honlap látogatói számára.  

**Bármilyen felhasználóként** - olvasóként, könyvtárosként vagy könyvtáros adminisztrátorként - belépve a rendszerbe a navigációs sáv jobb oldalán 
helyezkedik el a *Belépve: felhasználónév* menüpont, kiemelve ezzel, hogy adott pillanatban ki használja a rendszert az adott böngészőből. 
A menüpont egy lenyíló menüt tartalmaz, mely a *Jelszócsere, Személyes adatok* és *Kilépés* menüpontokból áll. Ez egységes minden felhasználó esetén, 
a személyes adatok mindegyike megtekinthető, azonban csak a telefonszám és e-mail cím módosítható.

**Olvasóként** belépve a rendszerbe a *Kezdőlap, Katalógus, Könyveim* menüpontok jelennek meg a sáv bal oldalán. A Katalógus megegyezik a fentiekben 
ismertetett lenyíló menüvel, az olvasóknak csak keresési lehetőséget biztosít a rendszer a katalógusban. A Könyveim menüpont az aktuálisan kikölcsönzött 
könyveket listázza ki az olvasó számára.

**Könyvtárosként** belépve a rendszerbe a *Kezdőlap, Olvasó, Katalógus, Kölcsönzés* menüpontok találhatók a navigációs sávban, melyek mindegyike a 
Kezdőlaptól eltekintve lenyíló menürendszer. A főmenü felosztása az különböző adminisztratív funkciókhoz kapcsolódik, úm. olvasó nyilvántartás, 
könyv katalógus műveletek, és kölcsönzési adminisztráció.  
Az *Olvasó* menü tartalmazza az *Beiratkozás, Adatok módosítása, Tagság rendezése, Kiiratkozás,* valamint a *Lejárt tagságok* menüpontokat, 
melyek mindegyike a nevében szereplő műveletek végzéséhez szükséges képernyőket jeleníti meg, melyek a Lejárt tagságok kivételével - mely egy lista - 
egy olvasói adatokat tartalmazó űrlap.  
A *Katalógus* lenyíló menü tartalmazza a katalógusban való kereséshez és a könyvek katalogizálásához szükséges műveletek menüpontjait, 
melyek név szerint: *Egyszerű keresés, Részletes keresés, Új könyv felvétele, Könyv leselejtezése, Lejárt határidős könyvek, Teljes leltár indítása,*
*Teljes leltár folytatása, Teljes vége*. A menü három főbb tevékenység köré szerveződik, a keresés, egyedi könyvpéldányok katalógusba való felvétele vagy
törlése, illetve az évente egyszer végzett teljes leltárhoz kapcsolódó három menüpont.  
A *Kölcsönzés* menüpont lenyíló menüjében a könyvek kikölcsönzéséhez, visszavételéhez, valamint a kölcsönzés hosszabbításához kapcsolódó műveletek
végzéséhez szükséges menüpontok szerepelnek: *Könyv kiadása, Könyv visszavétele, Hosszabbítás*. Ezek napi szinten, folyamatosan használt műveletek, illetve 
nem a katalógushoz kapcsolódóak, mely indokolttá teszi külön menübe helyezésüket. A szintén gyakran végzett keresési műveleteket az egységes 
felhasználói felület megtartása végett, valamint funkcióját tekintetbe véve tartottuk a hosszú Katalógus menüben, de kiemelt szerepét tekintve az
első és második helyen.  

**Adminisztrátor könyvtárosként** a fenti könyvtáros menürendszer kiegészül a könyvtárosok adminisztrációjához szükséges lenyíló menüponttal.
Így a navigációs sáv bal oldalán ebben az esetben a *Kezdőlap, Olvasó, Könyvtáros, Katalógus, Kölcsönzés* menüpontok találhatóak. A Könyvtáros
lenyíló menü a *Regisztráció, Adatok módosítása, Törlés* menüpontokat tartalmazza. Ezek elkülönítését már csak az a szempont is indokolta, hogy ezek
a műveletek csak az erre jogosult könyvtárosoknak állnak rendelkezésére.

### 5.5 Képernyőtervek  

A képernyőtervek egy html/css kód használatával megírt prototípus weboldal formájában állnak rendelkezésre, melyeket a leendő
felhasználók számára készítettünk el a funkcionális specifikáció részeként, és mivel pozitív fogadtatásra talált, ezért 
a rendszerterv része is lett. A forrás fájlok a 
[prototype](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/tree/main/Doc/prototype/) GitHub mappából tölthetőek le, ezt
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
nem szerepel az oldalán, mint az a Menühierarchia fejezetben is ismertetésre került.

- Az *Egyszerű keresés* és az *Részletes keresés* oldalak elérhetők a kezdőlapról és belépést követően is,
azonban a keresés eredménye oldalak a kezdőlapra visznek vissza, megváltozik a menürendszer, ez tekinthető
a prototípus hiányosságának, azonban a keresési folyamatot így is demonstrálja a weboldal.  

## 6. Fizikai környezet

### 6.1 Vásárolt softwarekomponensek és külső rendszerek

Nincsenek vásárolt szoftverkomponensek. 

### 6.2 Hardver és hálózati topológia

- Az alkalmazás web platformra készűl.
- Internet böngészőn keresztűl érhető el a felhasználó felület.
- Szerverhez kapcsolódnak:
-- kliens gépek a helyi hálózaton 
-- interneten bárki számára elérhető honlap  
 
### 6.3 Fizikai alrendszerek

- Webszerver: 80-as porton elérhető HTTP szolgáltatás 
- Mysql adatbázis szerver
- Kliens gépek: a követelményeknek megfelelő internet böngésző futtatására alklamas PC-k.

### 6.4 Fejlesztő eszközök

- Apache NetBeans
- WampServer  
- MySQL Workbench
- PSPad

## 8. Architekturális terv

Az Apache http szerveren futó alkalmazás szolgálja ki webes felületen keresztűl a rendszer felhasználóit.
A felhasználó felület böngészőben megjelenő html oldalak formájában érhető el, ezen keresztűl tudják a felhasználók a rendszert használni.
Az adatok tárolása a MySql adatbázis szerveren történik.


### 8.1 Architekturális tervezési minta

Az alkalmazás elkészítése során az MVC (Model, View Controller) modellt használjuk.

### 8.2 Az alkalmazás rétegei, fő komponensei, ezek kapcsolatai

A backend a webszereveren fut, a vékony kliens a böngészőből elérhető a felhasználók számára.
Adatbázis szerver (Adatbázis) <-------> Webszerver (Üzleti logika) <-------> Kliens (Felhasználói felület) 

### 8.3 Változások kezelése

Minden változás lekezelése szerver oldalon történik, a kliens oldalon nincs szükség új komonensek telepítésére.  


## 9. Adatbázisterv  
  
**Olvasó egyedet** jellemzi:  
 Olvasójegy azonosító, ami elsődleges kulcs, 
 Felhasználói név,
 Jelszó,  
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
 
 **Könyv egyedet** jellemzi:  
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
 
 
### 9.1 Logikai adatmodell 

### Egyed-Kapcsolat diagram
  
 ![Egyed-kapcsolat diagram](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/ER.png)   
   
### Adatbázis séma
  
 ![Relációsémák](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/image/Relacios.png)  
   
 ** Az adatbázis relációs sémái a létrehozás sorrendjében**  
 A táblák felvételének sorrendjében    
 Olvaso \[\ #Olvasojegyazonosito, Jelszo, Felhasználoi_nev, Tagság_ervenyesseg, Csaladi_nev, Utonev, Szuletesi_csaladi_nev, Szuletesi_utonev, Szuletesi_hely, Szuletesi_datum, Anyja_szuletesi_csaladi_neve, Anyja_szuletesi_utoneve, Lakcim_iranyitoszam, Lakcim_varos, Lakcim_utca, Lakcim_hazszam, Telefonszam, e-mail]  
 Konyv \[\ #ISBN, Szerzo(k), Cim, Kiado, Kiadasi_ev, Cutter, ETO_jelzet, Oldalak_szama, Targyszavak]  
 Peldany \[\ #Azonosito, ISBN, Leltarbavetel_datuma, Megjegyzes]  
 Konyvtaros \[\ #Felhasználoi_nev, Jelszo, Csaladi_nev, Utonev,Szuletesi_csaladi_nev, Szuletesi_utonev,	Szuletesi_hely, Szuletesi_datum, Anyja_szuletesi_csaladi_neve,Anyja_szuletesi_utoneve,Lakcim_iranyitoszam, Lakcim_varos,Lakcim_utca, Lakcim_hazszam, Telefonszam, e-mail, Adminisztrator]  
 Kolcsonzesek \[\ #Peldany_id, #Olvaso, #Kölcsönzés_kezdete, Kölcsönzés_vege, Kiadta, Visszavetelezte, Hosszabbitva]  
 
### 9.2 Tárolt eljárások 

### 9.3 Fizikai adatmodellt legeneráló SQL szkript   

**A táblákat létrehozó parancsok**    
 
Create TABLE Olvasok(Olvasojegy_azonosito  CHAR(8) PRIMARY KEY,   
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
Cutter VARCHAR(3),  
ETO_jelzet VARCHAR(10),  
Oldalak_szama INTEGER,  
Targyszavak VARCHAR(100));  

CREATE TABLE Peldanyok(Azonosito CHAR(13) PRIMARY KEY,   
ISBN VARCHAR(13) NOT NULL REFERENCES Konyv(ISBN),   
Leltarbavetel_datuma DATE NOT NULL,  
Megjegyzes VARCHAR(100));  
 
CREATE TABLE Konyvtarosok(Felhasznaloi_nev varchar(20) PRIMARY KEY,  
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
Lakcim_hazszam Varchar(40) NOT NULL,  
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

**Felhasználókat és jogokat létrehozó parancsok**  

CREATE USER konyvtaros IDENTIFIED BY '1212';  
GRANT SELECT, INSERT, UPDATE, DELETE ON Konyvtar.\* TO konyvtaros;  

CREATE USER olvaso IDENTIFIED BY '3434';  
GRANT SELECT ON Konyvtar.\* TO olvaso;  
GRANT UPDATE ON Konyvtar.Olvasok TO olvaso;  

## 10. Implementációs terv

A webszerveren futó php program tartalmazza az üzleti logikát.
A felhasználói felület, ami böngészőben megjelenő weboldalak formájában érhető el HTML, CSS, és JavaScript technológiák felhasználásával készülnek.
A programok objektum orientált programozási paradigma használatával, MVC modell használata mellett.  
MySql adatbázis szervert használunk az adatok tárolására.

### 10.1 Perzisztencia osztályok 

### 10.2 Üzleti logika osztályai

### 10.3 Kliens oldal osztályai 

## 11. Tesztterv   
   
A rendszerterv szerint implementált szoftver tesztelésének célja, hogy ellenőrizze az *Üzleti folyamatok modellje* című pontban 
meghatározott folyamatok helyes, specifikáció szerinti lefutását, valamint hogy a kliens webes felület felhasználóbarát módon 
jelenik meg, és használható különböző hardver és szoftverkörnyezetben.  

A tesztelés során használt kiszolgáló hardverkonfigurációja a telepítés során használt hardverrel kompatibilis, teljesítményben 
(processzor, operatív memória, háttértár) nem tér el jelentősen. A telepítéshez természetesen az általunk ajánlott konfiguráció
kerül beszerzésre a felhasználó könyvtár által.  

A tesztelés során használt kliens hardverek a napjainkban általánosan elterjedt hardverkonfigurációjú PC-k illetve laptopok, 
melyeken a leggyakrabban használt böngészőkön (Google Chrome, Mozilla Firefox, Microsoft Edge) teszteljük a rendszert az alábbiakban
részletezettek szerint. A minimum hardverkonfiguráció: Intel Celeron processzor, 4GB RAM, 128GB HDD, a képernyők felbontása: 
1280x1024, 1920x1080.  

A tesztelés során az üzleti folyamatokhoz tartozó különböző forgatókönyvek eredményét vizsgáljuk. Amennyiben az elvártnak megfelelő 
eredményt kapjuk, a teszteset sikeresnek tekinthető, ellenkező esetben a hibát jegyzőkönyvben rögzítjük. Ezt követően a feljegyzett 
hibákat javítjuk a szoftverben, és újbóli tesztelésnek vetjük alá a rendszert.  

A rendszer alábbiakban leírt tesztelésének előfeltétele, hogy az adatbázisba phpMyAdmin segítségével felvegyünk egy első adminisztrátori 
jogosultsággal rendelkező felhasználót a Könyvtáros táblába. Felhasználónév: admin, a további adatok a fejlesztő-tesztelő személyes adatai 
lesznek. Ezzel belépve tudjuk tesztelni a könyvtáros adminisztrátor kivételes funkcióját, mely a könyvtárosok adminisztrációja.


### 11.1 Tesztelt üzleti folyamatok adminisztátor könyvtárosok számára:  

**A) Belépés a rendszerbe:**  
A kezdőoldalról be tud lépni a rendszerbe a felhasználónevévek és jelszavának megadásával. Az adminisztrátorok minden funkciót elérnek, 
melyeknek meg kell jelenni a navigációs sávban.  

**Tesztesetek:**  
1. Nem regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.
2. Regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer belépteti a felhasználót, navigációs sáv megváltozik.  


**B) Könyvtáros regisztrálása:**  
A megjelenő űrlapot az adminisztrátor a könyvtáros, alábbi táblázatban szereplő adataival kitölti. Ha olyan könyvtárost regisztrál, 
aki adminisztrátori jogosultságokkal is fog rendelkezni, akkor bejelöli az 'Adminisztrátori joggal rendelkezzen' mezőt. 
Az űrlap mezői és a bevitt adatokkal szemben támasztott követelmények:  

||Űrlap mező|Követelmények||
|-|---------|-------------|-|
||Felhasználó név|1. Kötelező 2. Nem lehet egy már regisztrált felhasználónév 3. Minimum 6 karakter hosszú legyen ||
||Jelszó|1. Kötelező 2. Minimum 8 karakter hosszú, regisztrációkor a születési dátum 8 számjegye||
||Családi név|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Utónév|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Születési családi név|1. Opcionális 2. Nem tartalmazhat számjegyet||
||Születési utónév|1. Opcionális 2. Nem tartalmazhat számjegyet||
||Születési hely|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Születési dátum|1. Kötelező 2. Kötött dátum formátum: éééé.hh.nn||
||Anyja születési családi neve|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Anyja születési utóneve|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Lakcím, irányítószám|1. Kötelező 2. Kötött formátumú: 4 számjegy||
||Lakcím, város|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Lakcím, utca|1. Kötelező||
||Lakcím, házszám|1. Kötelező||
||Telefonszám|1. Opcionális 2. Kötött formátumú: 11 számjegy||
||E-mail cím|1. Opcionális 2. Kötött formátumú: fióknév@domainnév||
||Adminisztrátor|1. Opcionális, checkbox ||    

További követelmény, hogy azonos személyes adatokkal (Családi név, Utónév, Születési hely, Születési dátum, Anyja születési családi neve,
Anyja születési utóneve) már regisztrált felhasználót ne lehessen újra regisztrálni.  

**Tesztesetek:**  
1. Bevitt adatok helyesek, megfelelnek a követelményeknek.  
Elvárt eredmény:  
a) A Könyvtáros táblában megjelenik a regisztrált felhasználó rekordja az űrlapban megadott értékekkel.  
b) A regisztrált könyvtáros be tud lépni a rendszerbe a weboldal kezdőoldalán található Belépés menüponton keresztül a megadott 
felhasználónévvel és jelszóval, és a jogosultságának megfelelő navigációs sáv elérhető számára.  
c) A könyvtáros a rendszerbe való belépést követően a *Személyes adatok* menüpontra kattintva tudja ellenőrizni a felvett adatokat.  
2. Bevitt adatok között szerepelnek a fenti követelményeknek nem megfelelő adatok.  
Elvárt eredmény: a rendszer hibaüzenetben jelzi a felhasználó számára a hibát, a hibás adatokat tartalmazó mezőket jelöli az űrlapon,
az adatbázisban nem jelenik meg új rekord a Könyvtáros táblában.  


**C) Könyvtáros adatainak módosítása:**  
Adatok módosítása esetén az adminisztrátor először lekéri a könyvtáros 'adatlapját', melyet a könyvtáros meghatározó személyes adatainak
(pl. Családi név, Utónév, szükség esetén Születési dátum) megadása után tud megtenni. Az űrlap megegyezik a regisztrációnál megjelenő 
űrlappal, csak a Felhasználó név és Jelszó mezők nem szerepelnek. Ezekből kifolyólag a bevitt adatoknak ugyanazoknak a formai követelményeknek,
melyek a fenti táblázatban szerepelnek. Ugyanakkor nem minden személyes adat módosítható természetüknél fogva, ezek az űrlapon nem módosítható
mezőkként szerepelnek. A módosítható adatok listája:  

||Űrlap mező||
|-|---------|-|
||Családi név||
||Utónév||
||Lakcím, utca||
||Lakcím, irányítószám||
||Lakcím, város||
||Lakcím, házszám||
||Telefonszám||
||E-mail cím||
||Adminisztrátori jog||  

**Tesztesetek:**  
1. Adatlekérés nem regisztrált könyvtárosra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
2. Adatlekérés regisztrált könyvtárosra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
3. Adatmódosítás helyes adatokkal. Elvárt eredmény: a megfelelő rekord módosul a Könyvtáros táblában. Az könyvtáros a rendszerbe 
való belépést követően a *Személyes adatok* menüpontra kattintva tudja ellenőrizni a módosításokat.  
4. Adatmódosítás követelményeknek nem megfelelő adatokkal. Elvárt eredmény: a rendszer hibaüzenetben jelzi a felhasználó számára a hibát,
a hibás adatokat tartalmazó mezőket jelöli az űrlapon, az adatbázisban nem módosul rekord a Könyvtáros táblában.   


**D) Könyvtáros törlése:**  
Könyvtáros adatbázisból való törlése esetén az adminisztrátor először lekéri a könyvtáros 'adatlapját', melyet a könyvtáros meghatározó 
személyes adatainak (pl. Családi név, Utónév, szükség esetén Születési dátum) megadása után tud megtenni. Az űrlap megegyezik az Adatok 
módosítása űrlappal, viszont ezen az űrlapon a mezők egyike sem módosítható. Ezt követően a *Könytáros törlése nyilvántartásból* gomb 
megnyomása után üzenetben jelzi a rendszer a folyamat végét.  

**Tesztesetek:**  
1. Adatlekérés nem regisztrált könyvtárosra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.
2. Adatlekérés regisztrált könyvtárosra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
3. Sikeres adatlekérést követően könyvtáros törlése. Elvárt eredmény: a megfelelő rekord törlődik a Könyvtáros táblából az adatbázisban.


### 11.2 Tesztelt üzleti folyamatok könyvtárosok számára:

Az alábbiakban tesztelt üzleti folyamatok az adminisztrátor könyvtárosok esetén is érvényesek, azonban külön nem szükséges tesztelni esetükben.
Az egyetlen különbség a Belépés esetén van.

**Belépés a rendszerbe:**  
Az adminisztrátor által előzetesen felvett könyvtáros a kezdőoldalról be tud lépni a rendszerbe a felhasználónevévek és jelszavának megadásával. 
A navigációs sávban a jogosultságának megfelelő menüpontok jelennek meg számára. (Lásd: Menühierarchia fejezet.)

**Tesztesetek:**  
1. Nem regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.
2. Regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer belépteti a felhasználót, navigációs sáv megváltozik, 
Könyvtáros menüpont nem elérhető.


### 11.2.1 Olvasók adminisztrációjának tesztelése:

**A) Olvasó regisztrálása a rendszerben:**  
A könyvtáros az *Olvasó* menü, *Beiratkozás* menüpontjára kattintva elkezdi a regisztrációt. A megjelenő űrlapon az olvasótól elkért, 
alábbi táblázat szerinti adatokat felviszi. A könyvtáros előkészít egy üres olvasójegyet. A Beiratkozás űrlap *Olvasójegy azonosító* 
mezőjébe belekattint, és a vonalkód olvasóval beolvassa az olvasójegyen lévő vonalkódot. Ha befejezte az adatok felvitelét az 
*Olvasó felvétele a nyilvántartásba* gombra kattint.  

||Űrlap mező|Követelmények||
|-|---------|-------------|-|
||Felhasználó név|1. Kötelező 2. Nem lehet egy már regisztrált felhasználónév 3. Minimum 6 karakter hosszú legyen ||
||Jelszó|1. Kötelező 2. Minimum 8 karakter hosszú, regisztrációkor a születési dátum 8 számjegye||
||Családi név|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Utónév|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Születési családi név|1. Opcionális 2. Nem tartalmazhat számjegyet||
||Születési utónév|1. Opcionális 2. Nem tartalmazhat számjegyet||
||Születési hely|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Születési dátum|1. Kötelező 2. Kötött dátum formátum:éééé.hh.nn||
||Anyja születési családi neve|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Anyja születési utóneve|1. Kötelező 2. Nem tartalmazhat számjegyet||
||Lakcím, irányítószám|1. Kötelező 2. Kötött formátumú: 4 számjegy||
||Lakcím, város|1. Kötelező 2. Nem tartalmazhat számjegyet|
||Lakcím, utca|1. Kötelező||
||Lakcím, házszám|1. Kötelező||
||Telefonszám|1. Opcionális 2. Kötött formátumú: 11 számjegy||
||E-mail cím|1. Opcionális 2. Kötött formátumú: fióknév@domainnév||
||Olvasójegy azonosító|1. Kötelező 2. Vonalkód olvasó esetén automatikus 3. Kötött formátumú: 13 számjegy||    
||Tagság érvényessége|1. Automatikus 2. Dátum formátumú: éééé.hh.nn||

**Tesztesetek:**  
1. Bevitt adatok helyesek, megfelelnek a követelményeknek.  
Elvárt eredmény:  
a) Az Olvasó táblában megjelenik a regisztrált felhasználó rekordja az űrlapban megadott értékekkel.  
b) A regisztrált olvasó be tud lépni a rendszerbe a weboldal kezdőoldalán található Belépés menüponton keresztül a megadott 
felhasználónévvel és jelszóval, és a megfelelő navigációs sáv elérhető számára. (Lásd: Menühierarchiák fejezet) 
c) Az olvasó a rendszerbe való belépést követően a *Személyes adatok* menüpontra kattintva tudja ellenőrizni a felvett adatokat.  
2. Bevitt adatok között szerepelnek a fenti követelményeknek nem megfelelő adatok.  
Elvárt eredmény: a rendszer hibaüzenetben jelzi a könyvtáros számára a hibát, a hibás adatokat tartalmazó mezőket jelöli az űrlapon,
az adatbázisban nem jelenik meg új rekord az Olvasó táblában.  

**Megjegyzés:**  
Amíg a rendszer teszteléséhez nem áll rendelkezésre vonalkód olvasó készülék, illetve vonalkód matricák, melyeket az olvasójegyre 
ragasztanak azonosítóként, az olvasójegy azonosító mezőt manuálisan töltjük ki egy megfelelő számsorozattal.   


**B) Olvasó adatainak módosítása:**  
Adatok módosítása esetén a könyvtáros először lekéri az olvasó 'adatlapját', melyet vagy az olvasót egyértelműen azonosító 
*Olvasójegy azonosító* vonalkód leolvasóval történő bevitelével tud megtenni, vagy a név beírását követően egy találati listából választja ki
a lakcím, születési dátum adatok alapján. Az adatokat tartalmazó űrlap megegyezik a regisztrációnál megjelenő 
űrlappal, csak a Felhasználó név és Jelszó mezők nem szerepelnek. Ezekből kifolyólag a bevitt adatoknak ugyanazoknak a formai és tartalmi 
követelményeknek kell megfelelni, melyek a fenti táblázatban szerepelnek. Ugyanakkor nem minden személyes adat módosítható természetüknél fogva, 
ezek az űrlapon nem módosítható mezőkként szerepelnek. A módosítható adatok listája:  

||Űrlap mező||
|-|---------|-|
||Családi név||
||Utónév||
||Lakcím, utca||
||Lakcím, irányítószám||
||Lakcím, város||
||Lakcím, házszám||
||Telefonszám||
||E-mail cím||

**Tesztesetek:**  
1. Azonosítás olvasójegy alapján nem regisztrált olvasóra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
2. Azonosítás olvasójegy alapján regisztrált olvasóra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
3. Keresés név alapján nem regisztrált olvasóra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
4. Keresés név alapján regisztrált olvasóra. Elvárt eredmény: a rendszer megjeleníti a találati listát, melyben kiválasztva az olvasót,
megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
5. Adatmódosítás helyes adatokkal. Elvárt eredmény: a megfelelő rekord módosul az Olvasó táblában. Az olvasó a rendszerbe való belépést követően
a *Személyes adatok* menüpontra kattintva tudja ellenőrizni a módosításokat.  
6. Adatmódosítás követelményeknek nem megfelelő adatokkal. Elvárt eredmény: a rendszer hibaüzenetben jelzi a könyvtáros számára a hibát,
a hibás adatokat tartalmazó mezőket jelöli az űrlapon, az adatbázisban nem módosul rekord az Olvasó táblában.


**C) Tagság rendezése:**   
A tagság rendezése esetén az olvasó tagságának érvényessége automatikusan meghosszabbítódik vagy az aktuális dátumtól kezdődő egy évre, vagy
a tagság lejáratának dátumától egy évre. Az olvasó azonosítása a módosítással nalóg módon történik, a megjelenő űrlapon minden mező csak olvasható,
egy gomb szolgál a hosszabbítás végrehajtására.  

**Tesztesetek:**  
1. Azonosítás olvasójegy alapján nem regisztrált olvasóra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
2. Azonosítás olvasójegy alapján regisztrált olvasóra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal, 
a tagság érvényessége mezőben a fentieknek megfelelő dátum szerepel. A véglegesítést követően az adatbázisban az Olvasó tábla megfelelő rekordja 
frissül, mely az Adatok módosítása menüpontban is ellenőrizhető.
3. Keresés név alapján nem regisztrált olvasóra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
4. Keresés név alapján regisztrált olvasóra. Elvárt eredmény: a rendszer megjeleníti a találati listát, melyben kiválasztva az olvasót, 
a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal, a tagság érvényessége mezőben a fentieknek megfelelő dátum szerepel. 
A véglegesítést követően az adatbázisban az Olvasó tábla megfelelő rekordja frissül, mely az Adatok módosítása menüpontban is ellenőrizhető.  


**D) Lejárt tagságú olvasók:**  
E funkció szolgál az 5 évnél régebben lejárt tagságú olvasók listázására, majd törlésére. A tesztet egy hamis olvasó rekorddal tudjuk elvégezni, 
melyet phpMyAdmin-ban viszünk fel az Olvasó táblába.

**Tesztesetek:**  
1. A lejárt tagságú olvasó megjelenik a listában, majd kijelölés nélkül a törlés gomb megnyomását követően az adatbázis Olvasó táblájában továbbra is 
szerepel a hozzá tartozó rekord.  
2. A lejárt tagságú olvasó megjelenik a listában, majd törlést követően az adatbázis Olvasó táblájában nem szerepel a hozzá tartozó rekord.  


### 11.2.2 Katalógus adminisztrációjának tesztelése:  

**A) Új könyv regisztrációja:**  
A könyvtáros a *Katalógus* menü *Új könyv felvétele* menüpontra kattint és elkezdi a regisztrációt. A megjelenő űrlapon a könyv alábbi 
táblázatban szereplő adatait felviszi. Ha befejezte az adatok felvitelét az *Könyv felvétele katalógusba* gombra kattint.  

||Űrlap mező|Követelmények||
|-|---------|-------------|-|
||Szerző(k)|1. Kötelező 2. Nem tartalmazhat számot 3. Kötött formátum: a)szerző neve: családnév, utónév b)szerzők elválasztása pontosvesszővel ||
||Cím|1. Kötelező||
||Kiadó|1. Kötelező||
||Kiadási év|1. Kötelező 2. Kötött formátum: 4 számjegy (évszám) 3. Hitelesség||
||ISBN száma|1. Kötelező 2. Kötött formátum: 13 jegyű (a 2007. január 1. előtt kiadott könyveknél 10 jegyű)||
||Oldalak száma|1. Kötelező 2. Kötött formátum: pozitív egész szám||
||Cutter|1. Kötelező 2. Kötött formátum: betű-szóköz-szám||
||ETO jelzet|1. Kötelező 2. Kötött formátum||
||Tárgyszavak|1. Opcionális||
||Azonosító|1. Kötelező 2. Kötött formátum: 13 jegyű vonalkód azonosító 3. Egyedi minden példány esetén||

Mivel az adatbázisban külön tároljuk a Könyv egyed adatait és a Példány egyed adatait, új könyv felvétele során az adatbázis mindkét 
tábláját kell ellenőrizni.  

**Tesztesetek:**  
1. Teljesen új könyv (nem másodpéldány) felvétele katalógusba a fenti táblázatban szereplő követelményeknek megfelelő adatokkal. 
Elvárt eredmény: új rekord a Könyv táblában, és új rekord a Példány táblában az űrlapon szereplő adatokkal, a Példány külső 
kulcsa (ISBN) a Könyv ISBN mezőjével megegyezik. Az *Egyszerű keresés* és *Részletes keresés* művelet során kilistázza az új könyvet, 
ha megfelelő keresési feltételeket adunk meg.
2. Másodpéldány felvétele katalógusba a fenti táblázatban szereplő követelményeknek megfelelő adatokkal. Elvárt eredmény: új rekord 
az adatbázis Példány táblájában, megfelelő külső kulccsal a megadott ISBN számú Könyv rekordra. Az *Egyszerű keresés* és *Részletes keresés* művelet során kilistázza az új könyvet, 
ha megfelelő keresési feltételeket adunk meg.
3. A követelményeknek nem megfelelően kitöltött űrlap. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a könyvtáros felhasználó számára. 
Nem jelenik meg új rekord az adatbázisban.


**B) Könyv leselejtezése:**  
Könyv leselejtezése abban az esetben szükséges, ha a könyv megrongálódott. A művelethez szükséges a könyvpéldányt azonosító vonalkód matrica. 
A megjelenő űrlap az alábbi mezőkből áll, melyek közül egyedül az azonosítót kötelező kitölteni, ezt követően az *Adatok lekérése* gombra 
kattintva megjelennek a könyv adatai, ezek az űrlap mezők csak olvashatók.  

||Űrlap mező||
|-|---------|-|
||Azonosító||
||ISBN száma||
||Szerző(k)||
||Cím||
||Kiadó||
||Kiadási év||
||Oldalak száma||
||Cutter||
||ETO jelzet||
||Tárgyszavak||

**Tesztesetek:**
1. Regisztrált könyvpéldány leselejtezése. Elvárt eredmény: Azonosító bevitelét és az adatok lekérését követően megjelennek a könyv adatai. 
A *Könyvpéldány törlése katalógusból* gombra kattintva az adatbázis Példány táblájából törlődik a megfelelő rekord.
2. Nem regisztrált könyvpéldány leselejtezése. Elvárt eredmény: Azonosító bevitelét és az adatok lekérését követően a rendszer hibaüzenetben 
jelzi, hogy az azonosítón nincs regisztrálva könyvpéldány.


**C) Lejárt kölcsönzési határidős könyvek:**  
Ezt a Katalógus menüpontot választva a könyvtáros ki tudja listázni azokat a könyvpéldányokat, melyeket az olvasók nem hoztak vissza 
a kölcsönzési határidőn belül. Ez könyvtári gyakorlattól függ, hogy milyen eljárást alkalmaznak a lejárat jelzésére az olvasóknak, illetve 
hogy mikor törlik a katalógusból, mely lehet egy év de kettő is, megrendelőnk tájékozatatása alapján. Először természetesen e-mailben értesítik 
az olvasót a határidő lejártáról, mely a felületen gombnyomásra automatikusan történik. E művelet teszteléséhez először a Kölcsönzések táblába 
fel kell vennünk egy hamis rekordot egy regisztrált olvasóhoz, melyben a határidő lejárt.  

**Tesztesetek:**  
1. A hamis rekordot kilistázza a rendszer és megadja, hogy a határidőn túl hány nappal járt le. Checkbox kipipálása és e-mail küldése esetén 
a rendszer küld egy e-mail a kölcsönző olvasó részére. 
2. A hamis rekordot kilistázza a rendszer és megadja, hogy a határidőn túl hány nappal járt le. Checkbox kipipálása és könyv törlése katalógusból 
művelet esetén az adatbázisból törlődik a kölcsönzésre vonatkozó rekord a Kölcsönzések táblából, és a könyvpéldány a Példány táblából. 
A lejárt könyvek újbóli listázása esetén a könyv nem jelenik meg a listában.


**D) Egyszerű keresés:**   
Ezt a funkciót a rendszerbe való belépés előtt elegendő tesztelni, de rendelkezésre áll a felhasználók belépését követően is. Előfeltétele, hogy a 
fent részletezettek szerint sikeresen vegyünk fel új könyveket a katalógusba. Az űrlap egyetlen 'kulcsszó' mezőt tartalmaz, amely azonban több szóból 
állhat. (Pl. szerző esetén annak teljes neve.) A rendszer a Könyv egyedek összes attribútumát megvizsgálja, hogy egyezik-e a megadott kulcsszavakkal, 
és akkor talál egyezést, ha az attribútum egyezések ÉS kapcsolatban állnak egy adott Könyv egyedben. (Pl. Gárdonyi Géza esetén csak Gárdonyi Géza 
műveit listázza ki, Karinthy esetén Karinthy Frigyes és Karinthy Ferenc műveit is, illetve mindkét esetben a róluk szóló könyveket is, ha a címben 
vagy a tárgyszavakban szerepel a nevük.)

**Tesztesetek:**
1. Tetszőleges könyv attribútum(ok) megadása, amely egy és csak egy regisztrált könyvvel mutat egyezést. 
Elvárt eredmény: a találati listában szerepeljen a könyv - többszörös egyezés esetén is csak egyszer -, 
a találati listában a könyvre kattintva annak összes mezőjét meg lehet tekinteni, illetve a könyvpéldányokra 
vonatkozó kölcsönzési információkat.  
2. Tetszőleges könyv attribútum(ok) megadása, amely több regisztrált könyvvel mutat egyezést. 
Elvárt eredmény: a találati listában szerepeljen mindegyik tesztelt könyv - többszörös egyezés esetén is csak egyszer -, 
a találati listában a könyvekre kattintva annak összes mezőjét meg lehet tekinteni, illetve a könyvpéldányokra 
vonatkozó kölcsönzési információkat.  
3. Tetszőleges könyv attribútum(ok) megadása, amely egyetlen regisztrált könyvvel sem mutat egyezést. 
Elvárt eredmény: a rendszer jelezze, hogy nem talált a keresési feltételnek megfelelő könyvet.


**E) Részletes keresés:**  
Ezt a funkciót a rendszerbe való belépés előtt elegendő tesztelni, de rendelkezésre áll a felhasználók belépését követően is. Előfeltétele, hogy a 
fent részletezettek szerint sikeresen vegyünk fel új könyveket a katalógusba. A részletes keresés esetén a Könyv minden attribútumát külön-külön 
meghatározhatjuk, melyeknek egyezést kell mutatni a keresett könyv megfelelő attribútumaival. A részletes keresés űrlap az alábbi mezőket tartalmazza:  

||Űrlap mező||
|-|---------|-|
||Szerző(k)||
||Cím||
||Kiadó||
||Kiadási év||
||ISBN száma||
||Oldalak száma||
||Cutter||
||ETO jelzet||
||Tárgyszavak||
||Azonosító||  

**Tesztesetek:**  
1. Tetszőleges könyv attribútum(ok) megadása, amely egy és csak egy regisztrált könyvvel mutat egyezést. 
Elvárt eredmény: a találati listában szerepeljen a könyv - többszörös egyezés esetén is csak egyszer -, 
a találati listában a könyvre kattintva annak összes mezőjét meg lehet tekinteni, illetve a könyvpéldányokra 
vonatkozó kölcsönzési információkat.  
2. Tetszőleges könyv attribútum(ok) megadása, amely több regisztrált könyvvel mutat egyezést. 
Elvárt eredmény: a találati listában szerepeljen mindegyik tesztelt könyv - többszörös egyezés esetén is csak egyszer -, 
a találati listában a könyvekre kattintva annak összes mezőjét meg lehet tekinteni, illetve a könyvpéldányokra 
vonatkozó kölcsönzési információkat.  
3. Tetszőleges könyv attribútum(ok) megadása, amely egyetlen regisztrált könyvvel sem mutat egyezést. 
Elvárt eredmény: a rendszer jelezze, hogy nem talált a keresési feltételnek megfelelő könyvet.  

**F) Teljes leltár:**  
A teljes leltárt évente egyszer végzik a könyvtárban, a ki nem kölcsönzött könyveket sorban leltárba veszik, ekkor a könyvpéldány 
leltárba vételi dátuma megváltozik. Ha minden könyvet leltárba vettek a *Teljes leltár vége* menüpontban lehet ellenórizni, hogy mely 
könyveket nem vettek leltárba azok közül, amelyek a katalógusban szerepelnek és nincsenek kikölcsönözve. A leltárba vétel a könyvek 
vonalkódos azonosítójának beolvasásával történik.  

**Tesztesetek:**  
1. A katalógusba felvett könyvek közül bizonyos könyveket nem veszünk leltárba. Elvárt eredmény: a leltárba nem vett könyvek a teljes leltár 
vége megnyomása esetén kilistázódnak. A többi könyv leltárba vételi dátuma a Példány táblában az aktuális dátum. 
2. A listában szereplő könyveket törlésre kijelöljük és megnyomjuk a *Könyv törlése katalógusból* gombot. Elvárt eredmény: a kijelölt könyvek 
rekordjai a Példány táblában törlésre kerülnek.

**G) Könyv kikölcsönzése:**  
A kölcsönzés első lépése a kölcsönző olvasó azonosítása. Ez történhet a vonalkód leolvasásával, vagy név alapján történő kereséssel. Ezt követően 
lehet a könyvek vonalkód azonosítóját beolvasva azokat kiadni.

**Tesztesetek:**  
1. Olvasójegy azonosító megadása, és Azonosítás gomb megnyomása. Elvárt eredmény: létező olvasó esetén az űrlapon megjelenik az olvasó teljes neve, 
tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.
2. Olvasó nevének megadása, és keresés megnyomása. Elvárt eredmény: létező olvasó esetén a találati listában megjelenik minden egyező nevű olvasó.
3. Olvasó kiválasztása találati listából, lakcím és születési dátum alapján. Elvárt eredmény: az űrlapon megjelenik az olvasó vonalkódos 
azonosítója, tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.
4. Kölcsönzésre kerülő könyvpéldány azonosítójának megadása, adatok lekérése, kikölcsönzés. Elvárt eredény: az adatok lekérését követően az 
űrlapon megjelennek a könyv adatai. A kölcsönzést követően a Kölcsönzések táblában megjelenik egy új rekord a megfelelő adatokkal.

**H) Kölcsönzési határidő hosszabbítása:**  
A könyv hosszabbításának első lépése - az olvasó azonosítása - megegyezik a kölcsönzés első lépésével a fentiekben leírtak szerint. 
Ezt követően megjelenik egy lista kölcsönzött könyvek szerző, cím és azonosító adataival. A könyvek bejelölését követően a 
*Kölcsönzési határidő hosszabbítása* gombra kattintva a határidő az előző határidő plusz egy hónapra módosul. Ha már volt hosszabbítva, 
akkor a rendszer üzenetben jelzi, hogy további hosszabbítás nem lehetséges.

**Tesztesetek:**  
1. Olvasójegy azonosító megadása, és Azonosítás gomb megnyomása. Elvárt eredmény: létező olvasó esetén az űrlapon megjelenik az olvasó teljes neve, 
tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.  
2. Olvasó nevének megadása, és keresés megnyomása. Elvárt eredmény: létező olvasó esetén a találati listában megjelenik minden egyező nevű olvasó.  
3. Olvasó kiválasztása találati listából, lakcím és születési dátum alapján. Elvárt eredmény: az űrlapon megjelenik az olvasó vonalkódos 
azonosítója, tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.  
4. Még nem hosszabbított kölcsönzés határidejének hosszabbítása. Elvárt eredmény: a Kölcsönzések táblában a határidő egy hónappal módosul, 
és a hosszabítva mező igaz értéket kap.  
4. Már meghosszabbított kölcsönzés határidejének hosszabbítása. Elvárt eredmény: a rendszer üzenetben jelzi, hogy ez nem lehetséges. 
A Kölcsönzések táblában a határidő nem módosul.  

**I) Könyv visszavétele:**  
A könyv visszavételének első lépése - az olvasó azonosítása - megegyezik a kölcsönzés első lépésével a fentiekben leírtak szerint. 
Ezt követően lehet a könyvek vonalkód azonosítóját beolvasva azokat visszavételezni. Ha határidőn túl hozta vissza az olvasó a könyveket 
a rendszer üzenetben jelzi a késedelem és a késedelmi díj értékét.

**Tesztesetek:**  
1. Olvasójegy azonosító megadása, és Azonosítás gomb megnyomása. Elvárt eredmény: létező olvasó esetén az űrlapon megjelenik az olvasó teljes neve, 
tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.
2. Olvasó nevének megadása, és keresés megnyomása. Elvárt eredmény: létező olvasó esetén a találati listában megjelenik minden egyező nevű olvasó.
3. Olvasó kiválasztása találati listából, lakcím és születési dátum alapján. Elvárt eredmény: az űrlapon megjelenik az olvasó vonalkódos 
azonosítója, tagságának érvényessége, valamint a kölcsönzési határidő, amely az aktuális dátumtól számított egy hónap.
4. Kikölcsönzött könyvpéldány azonosítójának megadása, adatok lekérése, visszavételezés. Elvárt eredény: az adatok lekérését követően az 
űrlapon megjelennek a könyv adatai. A visszavételezést követően a Kölcsönzések táblában az adott kölcsönzéshez tartozó rekordban a 
'kölcsönzés vége' mezőbe az aktuális dátum kerül.  
5. Visszavételezés vége. Lejárt határidővel kerül visszavételezésre a könyv, melyhez egy hamis rekordot veszünk fel a Kölcsönzések táblába. 
Elvárt eredmény: a rendszer jelzi a késedelmes napok számát és a késedelmi díj értékét a könyvtáros számára.  

### 11.3 Személyes adatok kezelése:  

**A) Személyes adatok megjelenítése, elérhetőségek módosítása:**  
A rendszerbe való belépést követően elérhetővé válik minden felhasználó - olvasó, könyvtáros, adminisztrátor könyvtáros - számára. 
Az olvasók a könyvtárosok által felvett adatokat tudják ellenőrizni, a könyvtárosok az adminisztárok által felvett adatokat. 
Módosítani csak a telefonszámot és az e-mail címet lehetséges, a többi mező csak olvasható. Az alábbi űrlap jelenik meg:  


||Űrlap mező||
|-|---------|-|
||Családi név||
||Utónév||
||Születési családi név||
||Születési utónév||
||Születési hely||
||Születési dátum||
||Anyja születési családi neve||
||Anyja születési utóneve||
||Lakcím, irányítószám||
||Lakcím, város||
||Lakcím, utca||
||Lakcím, házszám||
||Telefonszám||
||E-mail cím||  
  
  
A telefonszám és e-mail cím formai követelményei megegyeznek az 'olvasó regisztrálása a rendszerben' pontban megadottakkal.  
  
**Tesztesetek:**  
1. E-mail cím és telefonszám módosítása. Elvárt eredmény: a bejelentkezett felhasználó típusának megfelelő - Olvasó vagy Könyvtáros - táblában 
a megfelelő mezők módosulnak.  

**B) Jelszó cseréje:**  
A rendszerbe való belépést követően elérhetővé válik minden felhasználó - olvasó, könyvtáros, adminisztrátor könyvtáros - számára. 
Az űrlapon szükséges megadni a régi jelszót, és az új jelszót két mezőben. Ezt követően lehet módosítani azt. A jelszóval szembeni 
formai követelmény, hogy minimum 8 karakter hosszú legyen.    

**Tesztesetek:**  
1. Helyes régi jelszó, új jelszó mindkét mezőben ugyanaz. Elvárt eredmény: a jelszó módosul. A rendszerből való kilépést követően 
az újbóli belépés során az új jelszóval be tud lépni a felhasználó.
2. Hibás régi jelszó, nem egyező új jelszó mezők, vagy 8 karakternél rövidebb új jelszó megadása. Elvárt eredmény: a rendszer 
hibaüzenetben jelzi az adott hibát a felhasználó számára. A jelszó nem módosul.   


## 12. Telepítési terv
Fizikai telepítési terv:
-Szükség van egy adatbázis szerverre, amely közvetlenül csatlakozik a webszerververhez.
-A webszerverre közvetlenül az internetről kapcsolódnak rá a kliensek.

Szoftver telepítési terv:
-A szoftver webes felületéhez csak egy ajánlott a böngésző telepítése szükséges (
Google Chrome, Firefox, Opera, Edge) külön szoftver nem kell hozzá.


