# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv
Tesztelést végezte: 	Jakab Zsolt  
Operációs rendszer:	WIN10  
Böngésző: 		Google Chrome  
Dátum: 		2021.01.14  
Talált hibák száma: 	2  
## Olvasók adminisztrációjának tesztelése 

### 	Olvasó regisztrálása
-	Olvasó menüpont Beiratkozás almenüre kattintva betöltődik az oldal, ahol regisztrálható egy olvasó.
- Első lépésben nem adtam meg felhasználói nevet, a megjelenő hibaüzenet:
A felhasználói név minimum 5, maximum 40 karakter hosszú legyen és betűkből, számjegyekből álljon.
-	Jelszó megadása nélkül vagy nem a születési dátumból álló jelszóval megjelenő hibaüzenet: A jelszó a születési dátum számjegyeiből álljon év, hónap, nap sorrendben.
-	Ha nem adok meg családi nevet, vagy családi név mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A családnév vagy utónév nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg utónevet, vagy utónév mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A családnév vagy utónév nem megfelelő formátumú vagy nincs megadva.
-	 Ha nem adok meg születési családi nevet, vagy születési családi név mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési családnév vagy utónév nem megfelelő formátumú.
-	Ha nem adok meg születési utónevet, vagy születési utónév mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési családnév vagy utónév nem megfelelő formátumú.
-	Ha nem adok meg születési helyet, vagy kisbetűvel írtam, vagy születési hely mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A születési hely nem megfelelő formátumú vagy nincs megadva.
-	Születési dátumot üresen hagyva, vagy nem éééé.hh.nn, vagy nem éééé-hh-nn formátumban írtam be, akkor a megjelenő hibaüzenet: A születési dátum nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg anyja születési családi nevet, vagy a mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: Anyja születési családneve és utóneve nem megfelelő formátumú vagy nincs megadva.
- Ha nem adok meg anyja születési utónevet, vagy a mezőben a névbe beleírtam egy számot is, akkor megjelenő hibaüzenet: Anyja születési családneve és utóneve nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg irányítószámot, vagy a mezőben három karakteres számot írok, akkor megjelenő hibaüzenet: Az irányítószám nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg Lakcímet, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A város nem megfelelő formátumú vagy nincs megadva.
-	Ha nem írok semmit a ’Lakcím, utca’ mezőbe, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, vagy nem írtam u. vagy utca vagy út tagot, akkor megjelenő hibaüzenet: Az utca mező nem megfelelő formátumú vagy nincs megadva.
- **Hiba**: Ha nem írok semmit a ’Lakcím, házszám’ mezőbe, nem jelenik meg hibaüzenet, helyette A olvasót sikeresen regisztrálta a nyilvántartásban. szöveg jelenik meg.
-	Ha a telefonszámot mezőt nem töltöm ki, akkor a megjelenő hibaüzenet: Telefonszám nincs megadva.
-	Ha telefonszám mezőbe csak 10 számjegyű számot írok, vagy 12-t akkor a megjelenő hibaüzenet: A telefonszámnak 11 számjegyből kell állnia.
-	A telefonszám mezőbe csak számokat tudok beírni.
-	Email cím mezőbe a @ elé nem írok semmit, akkor a ’Kérjük adja meg a @ előtti részt is, a cím nem teljes’ üzenet jelenik meg.
-	Ha az email cím mezőbe nem írok .com, vagy .hu végződést, akkor a megjelenő hibaüzenet: Az email címe nem megfelelő formátumú.
-	Ha az email cím mezőbe .huh végződést írok, akkor a megjelenő hibaüzenet: Nem létező mail szerver szerepel a megadott email címben.
-	Olvasójegy azonosító mezőbe nem írok semmit, vagy 9 számot írok be, akkor a megjelenő hibaüzenet: Az olvasójegy azonosító pontosan 8 karakter hosszú számsor legyen.
-	Olvasójegy azonosító mezőbe csak számjegyeket tudok beírni.
-	Az összes mezőt helyesen kitöltve a megjelenő üzenet: Az olvasót sikeresen regisztrálta a nyilvántartásban.
-	Ugyanazzal a felhasználó névvel kitöltve a felhasználó név mezőt, a megjelenő hibaüzenet: A megadott felhasználói néven már van regisztrálva olvasó. A megadott olvasójegy azonosítón már van regisztrálva olvasó.
-	A olvasó/Adatok módosítása almenüpontban le tudtam kérni a felvitt olvasó adatait.
-	Az regisztrált olvasó felhasználó nevével és jelszavával be tudtam lépni a rendszerbe. A megjelenő menüpontok: Kezdőlap, Katalógus, Könyveim.
-	A Személyes adatok menüpontra kattintva megjelennek a felvitt személyes adatok.

