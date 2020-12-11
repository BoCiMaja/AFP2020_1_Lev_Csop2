<?php
    require_once '../app/core/App.php';
    require_once '../app/core/Controller.php';
    
    #BaseURL
    define('BASEURL', "/AFP2020_1_Lev_Csop2/mvc/public");
    #adatbázis kezelő rsz. futtató hoszt címe/neve, portja; adatbázis neve
    define('DB_DSN',"mysql:host=localhost:3308;dbname=konyvtar");
    #adatbázis kezelő rsz. felhasználói név
    define('DB_USER','root');
    #adatbázis kezelő rsz. jelszó
    define('DB_PASSWORD','');
    #adatbázis kezelő rsz. felhasználói név
    define('DB_USR_LIB','konyvtaros');
    #adatbázis kezelő rsz. jelszó
    define('DB_PWD_LIB','1212');
    #adatbázis kezelő rsz. felhasználói név
    define('DB_USR_REA','olvaso');
    #adatbázis kezelő rsz. jelszó
    define('DB_PWD_REA','3434');
    
?>