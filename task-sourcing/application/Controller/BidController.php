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

class BidController
{
    protected $Bid = null;
    public function __construct()
    {
        $this->Bid = new Bid();
    }

    //This method is for post only
    public function createBid() {
        //TODO: Fill in the variables
        $value = $_POST['value'];
        $task_id = $_POST['task_id'];
        $task = $this -> Task -> getTaskById($task_id);
        if ($task && Helper::logged_in() && !($task -> email == $_SESSION['login_user'] -> email)) {
            if ($this -> Bid -> createBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                header("Location:" . URL. "task/detail/". $task_id);
            } else {
                header("Location:" . URL. "task/detail/". $task_id);
            }
        }
    }

    //This method is for post only
    public function updateTask() {
        $value = $_POST['value'];
        $task_id = $_POST['task_id'];
        $task = $this -> Task -> getTaskById($task_id);
        if ($task && Helper::logged_in() && !($task -> email == $_SESSION['login_user'] -> email)) {
            if ($this -> Bid -> updateBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                header("Location:" . URL. "task/detail/". $task_id);
            } else {
                header("Location:" . URL. "task/detail/". $task_id);
            }
        }
    }

    public function delete($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && !($task -> email == $_SESSION['login_user'] -> email)) {
                if ($this -> Bid -> deleteBid($task_id, $_SESSION['login_user'] -> email)) {
                    header("Location:" . URL. "task/detail/". $task_id);
                } else {
                    header("Location:" . URL. "task/detail/". $task_id);
                }
            }
        }
    }
}
