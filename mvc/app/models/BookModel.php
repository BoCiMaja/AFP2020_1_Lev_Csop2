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
        if (!preg_match('/^((((([A-ZÁ-Ű][a-zá-ű.]+[ ]?)+)(, ){1}([A-ZÁ-Ű][a-zá-ű]+[ ]?)+)(; )?)+)$/u', 
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
        if (!preg_match('/^([a-zá-ű ,-]+)$/u', $targyszavak))
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

}

?>
