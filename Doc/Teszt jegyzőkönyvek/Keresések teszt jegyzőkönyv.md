# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv
   
Tesztelést végezte: Béres Gábor  
Operációs rendszer:	WIN10  
Böngésző: Google Chrome  
Dátum: 2021.01.15  
Talált hibák száma: 1  
   
## Egyszerű és részletes keresés tesztelése 

### Egyszerű keresés

A Katalógus menüpont Egyszerű keresés almenüre kattintva betöltődik az oldal, ahol megadható egy szövegmezőben a keresési feltétel, egy vagy több kulcsszó, 
mely lehet egy szerző, cím, tárgyszó vagy ezek kombinációja.  

1. Első lépésben felvettem a Katalógus, Új könyv felvétele menüpontban három könyvet „kortárs amerikai irodalom” és egyet „történelem, italok” 
tárgyszóval:  
	a)	Chabon, Michael : Kavalier és Clay bámulatos kalandjai (2 példányban)  
	b)	Chabon, Michael : Ragyog a hold   
	c)	Franzen, Jonathan : Javítások  
	d)	Standage, Tom: Hat pohár világtörténelem (2 példányban)  
Az első könyvből egy példányt kikölcsönöztem egy olvasónak, a negyedikből mindkettőt.  
2. Második lépésben megnyitottam az egyszerű keresés űrlapot, és a következő kifejezéseket írtam a kereső mezőbe:  
	- *Michael Chabon*: a Keresés gombra kattintva egy lista jelenik meg, melyben Michael Chabon két fenti műve jelenik meg, 
a kiadási év és a példányok számát megjelenítve helyesen. A könyvek címe egy-egy link, melyre kattintva megjelennek a könyvek 
részletes adatai egy űrlapon, melynek nem módosíthatóak a mezői, valamint egy lista, mely a könyvpéldányok azonosítóját 
és kölcsönzési információt tartalmaz. Az első könyv esetén helyesen az egyik példány esetén "kölcsönözhető", míg a másik esetén 
"Kiadva: 2021-02-15-ig" jelenik meg.  
	- *Ragyog a hold* vagy *ragyog* vagy *hold*: a Keresés gombra kattintva a fenti b) könyv jelenik, meg egy listában, 
a részletes adatok az 1. ponthoz hasonlóan lekérdezhetőek voltak.  
	- *kortárs amerikai irodalom* vagy *amerikai irodalom* vagy *kortárs irodalom*: a Keresés gombra kattintva megjelenik mind a három a-c) fenti mű, 
melyet előzetesen felvettem, részletes adatok szintén lekérdezhetőek az egyes könyvekre.  
  

### Részletes keresés

A Katalógus menüpont Részletes keresés almenüre kattintva betöltődik az oldal, amely egy űrlapot tartalmaz, amely a könyvek minden, 
az adatbázisban tárolt attribútumát valamint a példány azonosítót tartalmazza mint kitölthető mezőt. A keresési feltételek **ÉS** kapcsolatban 
állnak a keresés esetén.  
  
3. Ennek megfelelően az alábbi teszteket végeztem:  
	- A szerzők mezőbe írva *Michael Chabon*-t, mindkét felvett műve megjelenik.  
	- A szerzők mezőbe *Michael Chabon*-t, a címbe *Ragyog* vagy *Ragyog a hold* kifejezést írva a keresés eredménye a fenti b) könyv.  
	- Az előző két feltétel mellett a kiadási évet *2004*-re állítva, „Nincs a keresési feltételeknek megfelelő könyv.” üzenet jelenik meg.  
	- Ha csak a kiadási évet adom meg, *2020*-ra állítva, a fenti listában szereplő b) és d) könyv jelenik meg egy listában, melyek kiadási éve 2020.  
	- A kiadónak az *Akadémiai Kiadó*-t megadva egyedül Tom Standage könyve jelenik, amely az adott kiadónál jelent meg.  
	- A kiadónak a *21. század kiadó* nevet megadva, az összes könyv megjelenik, amely az adott kiadóval lett felvéve az adatbázisba, 
többek között az a) és b) pont alatti könyvek.  
	- **Hiba**: A d) pont alatti könyv *ISBN számát* megadva, a keresés során az összes felvett könyv megjelenik.  
	- A Cutternek *S 10*-et megadva megjelenik Tom Standage könyve.  
	- A tárgyszavakban a *történelem* kulcsszót megadva a történelmi tárgyú könyvek jelennek meg, többek között a d) könyv.  
	- A tárgyszavak mezőben *kortárs amerikai irodalom*, a szerző mezőben *Tom Standage* nevet megadva, 
„Nincs a keresési feltételeknek megfelelő könyv.” üzenet jelenik meg.  
	- Az azonosító mezőbe megadva Tom Standage könyvének egyik *példányazonosítóját*, megjelenik a könyv a listában.  
  
A fenti lekérdezések eredményeként megjelenő listák mindegyikében a könyv szerzőjét és címét tartalmazó szöveg egy link a 
könyv részletes adatait tartalmazó, csak olvasható mezőket tartalmazó űrlapra, valamint az egyes példányok kölcsönzési adatait tartalmazó listára.  


