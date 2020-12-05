<?php

class Home extends Controller {
  
    public function index()
    {   
        session_start();   
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';         
        $rights = isset($_SESSION['rights']) ? $_SESSION['rights'] : '';         
		
        $this->view('header/header');
        if (empty($rights))
        {	
                $this->view('nav/nav_start');
        }
        else
        {
                switch ($rights)
                {
                        case 'admin':
                                $this->view('nav/nav_belepve_admin');
                                break;			
                        case 'konyvtaros':
                                $this->view('nav/nav_belepve_konyvtaros');
                                break;
                        case 'olvaso':
                                $this->view('nav/nav_belepve_olvaso');
                                break;
                }
        }		
        $this->view('home/index', ['username' => $username, 'rights' => $rights] );        
    }    
}

?>