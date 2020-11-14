# Rendszerterv

## 1. A rendszer célja

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
A felhasználók által elérhető felület kialakítása, amin keresztűl a backend által biztosított szolgáltatások igénybevételével elérhetőek a rendszerben a felhasználók rendelkezésére álló funkciók.

Backend:
- Béres Gábor
- Jakab Zsolt
- Németh Richárd
- Szűcs János
Feladatuk az adatbázis szerkezetek kialakítása, funkciók létrehozása, a frontend kiszolgálása adatokkal.

Tesztelés:
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
|| |Adatbázis megvalósítása a szerveren|     1 |       1 |                1 |         0 |             1 ||
||Login felület|Képernyődizájn elkészítése|  2 |       8 |                8 |         0 |             8 ||


### 2.4 Mérföldkövek 

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
A könyvtáros az ‘Olvasó‘ menü ‘Kiiratkozás‘ menüpontjára kattint. 
1) Ha megvan az olvasó olvasójegye, akkor a könyvtáros belekattint az űrlap ‘Olvasójegy azonosító‘ mezőbe és beolvassa az olvasójegyen lévő vonalkódot. Az olvasójegy azonosítója alapján csak egy felhasználó lehet az adatbázisban.
2) Ha nincs meg az olvasójegy, akkor a könyvtáros kitölti az űrlap mezőit, amennyi információ a rendelkezésre áll. Ha a megadott adatok alapján több olvasót talált a rendszer az adatbázisban, akkor megjelenik egy hibaüzenet: „Több felhasználó egyezik a megadott adatokkal. Kérem adjon meg több adatot.”
A fenti adatok megadása után az ’Adatok lekérése’ gombra kattint. Ha az adatbázisban a lekérés megtalálta a keresett olvasót, az adatai megjelennek az űrlapon. A könyvtáros a ‘Tagság megszüntetése‘ gombra kattint és véglegesíti a törlést. A rendszer kitörli az adatbázisból az olvasót.

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
A könyvtáros az ‘Katalógus‘ menü ‘Könyv leselejtezése‘ menüpontjára kattint. 
1) Ha a könyvben megvan az azonosító vonalkódja és az nem sérült, akkor a könyvtáros belekattint az űrlap ‘Azonosító‘ mezőbe és beolvassa a könyvben lévő vonalkódot. A könyv azonosítója alapján csak egy könyv lehet az adatbázisban.
2) Ha nincs meg az azonosító vagy sérült a vonalkód és nem olvasható be, akkor a könyvtáros kitölti az űrlap mezőit, amennyi információ a rendelkezésre áll. Ha a megadott adatok alapján több könyvet talált a rendszer az adatbázisban, akkor megjelenik egy hibaüzenet: „Több könyv egyezik a megadott adatokkal. Kérem adjon meg több adatot.”
A fenti adatok megadása után az ‘Adatok lekérése‘ gombra kattint. Ha az adatbázisban a lekérés megtalálta a keresett könyvet, az adatai megjelennek az űrlapon. A könyvtáros a ‘Könyvpéldány törlése az adatbázisból‘ gombra kattintva véglegesíti a törlést. A rendszer kitörli az adatbázisból a könyvet.

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

### 6.2 Hardver és hálózati topológia 

### 6.3 Fizikai alrendszerek 

### 6.4 Fejlesztő eszközök 

### 6.5 Keretrendszer

## 7. Absztrakt domain modell

### 7.1 Domainspecifikáció, fogalmak 

### 7.2 Absztrakt komponensek, ezek kapcsolatai 

## 8. Architekturális terv

### 8.1 Architekturális tervezési minta

### 8.2 Az alkalmazás rétegei, fő komponensei, ezek kapcsolatai 

### 8.3 Változások kezelése 

### 8.4 Rendszer bővíthetősége 

### 8.5 Biztonsági funkciók 

## 9. Adatbázisterv

### 9.1 Logikai adatmodell 

### 9.2 Tárolt eljárások 

### 9.3 Fizikai adatmodellt legeneráló SQL szkript 

## 10. Implementációs terv

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

