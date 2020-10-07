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

**Európai uniós rendeletek, irányelvek, ajánlások**
[AZ EURÓPAI PARLAMENT ÉS A TANÁCS (EU) 2019/790 IRÁNYELVE (2019. április 17.)] a digitális egységes piacon a szerzői és szomszédos jogokról, valamint a 96/9/EK és a 2001/29/EK irányelv módosításáról

[AZ EURÓPAI PARLAMENT ÉS A TANÁCS (EU) 2017/1563 RENDELETE (2017. szeptember 13.)] a szerzői és szomszédos jogi védelemben részesülő egyes művek és más teljesítmények hozzáférhető formátumú példányainak a vakok, látáskárosultak és nyomtatott szöveget egyéb okból használni képtelen személyek érdekét szolgáló, határokon átnyúló, az Unió és harmadik országok közötti cseréjéről

[2017/1564/EU európai parlamenti és tanácsi irányelv (2017. szeptember 13.)] a szerzői és szomszédos jogi védelemben részesülő egyes műveknek és más teljesítményeknek a vakok, látáskárosultak és nyomtatott szöveget egyéb okból használni képtelen személyek érdekét szolgáló egyes megengedett felhasználási módjairól, valamint az információs társadalomban a szerzői és szomszédos jogok egyes vonatkozásainak összehangolásáról szóló 2001/29/EK irányelv módosításáról szóló,

[AZ EURÓPAI PARLAMENT ÉS A TANÁCS (EU) 2016/679 RENDELETE (2016. április 27.)] a természetes személyeknek a személyes adatok kezelése tekintetében történő védelméről és az ilyen adatok szabad áramlásáról,

[2014/26/EU európai parlamenti és tanácsi irányelv] a szerzői és szomszédos jogokra vonatkozó közös jogkezelésről és a zeneművek belső piacon történő online felhasználásának több területre kiterjedő hatályú engedélyezéséről szóló 2014. február 26-i A Bizottság 2012/417/EU (2012. július 17.) ajánlása a tudományos információkhoz való hozzáférésről és azok megőrzéséről

[2012/417/EU (2012. július 17.)] ajánlása a tudományos információkhoz való hozzáférésről és azok megőrzéséről;

[2012/28/EU irányelv] az árva művek egyes megengedett felhasználási módjairól

[2006/115/EK irányelv] a bérleti jogról és a haszonkölcsönzési jogról, valamint a szellemi tulajdon területén a szerzői joggal szomszédos bizonyos jogokról

[A Bizottság 2011/711/EU ajánlása (2011. október 27.)] a kulturális anyagok digitalizálásáról és online hozzáférhetőségéről, valamint a digitális megőrzésről

