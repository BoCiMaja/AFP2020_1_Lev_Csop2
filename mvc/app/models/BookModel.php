<?php

class BookModel {
     /*** ÚJ KÖNYV FELVÉTELE ***/
    public function isIsbnExists($isbn) {
        
        $retval = false;        
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT * FROM Konyvek WHERE isbn = :isbn";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':isbn', $isbn);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
                $retval = true;
            $db = null;            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
        return $retval;
    }
    
    public function isIsbnMistyped($isbn, $szerzok, $cim) {
        
        $error = '';        
        $cim = trim($cim);
        try {  
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT * FROM Konyvek WHERE isbn = :isbn AND szerzok = :szerzok AND cim= :cim";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':isbn', $isbn);
            $stmt->bindValue(':szerzok', $szerzok);
            $stmt->bindValue(':cim', $cim);
            $stmt->execute();
            if ($stmt->rowCount() == 0)
                $error = "A megadott ISBN számon másik könyv van a katalógusban, kérem ellenőrizze!<br>";
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        return $error;
    }
    
    public function validateBookData($isbn, $szerzok, $cim, $kiado, $kiadasi_ev, $cutter, $eto_jelzet,
                                    $oldalak_szama, $targyszavak, $azonosito) 
    {              
        $error = '';
        if (!($kiadasi_ev < 2007 && preg_match('/^\d{10}$/u', $isbn)) &&
            !($kiadasi_ev >= 2007 && preg_match('/^\d{13}$/u', $isbn)))
                $error .= "Az ISBN szám 2007 előtti könyvek esetén 10, utána 13 számjegyből áll!<br>";
        if (!preg_match('/^((((([A-ZÁ-Ű][a-zá-ű\.]+[ ]?)+)(, ){1}([A-ZÁ-Ű][a-zá-ű\.]+[ ]?)+)(; )?)+)$/u', 
                        $szerzok))
                $error .= "A szerzők neve: 'családnév, utónév' formában álljon, több szerző esetén "
                . "pontosvesszővel+szóközzel elválasztva!<br>";
        if (strlen($szerzok) > 200)
            $error .= "A szerzők neve maximum 200 karakter hosszú lehet!<br>";
        if (empty($cim))
            $error .= "A cím mező nincs kitöltve!<br>";
        if (strlen($cim) > 100)
            $error .= "A cím maximum 100 karakter hosszú lehet!<br>";
        if (empty($kiado))
            $error .= "A kiadó mező nincs kitöltve!<br>";
        if (strlen($kiado) > 100)
            $error .= "A kiadó neve maximum 100 karakter hosszú lehet!<br>";
        $max_evszam = new DateTime(date('Y-m-d'));
        $max_evszam = $max_evszam->format('Y');
        if ($kiadasi_ev < 1900 || $kiadasi_ev > $max_evszam)
            $error .= "A kiadási év nem hiteles vagy nincs megadva!<br>";
        if ($oldalak_szama < 10)
            $error .= "Az oldalak száma nem hiteles vagy nincs megadva!<br>";
        if (!preg_match('/^(\d{3}(\.\d{1})?( ))?[A-Z]{1}( ){1}\d+$/u', $cutter))
            $error .= "A cutter (3 jegyű szám.szám+szóköz)(opcionális)+nagybetű+szóköz+szám formátumú legyen!<br>";
        if (strlen($cutter) > 20)
            $error .= "A cutter maximum 20 karakter hosszú lehet!<br>";
        if (!preg_match('/^([a-zá-ű ,\-]+)$/u', $targyszavak))
            $error .= "A tárgyszavak szóközzel, vesszővel tagolt kisbetűs szavakból álljon!<br>";
        if (strlen($targyszavak) > 100)
            $error .= "A tárgyszavak hossza összesen maximum 100 karakter lehet!<br>";
        if ($azonosito < 1000000000000 || $azonosito > 9999999999999)
            $error .= "Az azonosító egy 13 jegyű számsor legyen!<br>";
        
        return $error;
    }
    
    public function registerNewBook($isbn, $szerzok, $cim, $kiado, $kiadasi_ev, $cutter, $eto_jelzet,
                                    $oldalak_szama, $targyszavak, $azonosito) 
    {
        $row = null;                        
        $error = '';
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "INSERT INTO Konyvek VALUES (:isbn, :szerzok, :cim, :kiado, :kiadasi_ev, "
                    . ":cutter, :eto_jelzet, :oldalak_szama, :targyszavak)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':isbn', $isbn);
            $stmt->bindValue(':szerzok', $szerzok);
            $stmt->bindValue(':cim', $cim);
            $stmt->bindValue(':kiado', $kiado);
            $stmt->bindValue(':kiadasi_ev', $kiadasi_ev);
            $stmt->bindValue(':cutter', $cutter);
            $stmt->bindValue(':eto_jelzet', $eto_jelzet);
            $stmt->bindValue(':oldalak_szama', $oldalak_szama);
            $stmt->bindValue(':targyszavak', $targyszavak);            
            $stmt->execute();
            if ($stmt->errorCode() != '00000')
                $error = 'Sikertelen könyvfelvétel!';
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }        
        
        $leltarbavetel_datuma = new DateTime(date('Y-m-d'));
        $leltarbavetel_datuma = $leltarbavetel_datuma->format('Y.m.d');
        $megjegyzes = '';
        if (!$error)
        {
            try {                        
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
                $query = "INSERT INTO Peldanyok VALUES "
                        . "(:azonosito, :isbn, :leltarbavetel_datuma, :megjegyzes)";                        
                $stmt = $db->prepare($query);
                $stmt->bindValue(':azonosito', $azonosito);
                $stmt->bindValue(':isbn', $isbn);
                $stmt->bindValue(':leltarbavetel_datuma', $leltarbavetel_datuma);
                $stmt->bindValue(':megjegyzes', $megjegyzes);
                $stmt->execute();
                if ($stmt->errorCode() != '00000')
                    $error = 'Sikertelen könyvfelvétel!';
                $db = null;            
            }
            catch (PDOException $e)
            {
                $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
            }      
        }
        return $error;   
    }
    
