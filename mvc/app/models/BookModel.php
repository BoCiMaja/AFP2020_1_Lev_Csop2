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
        if (!preg_match('/^([A-ZÁ-Űa-zá-ű0-9 ,]+)$/u', $targyszavak))
            $error .= "A tárgyszavak szóközzel, vesszővel tagolt szavakból álljon!<br>";
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
	
	/*** KERESÉSEK ***/     
    public function simpleSearch($text) {
        $rows = null; 
        $text = trim($text);
        
        //egész keresősztring szópermutációinak (szerző miatt szükséges) keresése vagy kapcsolattal
        try {            
            
            if (!empty($text))
            {
                $text_arr = explode(' ', $text);
                for ($i = 0;$i<count($text_arr); $i++)
                    $text_arr[$i] = trim($text_arr[$i],", ");
                $n = count($text_arr);  
                $this->search_strings = null;
                $this->heapPermutation($text_arr, $n, $n);            
            }
            
            if (count($this->search_strings) > 0)
            {
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
                $query = "SELECT k.szerzok, k.cim, k.kiadasi_ev, count(p.isbn) AS peldany, k.isbn "
                        . "FROM Konyvek k JOIN Peldanyok p ON k.isbn=p.isbn "                    
                        . "WHERE ";                                
                foreach ($this->search_strings as $string)
                    $query .= "k.szerzok LIKE '%$string%' OR ";                
                foreach ($this->search_strings as $string)
                    $query .= "k.cim LIKE '%$string%' OR ";
                foreach ($this->search_strings as $string)
                    $query .= "k.targyszavak LIKE '%$string%' OR ";               
                $query = rtrim($query, "OR ");           
                $query .= " GROUP BY p.isbn ORDER BY k.szerzok, k.cim";                
                $stmt = $db->prepare($query);                 
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_OBJ))                            
                    $rows[] = $row;                            
                if ($rows != null)        
                    return $rows; 
            }
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
         
        //a keresősztring szavainak külön-külön keresése vagy kapcsolattal
        try {            
            $words = null;
            if (!empty($text) && count(explode(' ', $text)) > 1)
            {                
                $words = explode(' ', $text);
                for ($i = 0;$i<count($words); $i++)
                    $words[$i] = trim($words[$i],", ");                
            }            
            
            if ($words != null)
            {
                $query = "SELECT k.szerzok, k.cim, k.kiadasi_ev, k.isbn, count(p.isbn) as peldany "
                        . "FROM Konyvek k JOIN Peldanyok p ON k.isbn=p.isbn "                    
                        . "WHERE ";
                foreach ($words as $word)
                    $query .= "k.szerzok LIKE '%".$word."%' OR ";                
                foreach ($words as $word)
                    $query .= "k.cim LIKE '%".$word."%' OR ";
                foreach ($words as $word)
                    $query .= "k.targyszavak LIKE '%".$word."%' OR ";
                $query = rtrim($query, "OR "); 
                $query .= " GROUP BY p.isbn ORDER BY k.szerzok, k.cim";
                $stmt = $db->prepare($query);                
            }
            else
            {
                $query = "SELECT k.szerzok, k.cim, k.kiadasi_ev, k.isbn, count(p.isbn) as peldany "
                        . "FROM Konyvek k JOIN Peldanyok p ON k.isbn=p.isbn "                    
                        . "WHERE k.szerzok LIKE :szerzok OR "
                        . "k.cim LIKE :cim OR k.targyszavak LIKE :targyszavak "
                        . "GROUP BY p.isbn ORDER BY k.szerzok, k.cim";            
                $stmt = $db->prepare($query);
                $stmt->bindValue(':szerzok', '%'.$text.'%' );
                $stmt->bindValue(':cim', $text.'%');
                $stmt->bindValue(':targyszavak', '%'.$text.'%');
            }
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_OBJ))                            
                $rows[] = $row;                  
            return $rows;
        }
        catch (PDOException $e)
        {
            die('Adatbázis hiba: ' . $e->getMessage());                                   
        }        
    }
         
    public function detailedSearch($data) {
        $isbn = trim($data['ISBN']);
        if (empty($isbn)) $isbn='%';
        $szerzok = trim($data['szerzok']);
        if (empty($szerzok)) $szerzok='%';
        $cim = trim($data['cim']);
        if (empty($cim)) $cim='%';
        $kiado = trim($data['kiado']);
        if (empty($kiado)) $kiado='%';
        $kiadasi_ev = trim($data['kiadasi_ev']);
        if (empty($kiadasi_ev)) $kiadasi_ev='%';
        $cutter = trim($data['cutter']);
        if (empty($cutter)) $cutter='%';
        $eto_jelzet = trim($data['ETO_jelzet']);
        if (empty($eto_jelzet)) $eto_jelzet='%';
        $oldalak_szama = trim($data['oldalak_szama']);
        if (empty($oldalak_szama)) $oldalak_szama='%';
        $targyszavak = trim($data['targyszavak']); 
        if (empty($targyszavak)) $targyszavak='%';
        $azonosito = trim($data['azonosito']);
        if (empty($azonosito)) $azonosito='%';
        
        if (!empty($szerzok))
        {
            $sznevek = explode(' ', $szerzok);
            for ($i = 0;$i<count($sznevek); $i++)
                $sznevek[$i] = trim($sznevek[$i],", ");
            $n = count($sznevek);
            $this->search_strings = null;
            $this->heapPermutation($sznevek, $n, $n);            
        }
        
        $rows = null;
        try {            
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "SELECT k.szerzok, k.cim, k.kiadasi_ev, count(p.isbn) AS peldany, k.isbn "
                    . "FROM Konyvek k JOIN Peldanyok p ON k.isbn=p.isbn "                    
                    . "WHERE k.cim LIKE :cim ";
            if (count($this->search_strings) > 0)
            {
                $query .= " AND (";
                foreach ($this->search_strings as $string)
                    $query .= "k.szerzok LIKE '$string' OR ";
                $query = rtrim($query, "OR ");
                $query .= ") ";
            } 
            $query .= "AND k.kiado LIKE :kiado "
                    . "AND k.kiadasi_ev LIKE :kiadasi_ev "
                    . "AND k.cutter LIKE :cutter "
                    . "AND k.eto_jelzet LIKE :eto_jelzet "
                    . "AND k.oldalak_szama LIKE :oldalak_szama "
                    . "AND k.targyszavak LIKE :targyszavak "
                    . "AND k.isbn LIKE :isbn "
                    . "AND p.azonosito LIKE :azonosito "
                    . "GROUP BY p.isbn ORDER BY k.szerzok, k.cim";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':cim', $cim.'%');
            $stmt->bindValue(':kiado', $kiado.'%');
            $stmt->bindValue(':kiadasi_ev', $kiadasi_ev);
            $stmt->bindValue(':cutter', $cutter);
            $stmt->bindValue(':eto_jelzet', $eto_jelzet);
            $stmt->bindValue(':oldalak_szama', $oldalak_szama);
            $stmt->bindValue(':targyszavak', '%'.$targyszavak.'%');
            $stmt->bindValue(':isbn', $isbn);
            $stmt->bindValue(':azonosito', $azonosito);            
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
    
    private $search_strings;
        
    private function generateSearchString($arr, $n)
    {
        $result = $arr[0];
        for ($i = 1; $i < $n; $i++)
            $result .= '%' . $arr[$i];        
        $this->search_strings[] = $result;
    }
    
    // Generating permutation using Heap Algorithm for search string
    private function heapPermutation($arr, $size, $n)
    {
        if ($size == 1) {
            $this->generateSearchString($arr, $n);            
            return;
        }

        for ($i = 0; $i < $size; $i++) {
            $this->heapPermutation($arr, $size - 1, $n);
            if ($size % 2 == 1)
                $arr = $this->array_swap($arr, 0, $size - 1);
            else
                $arr = $this->array_swap($arr, $i, $size - 1);
        }
    }
    
    private function array_swap($arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
        return $arr;
    }
       
    public function getFreeBooksByIsbn($isbn) {
        $rows = null;
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT Azonosito FROM Peldanyok WHERE isbn = :isbn AND "
                    . "Azonosito NOT IN (SELECT p.Azonosito "
                    . "FROM Peldanyok p JOIN Kolcsonzesek k ON p.azonosito=k.peldany_id "
                    . "WHERE p.isbn = :isbn AND k.Kolcsonzes_vege IS NULL)";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':isbn', $isbn);            
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

    public function getBorrowedBooksByIsbn($isbn) {
        $rows = null;
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);       
            $query = "SELECT p.Azonosito, DATE_ADD(k.Kolcsonzes_kezdete, INTERVAL 1 MONTH) AS Hatarido "
                    . "FROM Peldanyok p JOIN Kolcsonzesek k ON p.azonosito=k.peldany_id "
                    . "WHERE p.isbn = :isbn AND k.Kolcsonzes_vege IS NULL ORDER BY Hatarido";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':isbn', $isbn);            
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
    
    public function getMyBorrowedBooks($username) {
        $rows = null;
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);                  
            $query = "SELECT kv.Szerzok, kv.Cim, p.Azonosito, DATE_ADD(ks.Kolcsonzes_kezdete, INTERVAL 1 MONTH) AS Hatarido "
                    . "FROM Kolcsonzesek ks JOIN Peldanyok p ON ks.peldany_id=p.azonosito "
                    . "JOIN Konyvek kv ON p.isbn=kv.isbn JOIN Olvasok o ON ks.Olvaso=o.Olvasojegy_azonosito "
                    . "WHERE o.Felhasznaloi_nev= :username AND ks.Kolcsonzes_vege IS NULL";
            $stmt = $db->prepare($query);            
            $stmt->bindValue(':username', $username);            
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
    
    /*** LELTÁR ***/
    public function bookToInventory($peldany_azonosito) {
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "UPDATE peldanyok SET Leltarbavetel_datuma = :datum "                    
                    ."WHERE azonosito = :peldany_azonosito";               

            $stmt = $db->prepare($query);
            $stmt->bindValue(':peldany_azonosito', $peldany_azonosito);                        
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
}

?>
