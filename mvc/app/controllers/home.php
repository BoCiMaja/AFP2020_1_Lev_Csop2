<?php

class Home extends Controller {
  
    public function index()
    {   
        session_start();                 
        $rights = isset($_SESSION['rights']) ? $_SESSION['rights'] : '';         
		
        $this->view('header/header');
        $this->viewNavigation($rights);		
        $this->view('home/index');//, ['username' => $username, 'rights' => $rights] );        
    }    
    
    public function info()
    {
        session_start();                  
        $rights = isset($_SESSION['rights']) ? $_SESSION['rights'] : '';
		
        $this->view('header/header');
        $this->viewNavigation($rights);		
        $this->view('home/tajekoztato');//, ['username' => $username, 'rights' => $rights] );        
    }
}

?>