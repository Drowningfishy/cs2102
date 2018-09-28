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
            require APP . 'view/_templates/header.php';
            //require APP . 'view/user/index.php';
            require APP . 'view/user/homepage.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            //require APP . 'view/user/index.php';
            require APP . 'view/user/login.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this -> User ->login($email, $password)) {
            /*
            $_SESSION['message'] = array(
                'status' => 'ok',
                'message' => 'You have logged in.'
            );
            */
            header("Location:" . URL);
        } else {
            /*
            $_SESSION['message'] = array(
                'status' => 'error',
                'message' => 'Password and username not match.'
            );
            */
            $this -> register();
        }
    }

    public function logout() {
        if (Helper::logged_in()) {
            $this ->User -> logout();
            $this -> index();
            /* $_SESSION['message'] = array(
                'status' => 'ok',
                'message' => 'You have logged out.'
            ); */
        }
        header('Location:' . URL);
    }

    public function addValue() {
        $email = $_POST['email'];
        $valueToAdd = $_POST['valueToAdd'];
        if (Helper::is_admin()) {
            if ($this -> User -> adminAddValue($email, $valueToAdd)) {
                /* $_SESSION['message'] = array(
                    'status' => 'ok',
                    'message' => 'You have successfully added '. $valueToAdd. ' to '. $email. '.'
                ); */
            } else {
                /* $_SESSION['message'] = array(
                    'status' => 'error',
                    'message' => 'You do not have admin power. Illegal access.'
                ); */
            }
        }
    }
    
    public function register() {
        if (Helper::logged_in()) {
            header('Location:' . URL);
        } else {
            include APP . 'view/_templates/header.php';
            //include APP . 'view/user/register.php';
            include APP . 'view/user/signUp.php';
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
                header('Location: ' . URL . 'user/index');
            } else {
                header('Location:' . URL);
            }
        } else {
            $this -> register();
        }
    }
}
