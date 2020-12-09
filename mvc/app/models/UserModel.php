<?php

class UserModel {
    
    public function login($username, $password)
    {
        $error = '';        
        try {
            $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);                   

            $query = "SELECT * FROM Olvasok WHERE felhasznaloi_nev = :username AND jelszo = SHA(:password)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $password);
            $stmt->execute();

            if ($stmt->rowCount() == 1)
            {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                session_start();
                $_SESSION['username'] = $username;     
                $_SESSION['rights'] = 'olvaso';     
                $targeturl = 'http://localhost:8080/AFP2020_1_Lev_Csop2/mvc/public/home/index';
                header('Location: '.$targeturl);
            }
            else 
            {
                $query = "SELECT * FROM Konyvtarosok WHERE felhasznaloi_nev = :username AND jelszo = SHA(:password)";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':username', $username);
                $stmt->bindValue(':password', $password);
                $stmt->execute();
                if ($stmt->rowCount() == 1)
                {
                    $row = $stmt->fetch(PDO::FETCH_OBJ);
                    session_start();
                    $_SESSION['username'] = $username; 
                    if ($row->Adminisztrator == true)
                        $_SESSION['rights'] = 'admin'; 
                    else
                        $_SESSION['rights'] = 'konyvtaros'; 
                    $targeturl = 'http://localhost:8080/AFP2020_1_Lev_Csop2/mvc/public/home/index';
                    header('Location: '.$targeturl);
                }
                else 
                {
                    $error = "A megadott felhasználó név vagy jelszó hibás!";
                }                
            }            
            $db = NULL;
        }
        catch (PDOException $e){               
            $error = 'Az adatbázishoz való csatlakozás sikertelen. <br>' . $e->getMessage();                
        }                    
        return $error;
    }  

    public function getUserData($username, $rights)
    {        
        $error = '';          
        try {                        
            if ($rights == 'olvaso')
            {
                $db = new PDO(DB_DSN, DB_USR_REA, DB_PWD_REA);            
                $query = "SELECT * FROM Olvasok WHERE felhasznaloi_nev = :username";
            }
            else
            {
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);            
                $query = "SELECT * FROM Konyvtarosok WHERE felhasznaloi_nev = :username";                       
            }
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_OBJ);                       
            if ($row == null)
                $error = 'Nincsenek adatok a felhasználóról.';
            $db = NULL;            
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
      
    public function updateUserData($username, $rights, $phone, $email)
    {
        $error = '';          
        try {                        
            if ($rights == 'olvaso')
            {
                $db = new PDO(DB_DSN, DB_USR_REA, DB_PWD_REA);
                $query = "UPDATE Olvasok SET telefonszam=:phone, email=:email WHERE felhasznaloi_nev = :username";
            }
            else
            {
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
                $query = "UPDATE Konyvtarosok SET telefonszam=:phone, email=:email WHERE felhasznaloi_nev = :username";
            }
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            if ($stmt->errorCode() != '00000')
                $error = 'Sikertelen módosítás. Hiba történt a művelet során.';
            $db = NULL;            
        }
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();            
        }           
                
        return $error;
    }
    
    public function validateUserData($phone, $email)
    {
        $error = '';        
        if (!empty($phone) && !preg_match('/^[0-9]{11}$/', $phone))
            $error .= 'A telefonszamnak 11 számjegyből kell állnia. <br>';
        if (!empty($email) && !preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9\_\-\.]*@([a-zA-Z0-9]+\.)+[a-z]{2,3}$/', $email))
            $error .= 'Az email címe nem megfelelő formátumú. <br>';
        return $error;        
    }
    
    public function changePassword($username, $rights, $oldpwd, $newpwd1, $newpwd2)
    {
        $error = '';
        
        try {                               
            if ($rights == 'olvaso')
            {
                $db = new PDO(DB_DSN, DB_USR_REA, DB_PWD_REA);
                $query = "SELECT * FROM Olvasok WHERE felhasznaloi_nev = :username AND jelszo = SHA(:password)";
            }
            else
            {
                $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
                $query = "SELECT * FROM Konyvtarosok WHERE felhasznaloi_nev = :username AND jelszo = SHA(:password)";
            }            
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $oldpwd);
            $stmt->execute();
            if ($stmt->rowCount() != 1)
                $error = "A megadott régi jelszó hibás! <br>";
            $db = NULL;
        }            
        catch (PDOException $e)
        {
            $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
        }
        
        if (!$error)
        {
            if (strlen($newpwd1) >= 4 && $newpwd1 == $newpwd2)
            {
                try {                                                  
                    if ($rights == 'olvaso')
                    {
                        $db = new PDO(DB_DSN, DB_USR_REA, DB_PWD_REA);
                        $query = "UPDATE Olvasok SET jelszo = SHA(:newpwd) WHERE felhasznaloi_nev = :username";
                    }
                    else
                    {
                        $db = new PDO(DB_DSN, DB_USR_LIB, DB_PWD_LIB);
                        $query = "UPDATE Konyvtarosok SET jelszo = SHA(:newpwd) WHERE felhasznaloi_nev = :username";
                    }
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':username', $username);
                    $stmt->bindValue(':newpwd', $newpwd1);
                    $stmt->execute();   
                    if ($stmt->errorCode() != '00000')
                        $error = 'Sikertelen módosítás. Hiba történt a művelet során.';                   
                    $db = NULL;            
                }
                catch (PDOException $e)
                {
                    $error = 'Adatbázis hiba: ' . $e->getMessage();                                   
                }                                     
            }
            else
            {
                $error .= 'Az új jelszó nem elég hosszú vagy nem egyezik meg a megerősítő mezőben levővel.';
            }
        }
        
        return $error;        
    }
    
 }

?>
