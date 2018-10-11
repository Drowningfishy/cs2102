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
use Mini\Model\Task;
use Mini\Model\Bid;
use PDO;

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
            header("Location:" . URL. 'user/index');
        } else {
            /*
            $_SESSION['message'] = array(
                'status' => 'error',
                'message' => 'Password and username not match.'
            );
            */
            header("Location:" . URL. 'user/register');
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

    public function admin() {
        if (Helper::is_admin()) {
            $users = $this -> User -> getAllUsers();
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/admintool.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('Location:' . URL);
        }
    }

    public function addValue($user_email) {
        if (Helper::is_admin()) {
            $valueToAdd = $_POST['point'];
            if (Helper::is_admin()) {
                $account = $this -> User -> getUserByEmail($user_email);
                if ($account && $this -> User -> addValue($account, $valueToAdd)) {
                    header('Location:' . URL. 'user/admin');
                } else {
                    header('Location:' . URL. 'user/admin');
                }
            }
        } else {
            header('Location:' . URL);
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
                header('Location:' . URL);
            }
        } else {
            header("Location:" . URL. 'user/register');
        }
    }

    public function adminInit() {
        function randomkeys($length){   
            $output='';   
            for ($a = 0; $a<$length; $a++) {   
                $output .= chr(mt_rand(33, 126)); 
             }   
             return $output;   
         } 
        if (Helper::is_admin()) {
            $Task = new Task();
            $Bid = new Bid();
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
            for ($i = 0; $i < 20; $i++) {
                //$this -> User -> register(''.randomkeys(5).'@email.email', randomkeys(5), randomkeys(8));
            }
            $users = $this -> User -> getAllUsers();
            foreach ($users as $user) {
                for ($i = 0; $i < 6; $i++) {
                    $sql = "INSERT INTO tasks_owned (task_name, expect_point, description, owner_email) VALUES (:task_name, :expect_point, :description, :owner_email)";
                    //echo $sql;
                    $query = $db->prepare($sql);
                    $parameters = array(
                        ':task_name' => randomkeys(6),
                        ':expect_point' => mt_rand(0,35),
                        ':description' => randomkeys(10),
                        ':owner_email' => $user -> email
                    );
                    try {
                        $query->execute($parameters);
                        //return $sql;
                    } catch (PDOException $e) {
                        //return false;
                    }
                }
            }
            $tasks = $Task -> getAllTasks();
            for ($i = 0; $i < 100; $i++) {
                $randtask = $tasks[mt_rand(0,100)];
                $randuser = $users[mt_rand(0,20)];
                $sql = "INSERT INTO bids (task_id, bidder_email, bidding_point) VALUES (:task_id, :bidder_email, :bidding_point)";
                //echo $sql;
                $query =$db->prepare($sql);
                $parameters = array(
                    ':task_id' => $randtask -> task_id,
                    ':bidder_email' => $randuser -> email,
                    ':bidding_point' => mt_rand(0,35)
                );
                try {
                    $query->execute($parameters);
                    if ($i % 5 == 0) {
                        $sql = "INSERT INTO assign (time, task_id, assignee_email) VALUES (now(), :task_id, :assignee_email)";
                        $query = $db->prepare($sql);
                        $parameters = array(
                            ':task_id' =>  $randtask -> task_id,
                            ':assignee_email' => $randuser -> email,
                        );
                        try {
                            $query->execute($parameters);
                            //return true;
                        } catch (PDOException $e) {
                            //return false;
                        }
                    }
                } catch (PDOException $e) {
                    
                }
            }
         } else {
            header('Location:' . URL);
        }
    }
}
