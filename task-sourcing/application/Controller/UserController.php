<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Libs\Helper;
use Mini\Model\User;

class UserController
{
    protected $User = null;
    public function __construct()
    {
        $this->User = new User();
    }
    public function index() {
        if (Helper::logged_in()) {
            header("Location:" . URL);
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this -> User ->login($email, $password)) {
            header("Location:" . URL);
        } else {
            $this -> register();
        }
    }

    public function logout() {
        if ($this->User->loggedIn()) {
        $this->User->logout();
        }
        header('Location:' . URL);
    }
    
    public function register() {
        if (Helper::logged_in()) {
            header('Location:' . URL);
        } else {
            include APP . 'view/_templates/header.php';
            include APP . 'view/user/register.php';
            include APP . 'view/_templates/footer.php';
        }
    }

    public function registerUser() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirm'];
        
        if ($password == $password_confirmation) {
            if ($this -> User -> register($email, $name, $password)) {
                header('Location: ' . URL . 'user/login');
            } else {
                header('Location:' . URL);
            }
        } else {
            $this -> register();
        }
    }
}