    public function registerCopy($isbn, $azonosito)
    {
        $error = '';
        $leltarbavetel_datuma = new DateTime(date('Y-m-d'));
        $leltarbavetel_datuma = $leltarbavetel_datuma->format('Y.m.d');
        $megjegyzes = '';
        if (!preg_match('/^\d{13}$/u', $azonosito))
                $error = "A könyvpéldány azonosító 13 hosszú számsor (vonalkód azonosító) legyen!<br>";
        if (!$error)
        {
            try {                        
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
                $query = "INSERT INTO Peldanyok VALUES "
                        . "(:azonosito, :isbn, :leltarbavetel_datuma, :megjegyzes)";                        
                $stmt = $db->prepare($query);
                $stmt->bindValue(':azonosito', $azonosito);
                $stmt->bindValue(':isbn', $isbn);
                $stmt->bindValue(':leltarbavetel_datuma', $leltarbavetel_datuma);
                $stmt->bindValue(':megjegyzes', $megjegyzes);
                $stmt->execute();
                if ($stmt->errorCode() != '00000')
                    $error = 'Sikertelen könyvfelvétel!';
                $db = null;            
            }
            catch (PDOException $e)
            {
                $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
            }      
        }
        return $error; 
    }
    
    public function getBookDataByIsbn($isbn) 
    {
        $row = null;
        $error = '';
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT * FROM Konyvek WHERE isbn = :isbn";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':isbn', $isbn);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
                $row = $stmt->fetch(PDO::FETCH_OBJ);
            else
                $error = "$isbn ISBN számon nincs könyv a katalógusban.";
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        if ($row != null)
            return ['data' => $row];
        else
            return ['error' => $error];
    }
    
    public function getBookDataById($azonosito) 
    {
        $row = null;
        $error = '';
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT * FROM Konyvek k JOIN Peldanyok p ON k.isbn=p.isbn WHERE p.azonosito = :azonosito";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':azonosito', $azonosito);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
                $row = $stmt->fetch(PDO::FETCH_OBJ);
            else
                $error = "$azonosito azonosító számon nem szerepel könyv a katalógusban.";
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        if ($row != null)
            return ['data' => $row];
        else
            return ['error' => $error];
    }
    