### 	Olvasó adatainak módosítása
- Olvasó menüpont Adatok módosítása almenüre kattintva betöltődik az oldal, ahol meg lehet adni az olvasó kereséséhez az azonosítót vagy olvasó nevet.
-	Olvasójegy azonosító mezőbe nem létező azonosítót írtam be, a megjelenő hibaüzenet: Nincsen olvasó ezen az azonosítón.
- Olvasó neve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Nincsen olvasó ezen a néven.
-	Olvasójegy azonosító mezőbe létező felhasználót írtam be, akkor megjelennek az olvasó adatai.
-	Olvasójegy azonosító, Tagság érvényes, Születési családi név, Születési utónév, Születési hely, Születési dátum, Anyja születési családi neve, Anyja születési utóneve mezőket nem lehet módosítani, írásvédettek.
-	Ha nem adok meg irányítószámot, vagy a mezőben három karakteres számot írok, akkor megjelenő hibaüzenet: Az irányítószám nem megfelelő formátumú vagy nincs megadva.
-	Ha nem adok meg Lakcímet, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, akkor megjelenő hibaüzenet: A város nem megfelelő formátumú vagy nincs megadva.
-	Ha nem írok semmit a ’Lakcím, utca’ mezőbe, vagy kisbetűvel írtam, vagy a mezőben a helység nevébe beleírtam egy számot is, vagy nem írtam u. vagy utca vagy út tagot, akkor megjelenő hibaüzenet: Az utca mező nem megfelelő formátumú vagy nincs megadva.
- **Hiba**: Ha nem írok semmit a ’Lakcím, házszám’ mezőbe, nem jelenik meg hibaüzenet, helyette A olvasó adatait sikeresen módosította. szöveg jelenik meg.
-	Ha a telefonszámot mezőt nem töltöm ki, akkor a megjelenő hibaüzenet: Telefonszám nincs megadva.
-Ha telefonszám mezőbe csak 10 számjegyű számot írok, vagy 12-t akkor a megjelenő hibaüzenet: A telefonszámnak 11 számjegyből kell állnia.
-	A telefonszám mezőbe csak számokat tudok beírni.
- Email cím mezőbe a @ elé nem írok semmit, akkor a ’Kérjük adja meg a @ előtti részt is, a cím nem teljes’ üzenet jelenik meg.
-	Ha az email cím mezőbe nem írok .com, vagy .hu végződést, akkor a megjelenő hibaüzenet: Az email címe nem megfelelő formátumú.
-	Ha az email cím mezőbe .huh végződést írok, akkor a megjelenő hibaüzenet: Nem létező mail szerver szerepel a megadott email címben.
-	Helyesen kitöltve a mezőket a következő üzenet jelenik meg: A olvasó adatait sikeresen módosította.
-	Olvasó neve mezőbe nevet írtam be, megjelenik egy oldal, ahol ki tudom választani a lehetséges találtatok közül a keresett olvasót utána megjelennek az olvasó adatai.

### 	Tagság rendezése
-	Olvasó menüpont Tagság rendezése almenüre kattintva betöltődik az oldal, ahol meg lehet adni az olvasó kereséséhez az azonosítót vagy olvasó nevet.
- Olvasójegy azonosító mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Nincsen olvasó ezen az azonosítón.
- Olvasó neve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Ezen a néven nem szerepel olvasó a nyilvántartásban.
-	Olvasójegy azonosító mezőbe létező felhasználót írtam be, akkor megjelennek az olvasó adatai.
-	Olvasó neve mezőbe nevet írtam be, megjelenik egy oldal, ahol ki tudom választani a lehetséges találtatok közül a keresett olvasót utána megjelennek az olvasó adatai.
- Helyes azonosítót vagy nevet megadva, megjelennek az olvasó adatai, mindegyik mező írásvédett.
-	A Tagság meghosszabbítása gombra kattintva a következő üzenet jelenik meg: Az olvasó tagságát sikeresen meghosszabbította 2023.01.14. dátumig.


### 		Kiiratkozás
-	Olvasó menüpont Kiiratkozás almenüre kattintva betöltődik az oldal, ahol meg lehet adni az olvasó kereséséhez az azonosítót vagy olvasó nevet.
- Olvasójegy azonosító mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Nincsen olvasó ezen az azonosítón.
-	Olvasó neve mezőbe nem létező nevet írtam be, a megjelenő hibaüzenet: Ezen a néven nem szerepel olvasó a nyilvántartásban.
-	Olvasójegy azonosító mezőbe létező felhasználót írtam be, akkor megjelennek az olvasó adatai.
-	Olvasó neve mezőbe nevet írtam be, megjelenik egy oldal, ahol ki tudom választani a lehetséges találtatok közül a keresett olvasót utána megjelennek az olvasó adatai.
- Helyes azonosítót vagy nevet megadva, megjelennek az olvasó adatai, mindegyik mező írásvédett.
-	A Tagság megszüntetése gombra kattintva a következő üzenet jelenik meg: Az olvasó tagságát sikeresen megszüntette, törölte a nyilvántartásból.

### 	Lejárt tagságú olvasók
-	Olvasó menüpont Lejárt tagságú olvasók almenüre kattintva üzenet jelenik meg: Nincsenek 5 éve lejárt tagságú olvasók.
- Az adatbázisba felvittem egy olvasót, akinek a tagságát úgy állítottam be, hogy eleve lejárt. Lejárt tagságú olvasók almenüre kattintva megjelenik a lista, benne a felvitt olvasóval. A Törlés a nyilvántartásból gombra kattintva a következő üzenet jelenik meg: A következő olvasók törölve lettek a nyilvántartásból: [felhasználó név]. Az olvasó törlődött az adatbázisból.


