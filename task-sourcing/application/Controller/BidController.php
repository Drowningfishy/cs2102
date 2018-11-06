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
            if ($this -> Bid -> havebidded($task_id, $_SESSION['login_user'] -> email)==null) {
            if ($this -> Bid -> createBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                //header("Location:" . URL. "task/detail/". $task_id);
                echo '<script language="JavaScript">alert("Bid successful!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
            } else {
                //header("Location:" . URL. "task/detail/". $task_id);
                echo '<script language="JavaScript">alert("You do not have enough points or your point is lower than expected!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
            }
        } else {
            if ($this -> Bid -> updateBid($task_id, $_SESSION['login_user'] -> email, $value)) {
                echo '<script language="JavaScript">alert("Update bid successfully!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
            } else {
                echo '<script language="JavaScript">alert("You do not have enough points or your point is lower than expected!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
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
                //header("Location:" . URL. "task/detail/". $task_id);
                echo '<script language="JavaScript">alert("Update successful!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';

            } else {
                //echo '<script language="JavaScript">alert("You do not have enough points or your point is lower than expected!");location.href="'.URL. "task/detail/". $task_id.'"';
                echo '<script language="JavaScript">alert("You do not have enough points or your point is lower than expected!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
            }
        }
    }

    public function delete($task_id, $bidder_email) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                if ($this -> Bid -> deleteBid($task_id, $bidder_email)) {
                   //header("Location:" . URL. "task/detail/". $task_id);
                   echo '<script language="JavaScript">alert("Bid deleted!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
                } else {
                   //header("Location:" . URL. "task/detail/". $task_id);
                   echo '<script language="JavaScript">alert("Cannot delete this bid!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
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
                if(!$this -> Bid -> assignWinner($task_id, $bidder_email)){
                    echo '<script language="JavaScript">alert("The user do not have enough balance! Please pick another one!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
                } else {
                    //header("Location:" . URL. "task/detail/". $task_id);
                    echo '<script language="JavaScript">alert("Pick successful!");location.href="'.URL. "task/detail/". $task_id.'"; </script>';
                }
            }
        }
    }
}
