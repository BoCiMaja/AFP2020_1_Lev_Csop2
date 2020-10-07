#Követelményspecifikáció

## 1. Vezetői összefoglaló

Egy vidéki önkormányzat pályázaton nyert bizonyos összeget városi könyvtárának modernizálására. 
Ezt egyrészt új könyvek beszerzésére, másrészt a jelenlegi katalógus- és kölcsönzési
nyilvántartó rendszerük szoftveres megoldással való lecserélésére szeretnék fordítani. 
Feladatunk tárgya ez utóbbi.

## 2. Jelenlegi helyzet leírása

- Jelenleg a könyvtár hagyományos cédulás könyvtári katalógus rendszert használ, mely minden 
könyvhöz egy katalógus cédulát rendel, mely egyik oldalán szerepelnek a könyvre vonatkozó
információk, úm.: szakirodalom esetén *ETO jelzet* és *cutter*, szépirodalom esetén csak *cutter*, 
mindkét esetben szerepel a *raktári szám, a szerző(k), a mű címe, kiadó neve, kiadás éve, 
oldalak száma, ISBN száma, beszerzési ára,* valamint szakirodalom esetén a könyv tárgyára 
utaló *tárgyszavak*.
- A cédulákat egy fiókos szekrényben tárolják, melyben a szépirodalom a szerző vezetéknevének 
kezdőbetűje, majd a cím ábécé sorrendbeli helye szerint van rendezve, míg a szakirodalomhoz 
tartozó cédulák az ETO szakjelzet szerint vannak rendezve a fiókokban, az egyes szakokon belül 
pedig szerző majd cím szerint ábécé sorrendben.
- Minden könyvhöz csatolva van a katalóguscédula egy másolata, melynek hátulján lévő táblázatban 
rögzítik a kölcsönző személy olvasójegyének azonosítóját. A kikölcsönzött könyvekből ezeket kiveszik, 
és a kölcsönző személyhez tartozó kartotékba helyezik, melyeket a könyvek kölcsönzésének lejárati 
határideje szerint rendezve és a dátumokat jelölve egy erre elkülönített helyen tárolnak míg vissza 
nem hozzák a könyveket. A kölcsönzött könyvek számát és a kölcsönzési határidőt a kölcsönző személy 
olvasójegyében is rögzítik. A kölcsönzési idő minden kikölcsönözhető könyv esetében egy hónap, melyet 
egyszer lehet hosszabbítani.
- A jelenlegi rendszer hátránya az olvasók számára többek között, hogy a szépirodalmi művek csak a szerző 
nevének ismeretében kereshetőek, szakirodalom esetén pedig szükséges az ETO osztályozás részletes ismerete, 
valamint rendkívül időigényes a katalógus böngészése, mivel a tárgyszavak nem minden esetben szerepelnek 
a cédulákon, amely segítené egy releváns mű megtalálását. Továbbá a katalógus az olvasók számára fizikai
voltánál fogva csak a könyvtárban érhető el.
- A könyvtárosok számára a rendszer hátránya az időigényes és körülményes papíralapú adminisztráció, 
a katalógus karbantartása, valamint az olvasók kölcsönzési határidőre való figyelmeztetése sem megoldott 
jelenleg. További hátrány, hogy mind a katalógus, mind a kölcsönzési nyilvántartás nagy helyigényű.

## 3. Vágyálomrendszer leírása
A cél a könyvtárban jelenleg papír alapon, manuálisan vezetett katalógus- és kölcsönzési nyilvántartó rendszer számítógépes nyilvántartásra történő lecserélésére, az előforduló munkafolyamatok hatékonyabb működésének elérése.
A kifejlesztésre kerülő informatikai rendszerben meg kell oldani a könyvek, könyvtárosok és a beiratkozott olvasók nyílvántartását, a nyilvántartásokban keresések végzését, valamint a kölcsönzések folyamatának kezelését.
A könyvtár dolgozói az azonosításukhoz szükséges bejelentkezés után tudjanak könyveket, beiratkozásokat felvinni a rendszerbe, vagy azokat törölni onnan, illetve legyen lehetőség a kölcsönzés és visszavétel műveletének lebonyolítására, úgy, hogy a könyveken és az olvasójegyeken elhelyezett vonalkódok leolvasásával lehessen azonosítani a kölcsönzött műveket és az olvasókat.
A katalógusban tárolt könyvek és az adatbázisban rögzített könyvtárosok, valamint olvasók esetén legyen lehetőség keresések, szűrések elvégzésére, illetve listák, kimutatások készítésére is.     
A könyvtári katalógusnak ezen kívül interneten keresztül online elérhetőnek kell lennie bárki számára, ebben bejelentkezés nélkül lehessen listázni, keresni a könyvtári műveket. 
A rendszer felhasználói felülete legyen egyszerűen kezelhető, könnyen tanulható, a folyamatok kezelése az eddig megszokott munkafolyamatokhoz közel álló módon működjön, azért, hogy a könyvtárosoknak minél kevesebb nehézséget okozzon az új rendszerre történő átállás.
A költséghatékony üzemeltetést szem elött tatrva lényeges szempont a platformfüggetlen működés, az operációs rendszertől való függetlenség megléte.
Fontos, hogy a megvalósítás során olyan technológiák kerüljenek felhasználásra, amik elterjedt szabványokon alapulnak, képesek megbízható működésre és üzemeltetésük nem igényel a szokásosnál speciálisabb szakértelmet, nagyobb költséget.
Ezen kívül a szoftver legyen felkeszítve arra, hogy igény esetén könnyen be lehessen vezetni más könyvtárakban is a használatát, valamint a kezelt adatbázis méretének növelésére és a funkciók bővítésére is nyitva álljon a lehetőség.
A fenti technológiai igényeknek megfelelően a megvalósítás MySql, Php, HTML, CSS, webszerver technológiák felhasználásával fog történni, a szoftver felhasználói felületét internet böngészőn keresztül lehet majd elérni.