**Belépés a rendszerbe:**  
A kezdőoldalról be tud lépni a rendszerbe a felhasználónevévek és jelszavának megadásával. Az adminisztrátorok minden funkciót elérnek, 
melyeknek meg kell jelenni a navigációs sávban.  

**Tesztesetek.**  
1. Nem regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.
2. Regisztrált felhasználónév-jelszó kombináció. Elvárt eredmény: a rendszer belépteti a felhasználót, navigációs sáv megváltozik.  

**Könyvtáros regisztrálása:**  
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
2. Bevitt adatok között szerepelnek a fenti követelményeknek nem megfelelő adatok.  
Elvárt eredmény: a rendszer hibaüzenetben jelzi a felhasználó számára a hibát, a hibás adatokat tartalmazó mezőket jelöli az űrlapon,
az adatbázisban nem jelenik meg új rekord a Könyvtáros táblában.  

**Könyvtáros adatainak módosítása:**  
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

**Könyvtáros törlése:**  
Könyvtáros adatbázisból való törlése esetén az adminisztrátor először lekéri a könyvtáros 'adatlapját', melyet a könyvtáros meghatározó 
személyes adatainak (pl. Családi név, Utónév, szükség esetén Születési dátum) megadása után tud megtenni. Az űrlap megegyezik az Adatok 
módosítása űrlappal, viszont ezen az űrlapon a mezők egyike sem módosítható. Ezt követően a *Könytáros törlése nyilvántartásból* gomb 
megnyomása után üzenetben jelzi a rendszer a folyamat végét.  

**Tesztesetek:**  
1. Adatlekérés nem regisztrált könyvtárosra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.
2. Adatlekérés regisztrált könyvtárosra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
3. Sikeresen adatlekérést követően könyvtáros törlése. Elvárt eredmény: a megfelelő rekord törlődik a Könyvtáros táblából az adatbázisban.

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

**Olvasó regisztrálása a rendszerben:**  
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
2. Bevitt adatok között szerepelnek a fenti követelményeknek nem megfelelő adatok.  
Elvárt eredmény: a rendszer hibaüzenetben jelzi a könyvtáros számára a hibát, a hibás adatokat tartalmazó mezőket jelöli az űrlapon,
az adatbázisban nem jelenik meg új rekord az Olvasó táblában.

**Olvasó adatainak módosítása:**  
Adatok módosítása esetén a könyvtáros először lekéri az olvasó 'adatlapját', melyet az olvasót egyértelműen azonosító 
*Olvasójegy azonosító* vonalkód leolvasóval történő bevitelével tud megtenni. Az űrlap megegyezik a regisztrációnál megjelenő 
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

**Tesztesetek:**  
1. Adatlekérés nem regisztrált olvasóra. Elvárt eredmény: a rendszer hibaüzenetben jelzi ezt a felhasználó számára.  
2. Adatlekérés regisztrált olvasóra. Elvárt eredmény: a rendszer megjeleníti az űrlapot az adatbázisban szereplő adatokkal.
3. Adatmódosítás helyes adatokkal. Elvárt eredmény: a megfelelő rekord módosul az Olvasó táblában. Az olvasó a rendszerbe való belépést követően
a *Személyes adatok* menüpontra kattintva tudja ellenőrizni a módosításokat.  
4. Adatmódosítás követelményeknek nem megfelelő adatokkal. Elvárt eredmény: a rendszer hibaüzenetben jelzi a könyvtáros számára a hibát,
a hibás adatokat tartalmazó mezőket jelöli az űrlapon, az adatbázisban nem módosul rekord az Olvasó táblában.



## 12. Telepítési terv
Fizikai telepítési terv:
-Szükség van egy adatbázis szerverre, amely közvetlenül csatlakozik a webszerververhez.
-A webszerverre közvetlenül az internetről kapcsolódnak rá a kliensek.

Szoftver telepítési terv:
-A szoftver webes felületéhez csak egy ajánlott a böngésző telepítése szükséges (
Google Chrome, Firefox, Opera, Edge) külön szoftver nem kell hozzá.


