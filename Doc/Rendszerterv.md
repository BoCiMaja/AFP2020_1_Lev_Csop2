# Rendszerterv

## 1. A rendszer célja

## 2. Projektterv

### 2.1 Projektszerepkörök, felelősségek 

### 2.2 Projektmunkások és felelősségeik 

### 2.3 Ütemterv 

### 2.4 Mérföldkövek 

## 3. Üzleti folyamatok modellje

### 3.1 Üzleti szereplők 

### 3.2 Üzleti folyamatok 

### 3.3 Üzleti entitások 

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
Az *Olvasó* menü tartalmazza az *Beíratkozás, Adatok módosítása, Tagság rendezése, Kiíratkozás,* valamint a *Lejárt tagságok* menüpontokat, 
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
![Kezdőlap](https://github.com/beresgabor76/AFP2020_1_Lev_Csop2/blob/main/Doc/prototype/kezdolap.html)  

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


