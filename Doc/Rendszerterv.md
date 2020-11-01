# Rendszerterv

## 1. A rendszer célja

## 2. Projektterv

### 2.1 Projektszerepkörök, felelősségek 

### 2.2 Projektmunkások és felelősségeik 

### 2.3 Ütemterv 

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

### 5.2 Rendszerhasználati esetek és lefutásaik 

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

## 12. Telepítési terv



