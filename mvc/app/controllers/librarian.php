<?php

class Librarian extends Controller {
    
    public function register() 
    {
        session_start();
        if (!isset($_SESSION['rights']) ||  $_SESSION['rights'] != 'admin') 
            return;
        else 
            $rights = $_SESSION['rights'];
        
        if (array_key_exists('submit', $_POST))
        {
            $librarianModel = $this->model('LibrarianModel');
            $felhasznaloi_nev = trim($_POST['felhasznaloi_nev']); 
            $jelszo = trim($_POST['jelszo']);
            $csaladi_nev = trim($_POST['csaladi_nev']);
            $utonev = trim($_POST['utonev']);
            $szuletesi_csaladi_nev = trim($_POST['szuletesi_csaladi_nev']);
            $szuletesi_utonev = trim($_POST['szuletesi_utonev']);
            $anyja_szuletesi_csaladi_neve = trim($_POST['anyja_szuletesi_csaladi_neve']);
            $anyja_szuletesi_utoneve = trim($_POST['anyja_szuletesi_utoneve']);
            $szuletesi_hely = trim($_POST['szuletesi_hely']);
            $szuletesi_datum = trim($_POST['szuletesi_datum']);
            $lakcim_iranyitoszam = trim($_POST['lakcim_iranyitoszam']);
            $lakcim_varos = trim($_POST['lakcim_varos']);
            $lakcim_utca = trim($_POST['lakcim_utca']);
            $lakcim_hazszam = trim($_POST['lakcim_hazszam']);
            $telefonszam = trim($_POST['telefonszam']);
            $email = trim($_POST['email']);
            if (array_key_exists('admin', $_POST) && $_POST['admin']='on'){
                $librarianAdminRights = '1';
            }
            else{
                $librarianAdminRights = '0';
            }
            
            $error = $librarianModel->validateLibrarianData1(
                        $felhasznaloi_nev, $jelszo,
                        $szuletesi_csaladi_nev, $szuletesi_utonev, 
                        $anyja_szuletesi_csaladi_neve, $anyja_szuletesi_utoneve,
                        $szuletesi_hely, $szuletesi_datum);
            
            $error .= $librarianModel->validateLibrarianData2($csaladi_nev, $utonev, 
                        $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                        $telefonszam, $email);
            
            if (!$error)
                $error = $librarianModel->registerLibrarian($felhasznaloi_nev,                                                   $jelszo,
                                                        $csaladi_nev,
                                                        $utonev,
                                                        $szuletesi_csaladi_nev,
                                                        $szuletesi_utonev,
                                                        $szuletesi_hely,
                                                        $szuletesi_datum,
                                                        $anyja_szuletesi_csaladi_neve,
                                                        $anyja_szuletesi_utoneve,            
                                                        $lakcim_iranyitoszam,
                                                        $lakcim_varos,
                                                        $lakcim_utca,
                                                        $lakcim_hazszam,
                                                        $telefonszam,
                                                        $email,
                                                        $librarianAdminRights);
            
            if (!$error)
                $message = 'A könyvtárost sikeresen regisztrálta a nyilvántartásban.';
            else 
                $message = $error;
            
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);
            $this->view('librarian/lib_uzenet', [$message]);
            
        }
        else 
        {
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);
            $this->view('librarian/lib_felvetel');
        }
    }
    
    public function choose($param) 
    {
                
        session_start();
        if (!isset($_SESSION['rights']) ||  $_SESSION['rights'] != 'admin') 
            return;
        else 
            $rights = $_SESSION['rights'];
        
        if (array_key_exists('findbyid', $_POST))
        {            
            $id = $_POST['azonosito'];
            $librarianModel = $this->model('LibrarianModel');
            $response = $librarianModel->findLibrarianById($id);
            if (isset($response['error']))
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('librarian/lib_uzenet', [$response['error']]);                
            }
            else 
            {                
                $librarian = $response['data'];         
                $this->view('header/header_urlap_2');
                $this->viewNavigation($rights);
                $this->view('librarian/lib_adatlap', ['operation' => $param, 'librarian' => $librarian]);
            }
        }
        else if (array_key_exists('findbyname', $_POST))
        {
            $name = $_POST['konyvtarosnev'];
            $librarianModel = $this->model('LibrarianModel');            
            $response = $librarianModel->findLibrarianByName($name);            
            if (isset($response['error']))
            {
                $error = $response['error'];
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('librarian/lib_uzenet', [$error]);                
            }
            else 
            {              
                $librarian = $response['data'];                
                $this->view('header/header_urlap_3_5');
                $this->viewNavigation($rights);                
                $this->view('librarian/lib_lista', ['operation' => $param, 'librarian' => $librarian]);
            }            
        }
        else if (array_key_exists('choosebyname', $_POST))
        {
            $id = $_POST['azonosito'];
            $librarianModel = $this->model('LibrarianModel');
            $response = $librarianModel->findLibrarianById($id);                   
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);
            $this->view('librarian/lib_adatlap', ['operation' => $param, 'librarian' => $response['data']]);
        }
        else            
        {          
            $this->view('header/header_urlap_3');
            $this->viewNavigation($rights);
            $this->view('librarian/lib_azonositas', ['operation' => $param]);
        }                
    }  
         
    public function process($param)
    {
        session_start();
        if (!isset($_SESSION['rights']) ||  $_SESSION['rights'] != 'admin') 
            return;
        else 
            $rights = $_SESSION['rights'];
        
        switch ($param)
        {
            case 'update':   
                $felhasznaloi_nev=$_POST['felhasznaloi_nev'];
                $csaladi_nev=trim($_POST['csaladi_nev']);
                $utonev=trim($_POST['utonev']);
                $lakcim_iranyitoszam=trim($_POST['lakcim_iranyitoszam']);
                $lakcim_varos=trim($_POST['lakcim_varos']);
                $lakcim_utca=trim($_POST['lakcim_utca']);
                $lakcim_hazszam=trim($_POST['lakcim_hazszam']);
                $telefonszam=trim($_POST['telefonszam']);
                $email=trim($_POST['email']);
                if (array_key_exists('admin', $_POST) && $_POST['admin']='on'){
                    $librarianAdminRights = '1';
                }
                else{
                    $librarianAdminRights = '0';
                }
                
                $librarianModel = $this->model('LibrarianModel');
                $error = $librarianModel->validateLibrarianData2($csaladi_nev, $utonev, 
                        $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                        $telefonszam, $email);
                if (!$error)
                {
                    $error = $librarianModel->updateLibrarianData($felhasznaloi_nev, 
                            $csaladi_nev, $utonev, 
                            $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                            $telefonszam, $email, $librarianAdminRights);
                }                
                if ($error)
                    $message = $error;
                else
                    $message = 'A könyvtáros adatait sikeresen módosította.';
                break;
            case 'delete':
                $felhasznaloi_nev=trim($_POST['felhasznaloi_nev']);
                $librarianModel = $this->model('LibrarianModel');
                $error = $librarianModel->deleteLibrarian($felhasznaloi_nev);
                if ($error)
                    $message = $error;
                else
                    $message = 'A könyvtáros tagságát sikeresen megszüntette, törölte a nyilvántartásból.';      
                break;
        }          
        
        $this->view('header/header_urlap_1');
        $this->viewNavigation($rights);
        $this->view('librarian/lib_uzenet', [$message]);       
    }    
}