[98/34/EK európai parlamenti és tanácsi irányelv] a műszaki szabványok és szabályok, valamint az információs társadalom szolgáltatásaira vonatkozó szabályok terén információszolgáltatási eljárás megállapításáról (a 98/48//EK európai parlamenti és tanácsi irányelvvel módosította)

[96/9/EK irányelv] (1996. március 11.) az adatbázisok jogi védelméről


**Miniszteri rendeletek**

[51/2014. (XII. 10.) EMMI rendelet] a múzeum, valamint az országos szakkönyvtár és a megyei könyvtár éves munkatervéhez szükséges szakmai mutatókról

[30/2014. (IV. 10.) EMMI rendelet] az országos múzeum, az országos szakmúzeum, a nemzeti könyvtár, az országos szakkönyvtár és az állami egyetem könyvtárának kiemelt feladatairól

[39/2013. (V. 31.) EMMI rendelet] a Könyvtárellátási Szolgáltató Rendszer
működéséről

[14/2011. (IV. 7.) NEFMI rendelet] a nyilvános haszonkölcsönzésért a szerzőt megillető díj megállapításához és felosztásához szükséges adatokról, valamint az adatszolgáltatásra kötelezett nyilvános könyvtárakról

[22/2005. (VII. 18.) NKÖM rendelet] a muzeális könyvtári dokumentumok kezelésével és nyilvántartásával kapcsolatos szabályokról

[7/1985. (IV. 26.) MM rendelet] a könyvtári anyagok bejelentéséről

[3/1975. (VIII. 17.) KM-PM együttes rendelet] a könyvtári állomány ellenőrzéséről (leltározásáról) és az állományból történő törlésről szóló szabályzat kiadásáról


**Könyvtári vonatkozású Kormányhatározatok**
[1341/2019. (VI. 11.) Korm. határozat] a Digitális Kompetencia Keretrendszer fejlesztéséről és bevezetésének lépéseiről

[1175/2018. (III. 28.) Korm. határozat] a Közgyűjteményi Digitalizálási Stratégia megvalósítása érdekében 2018-2021. évek között szükséges intézkedésekről

[1404/2017. (VI. 28.) Korm. határozat] a Digitális Nemzet Fejlesztési Program megvalósítása során elkészült Közgyűjteményi Digitalizálási Stratégiáról

**Törvények**

[1997. évi CXL. törvény] a muzeális intézményekről, a nyilvános könyvtári
ellátásról és a közművelődésről

[1992. XXXIII. törvény] a közalkalmazottak jogállásáról

[2012. évi CLII. törvény] a muzeális intézményekről, a nyilvános könyvtári ellátásról és a közművelődésről szóló 1997. évi CXL. törvény módosításáról

[2015. évi CXLIII. törvény] a közbeszerzésekről



## 5. Jelenlegi üzleti folyamatok modellje
Üzleti szereplők: 	
-	kölcsönző (olvasó)

Üzleti munkatárs: 	
-	könyvtáros

Üzleti entitások: 		
-	cédula
-	könyv
-	olvasójegy

Üzleti folyamatok: 	
-	szépirodalmi katalógus rendszer karbantartása: könyvtáros a katalogizálandó könyv cédulájára felírja 
a könyv adatait (cutter, raktári szám, a szerző(k), a mű címe, kiadó neve, kiadás éve, oldalak száma, ISBN száma, 
beszerzési ára, tárgyszavak) => céduláról másolatot készít => cédulát a szépirodalmi katalógus fiókba helyezi 
cím szerinti ábécé sorrendben => cetli másolatát a könyv hátuljába teszi,
-	szakirodalmi katalógus rendszer karbantartása: könyvtáros a katalogizálandó könyv cédulájára felírja a 
könyv adatait (ETO jelzet, cutter, raktári szám, a szerző(k), a mű címe, kiadó neve, kiadás éve, oldalak száma, 
ISBN száma, beszerzési ára) => céduláról másolatot készít => cédulát a szakirodalmi katalógus fiókba helyezi 
ETO szakjelzet szerinti sorrendben => cetli másolatát a könyv hátuljába teszi,
-	szépirodalmi könyv keresése: kölcsönző szépirodalmi katalógus fiókhoz megy => cím vagy tárgyszavak 
szerint cédulát megkeresi => a megtalált cédulán szereplő helyről a könyvet leveszi => elviszi a könyvet a 
könyvtáros pulthoz,
-	szakirodalmi könyv keresése: kölcsönző szakirodalmi katalógus fiókhoz megy => ETO szakjelzés szerint cédulát 
megkeresi => a megtalált cédulán szereplő helyről a könyvet leveszi => elviszi a könyvet a könyvtáros pulthoz,
-	kölcsönzés: könyvtáros a könyvből kiveszi a cédulát => cédula hátulján lévő táblázatban rögzíti a kölcsönző 
személy olvasójegyének azonosítóját => cetlit a kölcsönzőhöz tartozó kartotékba helyezi kölcsönzésének lejárati 
határideje szerint rendezve => a könyvtáros rögzíti a kölcsönzött könyvek számát és a kölcsönzési határidőt a 
kölcsönző személy olvasójegyében.

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