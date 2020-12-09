<?php

class Controller {
    
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';        
        return new $model();
    }
    
    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';        
    }
    
    protected function viewNavigation($rights)
    {
        switch ($rights)
        {
            case 'admin':
                require_once '../app/views/nav/nav_belepve_admin.php';
                break;			
            case 'konyvtaros':
                require_once '../app/views/nav/nav_belepve_konyvtaros.php';                        
                break;
            case 'olvaso':
                require_once '../app/views/nav/nav_belepve_olvaso.php';                        
                break;
            default:
                require_once '../app/views/nav/nav_start.php';
                break;
        }           
    }
}

?>