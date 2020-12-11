<?php

class User extends Controller {
   
    public function login()
    {
        if (array_key_exists('submit', $_POST))
        {
            $error = '';
            $userModel = $this->model('UserModel');
            $error = $userModel->login(trim($_POST['username']), trim($_POST['password']));
            if ($error)
            {
                $this->view('header/header_urlap_1');
                $this->view('nav/nav_belepes');                
                $this->view('user/belepes', ['error' => $error]);
            }
            else {
                $targeturl = 'http://localhost:8080'.BASEURL.'/home/index';
                header('Location: '.$targeturl);
            }
        }
        else 
        {
            $this->view('header/header_urlap_1');
            $this->view('nav/nav_belepes');
            $this->view('user/belepes');                                
        }        
    }
    
    public function logout()
    {
        session_start();
        if (array_key_exists('username', $_SESSION))
        {
            session_start();
            $_SESSION = array();
            session_destroy();
            $targeturl = 'http://localhost:8080'.BASEURL.'/home/index';
            header('Location: '.$targeturl);            
        }        
    }
    
    public function userdata()
    {
        session_start();
        if (!isset($_SESSION['username']) || !isset($_SESSION['rights'])) 
            return;
        
        $userModel = $this->model('UserModel');
        $username = $_SESSION['username'];
        $rights = $_SESSION['rights'];
        $userdata = $userModel->getUserData($username, $rights);
        if (!isset($userdata['error']))
        {
            $this->view('header/header_urlap_2');
            $this->viewNavigation($rights);    
            $this->view('user/szemelyesadatok', ['userdata'=>$userdata['data']] ); 
        }
        else 
        {
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);    
            $this->view('user/uzenet', [$userdata['error']] );             
        }
    }
    
    public function update()
    {
        session_start();        
        if (!isset($_SESSION['username']) || !isset($_SESSION['rights'])) 
            return;       
        
        $username = $_SESSION['username'];
        $rights = $_SESSION['rights'];        
        $phone = $_POST['telefon'];
        $email = $_POST['email'];
        $userModel = $this->model('UserModel');
        $error = $userModel->validateUserData($phone, $email);
        if (!$error)
            $error = $userModel->updateUserData($username, $rights, $phone, $email);        
        
        if (!$error)
            $message = 'Sikeresen módosította adatait.';
        else
            $message = $error;
        
        $this->view('header/header_urlap_1');
        $this->viewNavigation($rights);    
        $this->view('user/uzenet', [$message] );         
    }
    
    public function changepwd() 
    {
        session_start();
        if (!isset($_SESSION['username']) || !isset($_SESSION['rights'])) 
            return;       
        
        $username = $_SESSION['username'];
        $rights = $_SESSION['rights'];
        
        if (array_key_exists('submit', $_POST))
        {
            $oldpwd = $_POST['old_password'];
            $newpwd1 = $_POST['new_password1'];
            $newpwd2 = $_POST['new_password2'];
            
            $userModel = $this->model('UserModel');
            $error = $userModel->changePassword($username, $rights, $oldpwd, $newpwd1, $newpwd2);
            if (!$error)
                $message = 'Sikeresen módosította jelszavát.';
            else
                $message = $error;        
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);    
            $this->view('user/uzenet', [$message] );              
        }
        else
        {
            $this->view('header/header_urlap_1');
            $this->viewNavigation($rights);           
            $this->view('user/jelszocsere');            
        }
    }
    
    
}
?>

