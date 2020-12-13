<?php

class Reader extends Controller {
    
    public function register() 
    {
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];
        
        if (array_key_exists('submit', $_POST))
        {
            $readerModel = $this->model('ReaderModel');
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
            $olvasojegy_azonosito = trim($_POST['olvasojegy_azonosito']);
            
            $error = $readerModel->validateReaderData1(
                        $olvasojegy_azonosito, $felhasznaloi_nev, $jelszo,
                        $szuletesi_csaladi_nev, $szuletesi_utonev, 
                        $anyja_szuletesi_csaladi_neve, $anyja_szuletesi_utoneve,
                        $szuletesi_hely, $szuletesi_datum);
            
            $error .= $readerModel->validateReaderData2($csaladi_nev, $utonev, 
                        $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                        $telefonszam, $email);
            
            if (!$error)
                $error = $readerModel->registerReader(  $felhasznaloi_nev,
                                                        $jelszo,
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
                                                        $olvasojegy_azonosito);
            
            if (!$error)
                $message = 'Az olvasót sikeresen regisztrálta a nyilvántartásban.';
            else 
                $message = $error;
            
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);
            $this->view('reader/uzenet', [$message]);
            
        }
        else 
        {
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);
            $this->view('reader/felvetel');
        }
    }
    
    public function choose($param) 
    {
                
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];
        
        if (array_key_exists('findbyid', $_POST))
        {            
            $id = $_POST['azonosito'];
            $readerModel = $this->model('ReaderModel');
            $response = $readerModel->findReaderById($id);
            if (isset($response['error']))
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('reader/uzenet', [$response['error']]);                
            }
            else 
            {                
                $reader = $response['data'];                
                $this->view('header/header_urlap_2');
                $this->viewNavigation($rights);
                $this->view('reader/adatlap', ['operation' => $param, 'reader' => $reader]);
            }
        }      
        else if (array_key_exists('findbyname', $_POST))
        {
            $name = $_POST['olvasonev'];
            $readerModel = $this->model('ReaderModel');            
            $response = $readerModel->findReadersByName($name);            
            if (isset($response['error']))
            {
                $error = $response['error'];
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('reader/uzenet', [$error]);                
            }
            else 
            {              
                $readers = $response['data'];                
                $this->view('header/header_urlap_3_5');
                $this->viewNavigation($rights);
                $this->view('reader/lista', ['operation' => $param, 'readers' => $readers]);
            }            
        }
        else if (array_key_exists('choosebyname', $_POST))
        {
            $id = $_POST['azonosito'];
            $readerModel = $this->model('ReaderModel');
            $response = $readerModel->findReaderById($id);                   
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);
            $this->view('reader/adatlap', ['operation' => $param, 'reader' => $response['data']]);
        }
        else            
        {          
            $this->view('header/header_urlap_3');
            $this->viewNavigation($rights);
            $this->view('reader/azonositas', ['operation' => $param]);
        }                
    }  
         
    public function process($param)
    {
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];
        
        switch ($param)
        {
            case 'update':                
                $olvasojegy_azonosito=trim($_POST['olvasojegy_azonosito']);
                $csaladi_nev=trim($_POST['csaladi_nev']);
                $utonev=trim($_POST['utonev']);
                $lakcim_iranyitoszam=trim($_POST['lakcim_iranyitoszam']);
                $lakcim_varos=trim($_POST['lakcim_varos']);
                $lakcim_utca=trim($_POST['lakcim_utca']);
                $lakcim_hazszam=trim($_POST['lakcim_hazszam']);
                $telefonszam=trim($_POST['telefonszam']);
                $email=trim($_POST['email']);
                
                $readerModel = $this->model('ReaderModel');
                $error = $readerModel->validateReaderData2($csaladi_nev, $utonev, 
                        $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                        $telefonszam, $email);
                if (!$error)
                {
                    $error = $readerModel->updateReaderData($olvasojegy_azonosito, 
                            $csaladi_nev, $utonev, 
                            $lakcim_iranyitoszam, $lakcim_varos, $lakcim_utca, $lakcim_hazszam,
                            $telefonszam, $email);
                }                
                if ($error)
                    $message = $error;
                else
                    $message = 'Az olvasó adatait sikeresen módosította.';
                break;
            case 'prolong':
                $olvasojegy_azonosito=trim($_POST['olvasojegy_azonosito']);
                $tagsag_ervenyesseg=trim($_POST['tagsag_ervenyesseg']);
                $readerModel = $this->model('ReaderModel');
                $response = $readerModel->prolongMembership($olvasojegy_azonosito,$tagsag_ervenyesseg);
                if (isset($response['error']))
                    $message = $response['error'];
                else
                    $message = 'Az olvasó tagságát sikeresen meghosszabbította '.
                        $response['tagsag'] . ' dátumig.';               
                break;
            case 'delete':
                $olvasojegy_azonosito=trim($_POST['olvasojegy_azonosito']);
                $readerModel = $this->model('ReaderModel');
                $error = $readerModel->hasBorrowedBooks($olvasojegy_azonosito);
                if (!$error)
                    $error = $readerModel->deleteReader($olvasojegy_azonosito);
                if ($error)
                    $message = $error;
                else
                    $message = 'Az olvasó tagságát sikeresen megszüntette, törölte a nyilvántartásból.';      
                break;
        }          
        
        $this->view('header/header_urlap_1');
        $this->viewNavigation($rights);
        $this->view('reader/uzenet', [$message]);       
    }


    public function expired()
    {
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];
        
        if (array_key_exists('delete', $_POST))
        {            
            $readerModel = $this->model('ReaderModel');
            $response = $readerModel->getExpiredList();
            $deleted = '';
            foreach ($response['data'] as $reader)
            {
                if (array_key_exists($reader->olvasojegy_azonosito, $_POST))
                {
                    $readerModel = $this->model('ReaderModel');
                    $readerModel->deleteReader($reader->olvasojegy_azonosito);
                    $deleted .= $reader->csaladi_nev .' '. $reader->utonev .' <br>';
                }
            }
            $message = 'A következő olvasók törölve lettek a nyilvántartásból: <br>' . $deleted;
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);                
            $this->view('reader/uzenet', [$message]);                            
        }
        else
        {
            $readerModel = $this->model('ReaderModel');
            $response = $readerModel->getExpiredList();
            if (!isset($response['error']))
            {
                $this->view('header/header_lista_2');
                $this->viewNavigation($rights);
                $this->view('reader/lejarttagsag', ['readers' => $response['data']]);            
            }
            else
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('reader/uzenet', [$response['error']]);                
            }
        }
    }   
    
}

