<?php

class Book extends Controller {
      public function register() {        
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];
        
        $error = '';
        if (array_key_exists('first', $_POST))
        {          
            $bookModel = $this->model('BookModel');
            if ($bookModel->isIsbnExists($_POST['ISBN']))
            {
                if (!empty($_POST['cim']))
                    $error = $bookModel->isIsbnMistyped($_POST['ISBN'], $_POST['szerzok'], $_POST['cim']);
                if (!$error)                                      
                    $error = $bookModel->registerCopy($_POST['ISBN'], $_POST['azonosito']);                
            }
            else 
            {       
                $isbn = trim($_POST['ISBN']);
                $szerzok = trim($_POST['szerzok']);
                $cim = trim($_POST['cim']);
                $kiado = trim($_POST['kiado']);
                $kiadasi_ev = $_POST['kiadasi_ev'];
                $cutter = trim($_POST['cutter']);
                $eto_jelzet = trim($_POST['ETO_jelzet']);
                $oldalak_szama = $_POST['oldalak_szama'];
                $targyszavak = trim($_POST['targyszavak']);
                $azonosito = $_POST['azonosito'];               
                
                $error = $bookModel->validateBookData($isbn, $szerzok, $cim, $kiado, $kiadasi_ev, 
                                                        $cutter, $eto_jelzet, $oldalak_szama, 
                                                        $targyszavak, $azonosito);
                if (!$error)
                    $error = $bookModel->registerNewBook($isbn, $szerzok, $cim, $kiado, $kiadasi_ev, 
                                                        $cutter, $eto_jelzet, $oldalak_szama, 
                                                        $targyszavak, $azonosito);                                
            }                        
            if (!$error)
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('book/felvetel_sikeres', $_POST['ISBN']);                
            }
            else 
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('book/uzenet', [$error]);
            }
        }
        else if (array_key_exists('second', $_POST))
        {
            $isbn = $_POST['ISBN'];            
            $bookModel = $this->model('BookModel');
            $result = $bookModel->getBookDatabyIsbn($isbn);
            if (isset($result['data'])) {
                $bookdata = $result['data'];            
                $this->view('header/header_urlap_2');
                $this->viewNavigation($rights);
                $this->view('book/felvetel', [$bookdata]);
            }
            else {             
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('book/uzenet', [$result['error']]);            
            }
        } 
        else
        {
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);
            $this->view('book/felvetel');     
        }                
    }  
    
    public function delete() {
        session_start();
        if (!isset($_SESSION['rights']) || 
           ($_SESSION['rights']!='admin' && $_SESSION['rights']!='konyvtaros'))        
            return;
        else
            $rights = $_SESSION['rights'];

        
        if (array_key_exists('delete', $_POST))
        {
            $bookModel = $this->model('BookModel');
            $error = $bookModel->deleteBookById($_POST['azonosito']);
            if (!$error)
                $message = "A könyvpéldányt sikeresen törölte a katalógusból.";
            else 
                $message = $error;
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);
            $this->view('book/uzenet', [$message]);            
        }
        else if (array_key_exists('getdata', $_POST))
        {
            $bookModel = $this->model('BookModel');
            $result = $bookModel->getBookDataById($_POST['azonosito']);
            if (isset($result['data']))
            {
                $this->view('header/header_urlap_3');
                $this->viewNavigation($rights);
                $this->view('book/torles', [$result['data']]);            
            }
            else
            {
                $this->view('header/header_urlap_1');
                $this->viewNavigation($rights);
                $this->view('book/uzenet', [$result['error']]);                
            }
        }
        else 
        {
            $this->view('header/header_urlap_3');
            $this->viewNavigation($rights);
            $this->view('book/torles');            
        }
    }
      

    
}

