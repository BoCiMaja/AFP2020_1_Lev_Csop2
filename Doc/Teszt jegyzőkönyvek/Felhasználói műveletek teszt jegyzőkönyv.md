# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv  
  
Tesztelést végezte: Béres Gábor  
Operációs rendszer:	WIN10  
Böngésző: Google Chrome  
Dátum: 2021.01.15.  
Talált hibák száma: 0  
   
## Felhasználói műveletek tesztelése   
  
### Felhasználói adatok módosítása  
  
A rendszerbe való belépést követően a navigációs sáv jobb oldalán megjelenik, hogy ki van bejelentkezve, erre kattintva egy legördülő menü 
nyílik meg, ahol elérhető a felhasználói adatok módosítása űrlap, melyen megjelennek a regisztráció során felvett adatok, melyek közül 
azonban csak a telefonszám és e-mail cím mezők módosíthatóak.  
	1. Első lépésben felvettem saját magamat mint olvasót az adatbázisba saját személyes adataimmal.  
	2. Belépést követően megnyitottam a *Felhasználói adatok módosítása* űrlapot, melyen csak a telefonszámot és az e-mail címet tudtam módosítani.  
	3. A telefonszámnak nem 11 jegyű számot adva a következő hibaüzenet jelent meg: „A telefonszámnak 11 számjegyből kell állnia.”  
	4. Az e-mail címet gberes@invitel.co.uk címre módosítva a következő hibaüzenet jelent meg: „Nem létező mail szerver szerepel a megadott e-mail címben.”  
	5. Mindkét mezőt üresen hagyva a „Sikeresen módosította adatait.” üzenet jelent meg.  
	6. 11 számjegyből álló telefonszámot és gberes@gmail.com címet megadva szintén a „Sikeresen módosította adatait.” üzenet jelent meg.  
	7. Ha az email cím nem tartalmazott @ karaktert, vagy nem megengedett karaktert tartalmazott pl. vesszőt, a rendszer hibaüzenetben jelezte ezt a módosítás gomb megnyomása előtt.  
	

### Jelszó csere  
   
Az olvasó regisztrációjakor a születési dátum számjegyeiből álló jelszót lehet csak megadni, hogy a felhasználó első alkalommal emlékezzen rá. 
Első belépést követően lehet módosítani tetszőleges 8 karakterből álló vagy hosszabb jelszóra. 
Az űrlap 3 mezőt tartalmaz: Régi jelszó, Új jelszó (2-szer).  
	1. Először nem a jelenlegi jelszót adtam meg a régi jelszó mezőben, a következő hibaüzenetet kaptam: „A megadott régi jelszó hibás!”.  
	2. Másodszor helyesen adtam meg a régi jelszót, viszont csak 3 jegyű számot adtam meg új jelszóként. Erre az „Az új jelszó nincs 
	min. 8 karakter hosszú, vagy nem egyezik meg a megerősítő mezőben levővel.” üzenet jelent meg.  
	3. Harmadszor 8 karakter hosszú, de a két Új jelszó mezőben eltérő karaktersorozatot adtam meg, mire szintén a fenti hibaüzenet jelent meg.  
	4. Negyedszer helyesen megadva a régi jelszót és kétszer megadva a *barackfa* jelszót az Új jelszó mezőben, a „Sikeresen módosította jelszavát.” 
	üzenet jelent meg. Kilépést követően az új jelszóval tudtam belépni a rendszerbe.  
   	
### Könyveim   
   
Az olvasó által kölcsönzött könyvek megtekinthetők, ha az olvasó belép saját felhasználó neve alatt a rendszerbe.  
	1. Először könyvtárosként kikölcsönöztem magamnak egy könyvet.  
	2. Majd olvasóként belépve a Könyveim menüpontra kattintva megjelent egy lista, melyben a kikölcsönzött könyv szerzője, címe, 
	példányazonosítója valamint a kölcsönzési határidő szerepelt az elvárásoknak megfelelően.  
	