    /*** KÖNYV TÖRLÉSE ***/
    public function deleteBookById($azonosito) 
    {
        $error = '';
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "DELETE FROM Peldanyok WHERE azonosito = :azonosito";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':azonosito', $azonosito);
            $stmt->execute();
            if ($stmt->errorCode() != '00000')                
                $error = "Sikertelen törlés.";
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }        
        return $error;
    }
	
	/*** LEJÁRT HATÁRIDŐS KÖNYVEK ***/    
    public function expiredBookList() {
        $rows = null;
        $duedate = new DateTime(date('Y-m-d'));
        $duedate->modify('-1 month');
        $duedate = $duedate->format('Y-m-d');        
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT ks.peldany_id, DATE_ADD(ks.kolcsonzes_kezdete, INTERVAL +1 MONTH) as expired,"
                    . " ks.olvaso, kv.szerzok, kv.cim "
                    . "FROM Kolcsonzesek ks JOIN Peldanyok p ON ks.peldany_id=p.azonosito "
                    . "JOIN Konyvek kv ON p.isbn=kv.isbn "
                    . "WHERE ks.kolcsonzes_kezdete < :duedate AND ks.kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':duedate', $duedate);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_OBJ))                            
                $rows[] = $row;
            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
        return $rows;
    }
    
    public function getBorrowerData($peldany_id) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT o.csaladi_nev, o.utonev, o.email, o.olvasojegy_azonosito, "
                    . "o.lakcim_iranyitoszam, o.lakcim_varos, o.lakcim_utca, o.lakcim_hazszam "
                    . "FROM Olvasok o JOIN Kolcsonzesek ks ON ks.olvaso=o.olvasojegy_azonosito "                    
                    . "WHERE ks.peldany_id = :peldany_id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_id', $peldany_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_OBJ);            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
        return $row;
    }
    
    public function getExpiredListByBorrower($olvasojegy_azonosito) {
        $rows = null;
        $duedate = new DateTime(date('Y-m-d'));
        $duedate->modify('-1 month');
        $duedate = $duedate->format('Y-m-d');        
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT kv.szerzok, kv.cim, DATE_ADD(ks.kolcsonzes_kezdete, INTERVAL 1 MONTH) as expired "
                    . "FROM Kolcsonzesek ks JOIN Peldanyok p ON ks.peldany_id=p.azonosito "
                    . "JOIN Konyvek kv ON p.isbn=kv.isbn "
                    . "WHERE ks.kolcsonzes_kezdete < :duedate AND ks.kolcsonzes_vege IS NULL "
                    . "AND ks.olvaso=:olvasojegy_azonosito";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':duedate', $duedate);
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);            
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_OBJ))                            
                $rows[] = $row;            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
        return $rows;
    }
    
    /*** KÖLCSÖNZÉS ***/
    public function isBookBorrowed($peldany_id) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT * FROM Kolcsonzesek WHERE peldany_id = :peldany_id "
                    . "AND kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_id', $peldany_id);
            $stmt->execute();            
            if ($stmt->rowCount() > 0)
                return true;
            else 
                return false;            
        } 
        catch (PDOException $ex) {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
    }
    
    public function borrowBook($olvasojegy_azonosito, $peldany_azonosito, $kiadta) {        
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "INSERT INTO Kolcsonzesek (Peldany_id, Olvaso, Kolcsonzes_kezdete, Kiadta, Hosszabbitva) "
                    . "VALUES (:peldany_azonosito, :olvasojegy_azonosito, :datum, :kiadta, 0)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);
            $stmt->bindValue(':kiadta', $kiadta);
            $datum = new DateTime(date('Y-m-d'));
            $datum = $datum->format('Y-m-d');
            $stmt->bindValue(':datum', $datum);
            $stmt->execute();            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
    }
      
    public function returnBook($olvasojegy_azonosito, $peldany_azonosito, $visszavetelezte) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "UPDATE Kolcsonzesek SET kolcsonzes_vege = :datum, "
                    . "visszavetelezte = :visszavetelezte "
                    . "WHERE peldany_id = :peldany_azonosito AND "
                    . "olvaso = :olvasojegy_azonosito AND "
                    . "kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);
            $stmt->bindValue(':visszavetelezte', $visszavetelezte);
            $datum = new DateTime(date('Y-m-d'));
            $datum = $datum->format('Y-m-d');
            $stmt->bindValue(':datum', $datum);                        
            $stmt->execute();
            
            if ($stmt->rowCount() == 1)
                return true;
            else 
                return false;
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
    }

    public function delayInDays($olvasojegy_azonosito, $peldany_azonosito) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT DATEDIFF(NOW(), DATE_ADD(kolcsonzes_kezdete, INTERVAL 1 MONTH)) AS Days "
                    . "FROM Kolcsonzesek "                    
                    . "WHERE peldany_id = :peldany_azonosito AND "
                    . "olvaso = :olvasojegy_azonosito AND "
                    . "kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);            
            $stmt->execute();            
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            return $data;            
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
    }    
    
    public function isBookProlongable($olvasojegy_azonosito, $peldany_azonosito) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);       
            $query = "SELECT DATE_ADD(Kolcsonzes_kezdete, INTERVAL 2 MONTH) AS MaxHatarido, "
                    . "Hosszabbitva FROM Kolcsonzesek "                    
                    . "WHERE Olvaso = :olvasojegy_azonosito AND Peldany_id = :peldany_azonosito "
                    . "AND Kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);            
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            return $row;
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
    }
    
    public function prolongBorrow($olvasojegy_azonosito, $peldany_azonosito, $kiadta) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "UPDATE Kolcsonzesek SET kolcsonzes_kezdete = DATE_ADD(kolcsonzes_kezdete, INTERVAL 1 MONTH), "
                    . "kiadta = :kiadta, hosszabbitva = hosszabbitva + 1 "
                    . "WHERE peldany_id = :peldany_azonosito AND "
                    . "olvaso = :olvasojegy_azonosito AND "
                    . "kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);
            $stmt->bindValue(':kiadta', $kiadta);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1)
                return true;
            else 
                return false;
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }    
    }
    
        public function getBorrowedBooksbyReader($olvasojegy_azonosito) {
        $rows = null;
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);       
            $query = "SELECT kv.Szerzok, kv.Cim, p.Azonosito, DATE_ADD(ks.Kolcsonzes_kezdete, INTERVAL 1 MONTH) AS Hatarido "
                    . "FROM Kolcsonzesek ks JOIN Peldanyok p ON ks.peldany_id=p.azonosito "
                    . "JOIN Konyvek kv ON p.isbn=kv.isbn "
                    . "WHERE ks.olvaso = :olvasojegy_azonosito AND ks.Kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':olvasojegy_azonosito', $olvasojegy_azonosito);            
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_OBJ))                            
                $rows[] = $row;                                 
            $db = null;
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }
        return $rows;
    }      
}

?>
