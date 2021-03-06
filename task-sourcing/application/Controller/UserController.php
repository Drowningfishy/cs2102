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
            echo '<script language="JavaScript">alert("You have successfully logged in!");location.href= "/user/index"; </script>';
            //header("Location:" . URL);
        } else {
            /*
            $_SESSION['message'] = array(
                'status' => 'error',
                'message' => 'Password and username not match.'
            );
            */
            echo '<script language="JavaScript">alert("Your email/password is wrong!");location.href= "/user/index"; </script>';
            //header("Location:" . URL. 'user/index');
        }
    }

    public function logout() {
        if (Helper::logged_in()) {
            $this ->User -> logout();
            //$this -> index();
            /* $_SESSION['message'] = array(
                'status' => 'ok',
                'message' => 'You have logged out.'
            ); */
            echo '<script language="JavaScript">alert("You have successfully logged out!");location.href= "/user/index"; </script>';
        }
        else{
            header('Location:' . URL);
        }
    }

    public function admin() {
        if (Helper::is_admin()) {
            $users = $this -> User -> getUserByNameDesc();
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/admintool.php';
            require APP . 'view/_templates/footer.php';
        } else {
            //header('Location:' . URL);
            echo '<script language="JavaScript">alert("You are not admin!");location.href="'.URL.'"; </script>';
        }
    }

    public function RetrieveAdmin() {
        if (Helper::is_admin()) {
            $users = $this -> User -> getUserByNameDesc();
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/admintool.php';
            require APP . 'view/_templates/footer.php';
        } else {
            //header('Location:' . URL);
            echo '<script language="JavaScript">alert("You are not admin!");location.href="'.URL.'"; </script>';
        }
    }

    public function addValue($user_email) {
        if (Helper::is_admin()) {
            $valueToAdd = $_POST['point'];
            if (Helper::is_admin()) {
                if ($this -> User -> adminAddValue($user_email, $valueToAdd)) {
                    //header('Location:' . URL. 'user/RetrieveAdmin');
                    echo '<script language="JavaScript">alert("Successful!");location.href= "/user/RetrieveAdmin"; </script>';
                } else {
                    //header('Location:' . URL. 'user/RetrieveAdmin');
                    echo '<script language="JavaScript">alert("Failed!");location.href= "/user/RetrieveAdmin"; </script>';
                }
            }
        } else {
            //header('Location:' . URL);
            //echo '<script language="JavaScript">alert("You are not admin!");location.href= "RetrieveAdmin"; </script>';
            echo '<script language="JavaScript">alert("You are not admin!");location.href="'.URL.'"; </script>';
        }
        
    }
    
    public function register() {
        if (Helper::logged_in()) {
            header('Location:' . URL);
        } else {
            require APP . 'view/_templates/header.php';
            //require APP . 'view/user/register.php';
            require APP . 'view/user/signUp.php';
            require APP . 'view/_templates/footer.php';
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
                //header('Location:' . URL);
                echo '<script language="JavaScript">alert("Information not accepted! Please change another email!");location.href= "/user/register"; </script>';
            }
        } else {
            //$this -> register();
            echo '<script language="JavaScript">alert("Password not match confirmation!");location.href= "/user/register"; </script>';
        }
    }
}
