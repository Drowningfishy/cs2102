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
use Mini\Model\Task;

class TaskController
{
    protected $Task = null;
    public function __construct()
    {
        $this->Task = new Task();
    }
    public function index() {
        $tasks = $this -> Task -> getAllTasks();
        require APP . 'view/_templates/header.php';
        require APP . 'view/task/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function detail($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            require require APP . 'view/_templates/header.php';
            require APP . 'view/task/detail.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header("Location:" . URL. "task/index");
        }
    }

    //This method is for post only
    public function createTask() {
        //TODO: Fill in the variables
        $name = $_POST['taskname'];
        $point = $_POST['point'];
        $description = $_POST['description'];
        if ($this -> Task -> createTask($name, $description, $point)) {
            header("Location:" . URL. "task/index");
        } else {
            header("Location:" . URL. "task/index");
        }
    }

    //This method is for post only
    public function updateTask() {
        $task = $this -> Task -> getTaskById($task_id);
        if ($task && Helper::logged_in() && ($task -> email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
            //TODO: Fill in the variables
            $id = $_POST['id'];
            $name = $_POST['name'];
            if ($this -> Task -> updateTask($id, $name)) {
                header("Location:" . URL. "task/detail/". $id);
            } else {
                header("Location:" . URL. "task/detail/". $id);
            }
        }
    }

    public function delete($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                if ($this -> Task -> deleteTask($id)) {
                    header("Location:" . URL. "task/index");
                } else {
                    header("Location:" . URL. "task/index");
                }
            }
        } else {
            header("Location:" . URL. "task/index");
        }
    }

    public function assignWinner($task_id, $winner_email) {
        if (isset($task_id) && isset($winner_email)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                if ($this -> Task -> assignWinner($task_id, $winner_email)) {
                    header("Location:" . URL. "task/detail/". $id);
                } else {
                    header("Location:" . URL. "task/detail/". $id);
                }
            }
        } else {
            header("Location:" . URL. "task/index");
        }
    }
}
