<?php

class LibrarianModel {
  
    public function findLibrarianById($id)
    {
        $error = '';
        $row = null;
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
            $query = "SELECT * FROM konyvtarosok WHERE felhasznaloi_nev = :id";                      
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_OBJ);                       
            if ($row == null)
                $error = 'Nincsen könyvtáros ezen az azonosítón.';
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        
        if (!$error)
            return ['data' => $row];
        else
          return ['error' => $error];
    }
    public function findLibrarianByName($name)
    {
        $error = '';
        $name = trim($name);
        if (empty($name))
            return ['error' => 'Kérem adjon meg egy nevet a kereséshez!'];
        $names = preg_split('/[ ]+/', $name);
        for ($i=0; $i< count($names); $i++)
            $names[$i] = trim($names[$i]);        
        try {                        
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);                       
            if (count($names) == 2)
            {
                $query = "SELECT * FROM konyvtarosok WHERE (csaladi_nev = :firstname AND utonev = :secondname) "
                        . " OR (csaladi_nev = :firstandsecondname)";                      
                $stmt = $db->prepare($query);
                $stmt->bindValue(':firstname', $names[0]);
                $stmt->bindValue(':secondname', $names[1]);
                $stmt->bindValue(':firstandsecondname', $names[0].' '.$names[1]);
            }
            else if (count($names) == 3)
            {
                $query = "SELECT * FROM konyvtarosok WHERE "
                        . "(csaladi_nev = :firstandsecondname AND utonev = :thirdname) OR" 
                        . "(csaladi_nev = :firstname AND utonev = :secondandthirdname)";                      
                $stmt = $db->prepare($query);
                $stmt->bindValue(':firstandsecondname', $names[0].' '.$names[1]);
                $stmt->bindValue(':thirdname', $names[2]);                              
                $stmt->bindValue(':firstname', $names[0]);
                $stmt->bindValue(':secondandthirdname', $names[1].' '.$names[2]);                
            }
            else            
            {
                $query = "SELECT * FROM konyvtarosok WHERE csaladi_nev LIKE :firstname";                      
                $stmt = $db->prepare($query);
                $stmt->bindValue(':firstname', $names[0].'%');
            }
            $stmt->execute();            
            if ($stmt->rowCount() == 0)
                $error = 'Ezen a néven nem szerepel könyvtáros a nyilvántartásban.';
            else
            {                
                while ($row = $stmt->fetch(PDO::FETCH_OBJ))
                    $rows[] = $row;
            }
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        
        if (!$error)
            return ['data' => $rows];
        else
            return ['error' => $error];    
    }
    public function validateLibrarianData1(
            $felhasznaloi_nev, $jelszo,
            $szuletesi_csaladi_nev, $szuletesi_utonev, 
            $anyja_szuletesi_csaladi_neve, $anyja_szuletesi_utoneve,
            $szuletesi_hely, $szuletesi_datum)
    {
        $error = '';
        try
        {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = 'SELECT * FROM konyvtarosok WHERE felhasznaloi_nev = :felhasznaloi_nev';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':felhasznaloi_nev', $felhasznaloi_nev);
            $stmt->execute();
            if ($stmt->rowCount()>0)
                $error .= 'A megadott felhasználói néven már van regisztrálva könyvtáros.<br>';
            $db = null;
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();
            return $error;
        }        
        if (strlen($jelszo) < 8)
            $error .= 'A jelszó túl rövid, minimum 8 karakter hosszú legyen.<br>';
        if ((!empty($szuletesi_csaladi_nev) || !empty($szuletesi_utonev))
                && (!preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ \-]?)+$/', $szuletesi_csaladi_nev) 
                || !preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ ]?)+$/', $szuletesi_utonev)))
                $error .= 'A születési családnév vagy utónév nem megfelelő formátumú.<br>';        
        if ((!empty($szuletesi_csaladi_nev) || !empty($szuletesi_utonev))
                && (strlen($szuletesi_csaladi_nev) > 40  || strlen($szuletesi_utonev)>40))
                $error .= 'A születési családnév és utónév maximum 40 karakter hosszúak lehetnek.<br>';  
        if (!preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ ]?)+$/', $anyja_szuletesi_csaladi_neve)
                || !preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ \-]?)+$/', $anyja_szuletesi_utoneve))
                $error .= 'Anyja születési családneve és utóneve nem megfelelő formátumú vagy nincs megadva.<br>';
        if (strlen($anyja_szuletesi_csaladi_neve) > 40  || strlen($anyja_szuletesi_utoneve)>40)
                $error .= 'Az anya születési családneve és utóneve maximum 40 karakter hosszúak lehetnek.<br>';
        
        if (!preg_match('/^[A-ZÁ-Ű][a-zá-ű]+$/', $szuletesi_hely))
                $error .= 'A születési hely nem megfelelő formátumú vagy nincs megadva.<br>';
        if (strlen($szuletesi_hely) > 40)
                $error .= 'A születési hely maximum 40 karakter hosszú lehet.<br>';
        if (!preg_match('/^[1,2][0-9]{3}\.[0,1][0-9]\.[0-3][0-9]$/', $szuletesi_datum) &&
                !preg_match('/^[1,2][0-9]{3}\-[0,1][0-9]\-[0-3][0-9]$/', $szuletesi_datum))
                $error .= 'A születési dátum nem megfelelő formátumú vagy nincs megadva.<br>';
        
        return $error;
    }
    
    public function validateLibrarianData2($csaladi_nev, $utonev, 
            $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
            $telefonszam, $email)
    {
        $error = '';       
        if (!preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ \-]?)+$/', $csaladi_nev)
                || !preg_match('/^([A-ZÁ-Ű][a-zá-ű]+[ ]?)+$/', $utonev))
                $error .= 'A családnév vagy utónév nem megfelelő formátumú vagy nincs megadva.<br>';
        if (strlen($csaladi_nev) > 40  || strlen($utonev)>40)
                $error .= 'A családnév és az utónév maximum 40 karakter hosszúak lehetnek.<br>';
        if (!preg_match('/^[1-9][0-9]{3}$/', $lakcim_iranyitoszam))
                $error .= 'Az irányítószám nem megfelelő formátumú vagy nincs megadva.<br>';
        if (!preg_match('/^[A-ZÁ-Ű][a-zá-ű]+$/', $lakcim_varos))
                $error .= 'A város nem megfelelő formátumú vagy nincs megadva.<br>';
        if (strlen($lakcim_varos) > 40)
                $error .= 'A lakcím város megnevezése maximum 40 karakter hosszú lehet.<br>';        
        if (!preg_match('/^([A-ZÁ-Ű][a-zá-ű\-]+\s)([A-ZÁ-Űa-zá-ű\-\.]*\s?)+$/', $lakcim_utca)
                || !(substr($lakcim_utca, -4) == "utca"  
                || substr($lakcim_utca, -2) == "út" 
                || substr($lakcim_utca, -2) == "u."  
                || substr($lakcim_utca, -3) == "tér"  
                || substr($lakcim_utca, -5) == "körút"  
                || substr($lakcim_utca, -4) == "krt."))
            $error .= 'Az utca mező nem megfelelő formátumú vagy nincs megadva.<br>';        
        if (strlen($lakcim_utca) > 40)
                $error .= 'A lakcím utca megnevezése maximum 40 karakter hosszú lehet.<br>';
        if (strlen($lakcim_hazszam) > 40)
                $error .= 'A lakcím házszám megnevezése maximum 40 karakter hosszú lehet.<br>';
        if (!empty($telefonszam) && !preg_match('/^[0-9]{11}$/', $telefonszam))
            $error .= 'A telefonszamnak 11 számjegyből kell állnia. <br>';
        if (!empty($email))
        {
            if(!preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9\_\-\.]*@([a-zA-Z0-9]+\.)+[a-z]{2,3}$/', $email))
                $error .= 'Az email címe nem megfelelő formátumú. <br>';
            else  
            {                
                $domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\_\-\.]*@/', '', $email);
                $domain_exists = false;
                if (!empty($domain))
                {                
                    exec("nslookup -type=\"MX\" $domain", $output);
                    foreach ($output as $line)
                    {
                        if (preg_match('/^'.$domain.'/', $line))
                        {
                            $domain_exists = true;
                            break;
                        }                
                    }
                }
                if (!$domain_exists)
                    $error .= 'Nem létező mail szerver szerepel a megadott email címben. <br>';
            }
        }
        if (empty($telefonszam))
            $error .= 'Telefonszám nincs megadva. <br>';
        if (empty($email))
            $error .= 'E-mail cím nincs megadva. <br>';
        return $error;
    }
    
    public function updateLibrarianData($felhasznaloi_nev, $csaladi_nev, $utonev, 
            $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
            $telefonszam, $email, $librarianAdminRights)
    {
        $error = '';
        try
        {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "UPDATE konyvtarosok SET csaladi_nev = :csaladi_nev, utonev = :utonev, " 
                     . "lakcim_iranyitoszam = :lakcim_iranyitoszam, lakcim_varos = :lakcim_varos, "
                     . "lakcim_utca = :lakcim_utca, lakcim_hazszam = :lakcim_hazszam, "                     
                     . "telefonszam = :telefonszam, email = :email, adminisztrator = :admin "
                     . "WHERE felhasznaloi_nev = :felhasznaloi_nev";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':felhasznaloi_nev', $felhasznaloi_nev);
            $stmt->bindValue(':csaladi_nev',$csaladi_nev);
            $stmt->bindValue(':utonev',$utonev);
            $stmt->bindValue(':lakcim_iranyitoszam',$lakcim_iranyitoszam);
            $stmt->bindValue(':lakcim_varos',$lakcim_varos); 
            $stmt->bindValue(':lakcim_utca',$lakcim_utca); 
            $stmt->bindValue(':lakcim_hazszam',$lakcim_hazszam);
            $stmt->bindValue(':telefonszam',$telefonszam);
            $stmt->bindValue(':email',$email);
            $stmt->bindValue(':admin', $librarianAdminRights);
            $stmt->execute();
            if ($stmt->errorCode() != '00000')
                $error = 'Sikertelen módosítás. Hiba történt a művelet során.';
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();            
        } 
        return $error;        
    }
       
   
    public function registerLibrarian($data) 
    {
        if (array_key_exists('admin', $data) && $data['admin']='on'){
            $librarianAdminRights = '1';
        }
        else{
            $librarianAdminRights = '0';
        }
        
        $error = '';
        try
        {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "INSERT INTO konyvtarosok VALUES ("
                    . ":felhasznaloi_nev, SHA(:jelszo)," 
                    . ":csaladi_nev, :utonev, "
                    . ":szuletesi_csaladi_nev, :szuletesi_utonev, "
                    . ":szuletesi_hely, :szuletesi_datum, "
                    . ":anyja_szuletesi_csaladi_neve, :anyja_szuletesi_utoneve, "                                       
                    . ":lakcim_iranyitoszam, :lakcim_varos, :lakcim_utca, :lakcim_hazszam,"
                    . ":telefonszam, :email, :admin)";       
                    
            $stmt = $db->prepare($query);
            $stmt->bindValue(':felhasznaloi_nev', $data['felhasznaloi_nev']);
            $stmt->bindValue(':jelszo', $data['jelszo']);
            $stmt->bindValue(':csaladi_nev', $data['csaladi_nev']);
            $stmt->bindValue(':utonev', $data['utonev']);
            $stmt->bindValue(':szuletesi_csaladi_nev', $data['szuletesi_csaladi_nev']);
            $stmt->bindValue(':szuletesi_utonev', $data['szuletesi_utonev']);
            $stmt->bindValue(':szuletesi_hely', $data['szuletesi_hely']);
            $stmt->bindValue(':szuletesi_datum', $data['szuletesi_datum']);
            $stmt->bindValue(':anyja_szuletesi_csaladi_neve', $data['anyja_szuletesi_csaladi_neve']);
            $stmt->bindValue(':anyja_szuletesi_utoneve', $data['anyja_szuletesi_utoneve']);
            $stmt->bindValue(':lakcim_iranyitoszam', $data['lakcim_iranyitoszam']);
            $stmt->bindValue(':lakcim_varos', $data['lakcim_varos']);
            $stmt->bindValue(':lakcim_utca', $data['lakcim_utca']);
            $stmt->bindValue(':lakcim_hazszam', $data['lakcim_hazszam']);
            $stmt->bindValue(':telefonszam', $data['telefonszam']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':admin', $librarianAdminRights);
            $stmt->execute();
            if ($stmt->errorCode() != '00000')
                $error = 'Sikertelen regisztráció. Hiba történt a művelet során.';
            $db = null;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();            
        }        
        return $error;
    }
    
    public function deleteLibrarian($felhasznaloi_nev) 
    {
        $error = '';
        try
        {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
            $query = "DELETE FROM konyvtarosok "
                     . "WHERE felhasznaloi_nev = :felhasznaloi_nev";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':felhasznaloi_nev', $felhasznaloi_nev);
            $stmt->execute();
            if ($stmt->errorCode() != '00000')
                $error = 'Sikertelen törlés. Hiba történt a művelet során.';
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
