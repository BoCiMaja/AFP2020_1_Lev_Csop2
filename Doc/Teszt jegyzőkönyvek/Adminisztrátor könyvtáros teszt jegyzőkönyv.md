# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv
Tesztelést végezte: 	Jakab Zsolt
Operációs rendszer:	WIN10
Böngésző: 		Google Chrome
Dátum: 		2021.01.13
Talált hibák száma: 	2  
## Adminisztrátor könyvtáros funkciók tesztelése 
### Belépés a rendszerbe
-	A menü „Belépés” pontjára kattintva megjelent a Belépési oldal.
-	Helytelen belépési adatokra megjelent üzenet: A megadott felhasználó név vagy jelszó hibás!
-	Helyes adminisztrátori belépési adatokra megjelent a Kezdőlap, jobb oldalon belépési állapot: Belépve: Admin. (Felhasználó név).  Az elérhető menüpontok: Kezdőlap, Olvasó, Könyvtáros, Katalógus, Kölcsönzés.
-	Belépési állapot menüre kattintva legördül egy menü, kiválasztva a Kilépés opciót, megjelenik a kezdőlap, jobb oldalon belépési állapot üres, nem jelenik meg semmi.

### Könyvtáros regisztrálása
-	Könyvtáros menüpont Regisztráció almenüre kattintva betöltődik az oldal, ahol regisztrálható egy könyvtáros.
-	Első lépésben nem adtam meg felhasználói nevet, a hibaüzenet:
A felhasználói név minimum 5, maximum 40 karakter hosszú legyen és betűkből, számjegyekből álljon.
-	Jelszó megadása nélkül vagy rövid jelszóval megjelenő hibaüzenet: A jelszó túl rövid, minimum 8 karakter hosszú legyen.
-	Ha nem adok meg családi nevet, vagy családi név mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A családnév vagy utónév nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg utónevet, vagy utónév mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A családnév vagy utónév nem megfelelő formátumú vagy nincs megadva.
-	 Ha nem adok meg születési családi nevet, vagy születési családi név mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési családnév vagy utónév nem megfelelő formátumú.
-	Ha nem adok meg születési utónevet, vagy születési utónév mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési családnév vagy utónév nem megfelelő formátumú.
-	Ha nem adok meg születési helyet, vagy kisbetűvel írtam, vagy születési hely mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési hely nem megfelelő formátumú vagy nincs megadva.
-	Születési dátumot üresen hagyva, vagy nem éééé.hh.nn, vagy nem éééé-hh-nn formátumban írtam be, akkor a megjelenő hibaüzenet: A születési dátum nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg anyja születési családi nevet, vagy a mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: Anyja születési családneve és utóneve nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg anyja születési utónevet, vagy a mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: Anyja születési családneve és utóneve nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg irányítószámot, vagy a mezőben három karakteres számot írok, akkor megjelenő hibaüzenet: Az irányítószám nem megfelelő formátumú vagy nincs megadva.
- Ha nem adok meg Lakcímet, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A város nem megfelelő formátumú vagy nincs megadva.
- Ha nem írok semmit a ’Lakcím, utca’ mezőbe, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, vagy nem írtam u. vagy utca vagy út tagot, akkor megjelenő hibaüzenet: Az utca mező nem megfelelő formátumú vagy nincs megadva.
- **Hiba**: Ha nem írok semmit a ’Lakcím, házszám’ mezőbe, nem jelenik meg hibaüzenet, helyette A könyvtárost sikeresen regisztrálta a nyilvántartásban. szöveg jelenik meg.
- Ha a telefonszámot mezőt nem töltöm ki, akkor a megjelenő hibaüzenet: Telefonszám nincs megadva.
- Ha telefonszám mezőbe csak 10 számjegyű számot írok, vagy 12-t akkor a megjelenő hibaüzenet: A telefonszámnak 11 számjegyből kell állnia.
- A telefonszám mezőbe csak számokat tudok beírni.
- Email cím mezőbe a @ elé nem írok semmit, akkor a ’Kérjük adja meg a @ előtti részt is, a cím nem teljes’ üzenet jelenik meg.
- Ha az email cím mezőbe nem írok .com, vagy .hu végződést, akkor a megjelenő hibaüzenet: Az email címe nem megfelelő formátumú.
- Ha az email cím mezőbe .huh végződést írok, akkor a megjelenő hibaüzenet: Nem létező mail szerver szerepel a megadott email címben.
- Az összes mezőt helyesen kitöltve a megjelenő üzenet: A könyvtárost sikeresen regisztrálta a nyilvántartásban.
- Ugyanazzal a felhasználó névvel kitöltve a felhasználó név mezőt, a megjelenő hibaüzenet: A megadott felhasználói néven már van regisztrálva könyvtáros.
- A Könyvtáros/Adatmódosítás almenüpontban le tudtam kérni a felvitt könyvtáros adatait.
- Az regisztrál könyvtáros felhasználó nevével és jelszavával be tudtam lépni a rendszerbe. A megjelenő menüpontok: Kezdőlap, Olvasó, Katalógus, Kölcsönzés.
- A Személyes adatok menüpontra kattintva megjelennek a felvitt személyes adatok.

