<?php

/**
 * Class TaslController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Libs\Helper;
use Mini\Model\Bid;
use Mini\Model\Task;
use Mini\Model\User;

class BidController
{
    protected $Bid = null;
    public function __construct()
    {
        $this->Bid = new Bid();
        $this->Task = new Task();
        $this->User = new User();
    }

    //This method is for post only
    public function createBid($task_id) {
        //TODO: Fill in the variables
        $value = $_POST['point'];
        $task = $this -> Task -> getTaskById($task_id);
        if ($task && Helper::logged_in() && !($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
            if (!$this -> Bid -> havebidded($task_id, $_SESSION['login_user'] -> email)) {
            if ($this -> Bid -> createBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                header("Location:" . URL. "task/detail/". $task_id);
            } else {
                header("Location:" . URL. "task/detail/". $task_id);
            }
        } else {
            if ($this -> Bid -> updateBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                header("Location:" . URL. "task/detail/". $task_id);
            } else {
                header("Location:" . URL. "task/detail/". $task_id);
            }

        }
        }
    }

    //This method is for post only
    public function updateBid($task_id) {
        $value = $_POST['point'];
        $task = $this -> Task -> getTaskById($task_id);
        if ($task && Helper::logged_in() && !($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
            if ($this -> Bid -> updateBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                header("Location:" . URL. "task/detail/". $task_id);
            } else {
                header("Location:" . URL. "task/detail/". $task_id);
            }
        }
    }

    public function delete($task_id, $bidder_email) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                if ($this -> Bid -> deleteBid($task_id, $bidder_email)) {
                   header("Location:" . URL. "task/detail/". $task_id);
                } else {
                   header("Location:" . URL. "task/detail/". $task_id);
                }
            }
        }
    }
    
    public function pick($task_id, $bidder_email,$bidding_point) {
        var_dump($task_id);
        var_dump($bidder_email);
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                if($this -> Bid -> assignWinner($task_id, $bidder_email)){
                    

                    $owner_account = $this -> User -> getUserByEmail($task -> owner_email);
                    $this -> User -> addValue($owner_account,$bidding_point);

                    $bidder_account = $this -> User -> getUserByEmail($bidder_email);
                    $this -> User -> deductValue($bidder_account,$bidding_point);

                }
                header("Location:" . URL. "task/detail/". $task_id);
                
            }
        }
    }
}
