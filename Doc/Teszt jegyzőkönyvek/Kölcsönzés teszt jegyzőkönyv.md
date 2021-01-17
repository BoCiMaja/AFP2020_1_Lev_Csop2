# Könyvtári katalógus és nyilvántartó rendszer teszt jegyzőkönyv
## Tesztelést végezte: 	Németh  Richárd
## Operációs rendszer:	WIN10
## Böngésző: 		Mozilla Firefox 84.0.2
## Dátum: 		2021.01.17.
## Talált hibák száma: 	0

# Kölcsönzési funkciók tesztelése

- A Kölcsönzés menüpont az elvártaknak megfelelően csak akkor elérhető, ha könyvtárosként, vagy adminisztrátorként vagyok bejelentkezve

### 	Olvasó kiválasztása
  - A Kölcsönzés menüpontban található "Könyv kiadása", "Könyv visszavétele", "Hosszabbítás" funkciók esetén az olvasó kiválasztását végző programrész közös, ezért annak tesztelése egyszer tötént mega az alábbiak szerint.
  - A Kölcsönzés / Könyv kiadása menüpont elindítása után megjelenő képernyőn a kölcsönözni kívánó olvasó adatait kell megadni   
  - Az olvasó azonosítása történhet az olvasójegy azonosító, vagy az olvasó vezetéknevének megadásával is.
  - Nem létező olvasójegy azonosítót megadva, a következő üzenet jelenik meg: "Nincsen olvasó ezen az azonosítón."  
  - Megfelelő olvasójegy azonosító megadása után megjelennek az olvasó adatai és az űrlap, amin a kölcsönözni kívánt példányt lehet kiválasztani.
  - Nem létező vezetéknevet megadva, ez az üzenet jelenik meg: "Nincsen olvasó ezen a néven."  
  - Az olvasó neve mezőt üresen hagyásával indítva a keresést: "Kérem adjon meg egy nevet a kereséshez!"
  - Ha olyan vezetéknév van megadva, ami van korábban rögzítve lett a rendszerben, akkor minden olyan olvasó megjelenik a választhatók között, akinek a vezetéknevében megtalálható a megadott karaktersorozat.
  - A megfelelő olvasó kiválasztása után megjelennek az olvasó adatai és az űrlap, amin a kölcsönözni kívánt példányt lehet kiválasztani.


### 	Könyv kiadása
  - A Kölcsönzés / Könyv visszavétele menüpont elindítása után megjelenő képernyőn elöszőr a kölcsönözni kívánó olvasót kell kiválasztani, az "Olvasó kiválasztása" résznél leírtak szerint.
  - A megfelelő olvasó kiválasztása után megjelennek az olvasó adatai és az űrlap, amin a kölcsönözni kívánt példányt lehet kiválasztani. 
  - A példány azonosítót üresen hagyva megnyomva az "Adatok Lekérése" gombot: "Kérem adjon meg egy könyvpéldány azonosítót!"
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Nem létező példány megadása után: "XXXX azonosító számon nem szerepel könyv a katalógusban."
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Könyv kölcsönzése gomb használata példány azonosító megadása nélkül: Kérem adjon meg egy könyvpéldány azonosítót!
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Könyv kölcsönzése gomb használata nem létező példány azonosító megadásával: "NNN azonosító számon nem szerepel könyv a katalógusban."
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.  
  - Ha az "aaa" szöveget adtam meg az azonosító mezőben, akkor: "Írjon be egy számot" üzenet jelenik meg.
  - Létező példány azonosító megadása után használva az "Adatok lekérése" gombot megjelennek a megadott azonosítóhoz tartozó könyvpéldány adatai az űrlapon.
  - Ha az azonosítóhoz tartozó példány jelenleg is kölcsönözve van: "A könyv már ki van kölcsönözve, nem adható ki!"
  - Ha olyan példány lett kiválasztva, ami jelenleg kölcsönözhető, akkor a "Könyv kikölcsönzése" gomb használata után: "Sikeres kikölcsönzés."
  - "Újabb könyv kikölcsönzése" link megfelelően működik, a korábban kiválasztott olvasó részére tudunk újabb kölcsönzéseket rögzíteni.
  
  
### 	Könyv visszavétele
  - A Kölcsönzés / Könyv visszavétele menüpont elindítása után megjelenő képernyőn elöszőr a kölcsönözni kívánó olvasót kell kiválasztani, az "Olvasó kiválasztása" bekezdésben leírtak szerint.
  - A megfelelő olvasó kiválasztása után megjelennek az olvasó adatai és az űrlap, amin a kölcsönözni kívánt példányt lehet kiválasztani.      
  - A példány azonosítót üresen hagyva megnyomva az "Adatok Lekérése" gombot: "Kérem adjon meg egy könyvpéldány azonosítót!"
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Nem létező példány megadása után: "XXXX azonosító számon nem szerepel könyv a katalógusban."
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Könyv kölcsönzése gomb használata példány azonosító megadása nélkül: Kérem adjon meg egy könyvpéldány azonosítót!
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Könyv kölcsönzése gomb használata nem létező példány azonosító megadásával: "NNN azonosító számon nem szerepel könyv a katalógusban."
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Ha az "aaa" szöveget adtam meg az azonosító mezőben, akkor: "Írjon be egy számot" üzenet jelenik meg.  
  - Ha az azonosítóhoz tartozó példányt nem a kiválasztott olvasó kölcsönözte ki: "A könyv visszavételezése nem sikerült, mert nem a megadott olvasó kölcsönözte ki!"
  - Létező példány azonosító megadása után használva az "Adatok lekérése" gombot megjelennek a megadott azonosítóhoz tartozó könyvpéldány adatai az űrlapon.  
  - A hibajelzésnél megjelenő Vissza gomb megfelelően működik.
  - Mikor olyan példányt választottam, ami jelenleg nem volt kiadva: "A könyv már vissza van vételezve!" üzenet jelent meg.
  - Ha olyan példány lett kiválasztva, amit kiválasztott olvasó kölcsönzött ki korábban és még nem lett visszavételezve, akkor a "Könyv visszavételezése" gomb megnyomása után megtörténik a kívánt művelet.  
  - Ezután további olyan könyveket lehet visszavételezni, amit az olvasó kölcsönzött ki korábban.
  - "Késedelmes napok száma összesen:" ha nem volt késés, akkor itt 0 szerepel
  - "Visszavétel vége" gomb megnyomása után megjelenik a fizetendő késedelmi díj
  
  
### 	Kölcsönzés hosszabbítása
  - A Kölcsönzés / Hosszabbítás menüpont elindítása után megjelenő képernyőn elöszőr a kölcsönözni kívánó olvasót kell kiválasztani, az "Olvasó kiválasztása" bekezdésben leírtak szerint.
  - Ha a kiválasztott olvasó számára jelenleg nincs kiadva könyv, akkor: "Az olvasónak jelenleg nincsenek kikölcsönzött könyvei." üzenet jelenik meg.
  - A megfelelő olvasó kiválasztása után megjelenik egy táblázat, ami azokat a könyveket tartalmazza, amelyek az olvasó számára lettek kiadva.
  - A táblázatban ki lehet választani egy, vagy több könyvpéldányt, majd a "kölcsönzési határidő hosszabbítása" gomb használata után: "A kijelölt könyv(ek) kölcsönzési határideje meghosszabbításra került." üzenet jelenik meg.
    
  
  
  
  
  
  

 
          
  
   
     