### Könyvtáros adatainak módosítása
-	Könyvtáros menüpont Adatok módosítása almenüre kattintva betöltődik az oldal, ahol meg lehet adni a könyvtáros kereséséhez a felhasználó nevet, vagy könyvtáros nevet.
- Könyvtáros felhasználóneve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Nincsen könyvtáros ezen az azonosítón.
- Könyvtáros neve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Ezen a néven nem szerepel könyvtáros a nyilvántartásban.
- Könyvtáros felhasználóneve mezőbe létező felhasználót írtam be, akkor megjelennek a könyvtáros adatai, de a felhasználó név nincs köztük.
- Születési családi név, Születési utónév, Születési hely, Születési dátum, Anyja születési családi neve, Anyja születési utóneve mezőket nem lehet módosítani, írásvédettek.
- Ha nem adok meg irányítószámot, vagy a mezőben három karakteres számot írok, akkor megjelenő hibaüzenet: Az irányítószám nem megfelelő formátumú vagy nincs megadva.
- Ha nem adok meg Lakcímet, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A város nem megfelelő formátumú vagy nincs megadva.
- Ha nem írok semmit a ’Lakcím, utca’ mezőbe, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, vagy nem írtam u. vagy utca vagy út tagot, akkor megjelenő hibaüzenet: Az utca mező nem megfelelő formátumú vagy nincs megadva.
- **Hiba**: Ha nem írok semmit a ’Lakcím, házszám’ mezőbe, nem jelenik meg hibaüzenet, helyette A könyvtáros adatait sikeresen módosította. szöveg jelenik meg.
- Ha a telefonszámot mezőt nem töltöm ki, akkor a megjelenő hibaüzenet: Telefonszám nincs megadva.
- Ha telefonszám mezőbe csak 10 számjegyű számot írok, vagy 12-t akkor a megjelenő hibaüzenet: A telefonszámnak 11 számjegyből kell állnia.
- A telefonszám mezőbe csak számokat tudok beírni.
- Email cím mezőbe a @ elé nem írok semmit, akkor a ’Kérjük adja meg a @ előtti részt is, a cím nem teljes’ üzenet jelenik meg.
- Ha az email cím mezőbe nem írok .com, vagy .hu végződést, akkor a megjelenő hibaüzenet: Az email címe nem megfelelő formátumú.
- Ha az email cím mezőbe .huh végződést írok, akkor a megjelenő hibaüzenet: Nem létező mail szerver szerepel a megadott email címben.
- Helyesen kitöltve a mezőket a következő üzenet jelenik meg: A könyvtáros adatait sikeresen módosította.
- Könyvtáros neve mezőbe nevet írtam be, a megjelenik egy oldal, ahol ki tudom választani a lehetséges találtatok közül a keresett könyvtárost utána megjelennek a könyvtáros adatai.

### Könyvtáros törlése
- Könyvtáros menüpont Törlés almenüre kattintva betöltődik az oldal, ahol meg lehet adni a könyvtáros kereséséhez a felhasználó nevet, vagy könyvtáros nevet.
- Könyvtáros felhasználóneve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Nincsen könyvtáros ezen az azonosítón.
- Könyvtáros neve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Ezen a néven nem szerepel könyvtáros a nyilvántartásban.
- Könyvtáros felhasználóneve mezőbe létező felhasználót írtam be, akkor megjelennek a könyvtáros adatai, de a felhasználó név nincs köztük.
- Könyvtáros neve mezőbe nem nevet írtam be, a megjelenik egy oldal, ahol ki tudom választani a lehetséges találtatok közül a keresett könyvtárost utána megjelennek a könyvtáros adatai.
- Helyes felhasználó nevet megadva, megjelennek a könyvtáros adatai, mindegyik mező írásvédett.
- A Törlés a nyilvántartásból gombra kattintva a következő üzenet jelenik meg: A könyvtáros tagságát sikeresen megszüntette, törölte a nyilvántartásból.
 - A Könyvtáros/Adatmódosítás almenüpontban nem tudtam lekérni a törölt könyvtáros adatait, a megjelenő üzenet: Nincsen könyvtáros ezen az azonosítón.