## 4. A rendszerre vonatkozó pályázat, törvények, rendeletek, szabványok és ajánlások felsorolása


## 5. Jelenlegi üzleti folyamatok modellje
Üzleti szereplők: 	
-	kölcsönző (olvasó)

Üzleti munkatárs: 	
-	könyvtáros

Üzleti entitások: 		
-	cédula
-	könyv
-	olvasójegy
-	kartoték
-	selejtezési jegyzőkönyv

Üzleti folyamatok: 	
-	Új szépirodalmi könyv felvétele a katalógusba: könyvtáros a katalogizálandó könyv cédulájára felírja a könyv adatait (cutter, raktári szám, a szerző(k), a mű címe, kiadó neve, kiadás éve, oldalak száma, ISBN száma, beszerzési ára, tárgyszavak) => céduláról másolatot készít => cédulát a szépirodalmi katalógus fiókba helyezi szerző és cím szerinti ábécé sorrendben => cetli másolatát a könyv hátuljába teszi.
-	Új szakirodalmi könyv felvétele a katalógusba: könyvtáros a katalogizálandó könyv cédulájára felírja a könyv adatait (ETO jelzet, cutter, raktári szám, a szerző(k), a mű címe, kiadó neve, kiadás éve, oldalak száma, ISBN száma, beszerzési ára) => céduláról másolatot készít => cédulát a szakirodalmi katalógus fiókba helyezi ETO szakjelzet szerinti sorrendben => cetli másolatát a könyv hátuljába teszi.
-	Új kölcsönző regisztrálása: könyvtáros az új kölcsönző adataival kitölt egy új kartotékot => kartotékot kartoték rendezőbe helyezi név szerinti ábécé sorrendben => új olvasókártyát kitölti a személy adataival és átadja a kölcsönzőnek.
-	Szépirodalmi könyv keresése: kölcsönző szépirodalmi katalógus fiókhoz megy => szerző és cím szerint cédulát megkeresi => a megtalált cédulán szereplő helyről a könyvet leveszi => elviszi a könyvet a könyvtáros pulthoz.
-	Szakirodalmi könyv keresése: kölcsönző szakirodalmi katalógus fiókhoz megy => ETO szakjelzés szerint cédulát megkeresi => a megtalált cédulán szereplő helyről a könyvet leveszi => elviszi a könyvet a könyvtáros pulthoz.
-	Kölcsönzés – könyv kivétele: könyvtáros a könyvből kiveszi a cédulát => cédula hátulján lévő táblázatban rögzíti a kölcsönző személy olvasójegyének azonosítóját => cetlit a kölcsönzőhöz tartozó kartotékba helyezi kölcsönzésének lejárati határideje szerint rendezve => a könyvtáros rögzíti a kölcsönzött könyvek számát és a kölcsönzési határidőt a kölcsönző személy olvasójegyében.
-	Kölcsönzés - könyv visszavétele: kölcsönző átadja a könyvet és az olvasójegyet a könyvtárosnak => könyvtáros az olvasójegyen regisztrálja a visszavétel tényét és a jegyet visszaadja a kölcsönzőnek => a kölcsönző kartotékjából a könyvhöz tartozó cetlit (kiveszi és rögzíti rajta a visszavételt) = > cetlit visszahelyezi a könyv hátuljába => könyvet elhelyezi a "polcra visszahelyezendő" feliratú gyűjtőkosárba.
-	Selejtezés: könyvtáros kitölti a selejtezésre váró könyvről a selejtezési jegyzőkönyvet => jegyzőkönyvhöz csatolja a könyv mindkét céduláját => könyvet elhelyezi a selejt tárolóba => jegyzőkönyvet továbbítja iktatásra.

## 6. Igényelt üzleti folyamatok modellje

## 7. Követelménylista

## 8. Irányított és szabad szöveges riportok szövege

## 9. Fogalomszótár

- **ETO jelzet**: nemzetközi könyvtári osztályozórendszer, amely az ismeretterjesztő és szakdokumentumokat 
	a tartalmuk szerint csoportosítja, és osztályokba rendezi.
- **cutter**: a könyvtár polcain, illetve a raktárban található helyére utaló azonosító, amely a szerző vezetéknevének 
	kezdőbetűjéből, és egy számból áll, mely a szerző és a cím ábécé sorrend szerinti helyére vonatkozik ezen belül.
- **raktári szám**: minden, a könyvtárban található könyvhöz tartozó egyedi 6 számjegyű azonosító.
- **ISBN szám**: International Standard Book Number, 13 jegyű (a 2007. január 1. előtt kiadott könyveknél 10 jegyű) 
	azonosítószám, a könyvek és egyéb monografikus jellegű művek nyilvántartására szolgáló nemzetközi 
	szabványos számrendszerhez tartozó kód.
