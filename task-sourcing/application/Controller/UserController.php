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

class UserController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function login()
    {
        require APP . 'view/user/config.php';
        if (isset($_POST['action_login'])) {
            $identification = $_POST['login'];
            $password       = $_POST['password'];
            if ($identification == '' || $password == '') {
                //$msg = array( 'Error', 'Username / Password Wrong !' );
            } else {
                $login = $LS->login($identification, $password, isset($_POST['remember_me']));
                if ($login === false) {
                    //$msg = array( 'Error', 'Username / Password Wrong !' );
                } elseif (is_array($login) && $login['status'] == 'blocked') {
                    //$msg = array( 'Error', 'Too many login attempts. You can attempt login after ' . $login['minutes'] . ' minutes (' . $login['seconds'] . ' seconds)' );
                }
            }
        }
        // load views
        require APP . 'view/_templates/header.php';
        //require APP . 'view/home/index.php';
        require APP . 'view/user/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function home()
    {
        // load views
        require APP . 'view/_templates/header.php';
        //require APP . 'view/home/index.php';
        require APP . 'view/user/home.php';
        require APP . 'view/_templates/footer.php';
    }

    public function register()
    {
        // load views
        require APP . 'view/_templates/header.php';
        //require APP . 'view/home/index.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }

    
    public function registerUser() {
        require APP . 'view/user/config.php';
        if (isset($_POST['action_login'])) {
            $identification = $_POST['login'];
            $password       = $_POST['password'];
            if ($identification == '' || $password == '') {
                $msg = array( 'Error', 'Username / Password Wrong !' );
            } else {
                $login = $LS->login($identification, $password, isset($_POST['remember_me']));
                if ($login === false) {
                    $msg = array( 'Error', 'Username / Password Wrong !' );
                } elseif (is_array($login) && $login['status'] == 'blocked') {
                    $msg = array( 'Error', 'Too many login attempts. You can attempt login after ' . $login['minutes'] . ' minutes (' . $login['seconds'] . ' seconds)' );
                }
            }
        }
        
        //header('Location:'. URL . 'user/home');
        //header('Location:localhost/');
    }
    
}
