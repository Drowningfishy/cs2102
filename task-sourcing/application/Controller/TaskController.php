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

    public function mytask() {
        if (Helper::logged_in()) {
            $my_tasks = $this -> Task -> getTaskByUserEmail($_SESSION['login_user'] -> email);
            $assign_tasks = $this -> Task -> getAssignedTaskByUserEmail($_SESSION['login_user'] -> email);
            require APP . 'view/_templates/header.php';
            require APP . 'view/task/mytask.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header("Location:" . URL. "user/index");
        }
    }

    public function detail($task_id) {
        //var_dump($task_id);
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            $bids = $this -> Task -> getBidsByTask($task_id);
            var_dump($bids);
            $winner_email = $this -> Task -> getWinnerEmail($task_id);
            var_dump($winner_email);
            //var_dump($task);
            require APP . 'view/_templates/header.php';
            require APP . 'view/task/detail.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header("Location:" . URL. "task/index");
        }
    }

    public function new() {
        if (Helper::logged_in()) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/task/CreateTask.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function update($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                require APP . 'view/_templates/header.php';
                require APP . 'view/task/UpdateTask.php';
                require APP . 'view/_templates/footer.php';
            } else {
                header("Location:" . URL. "task/index");
            }
        } else {
            header("Location:" . URL. "task/index");
        }
    }


    //This method is for post only
    public function createTask() {
        //TODO: Fill in the variables
        $name = $_POST['taskname'];
        $point = $_POST['point'];
        $description = $_POST['taskDes'];
        if (Helper::logged_in() && $this -> Task -> createTask($name, $description, $point, $_SESSION['login_user'] -> email)) {
            header("Location:" . URL. "task/index");
        } else {
            header("Location:" . URL. "task/index");
        }
    }

    //This method is for post only
    public function updateTask($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                //TODO: Fill in the variables
                $id = $task_id;
                $name = $_POST['newTaskname'];
                $description = $_POST['newDes'];
                $point = $_POST['newPoint'];
                if ($this -> Task -> updateTask($id, $name, $description, $point)) {
                    header("Location:" . URL. "task/detail/". $id);
                } else {
                    header("Location:" . URL. "task/detail/". $id);
                }
            }
        }
    }
    public function search() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/task/SearchForTask.php';
        require APP . 'view/_templates/footer.php';
    }

    public function searchTask() {
        $name = $_POST['search'];
        $tasks = $this -> Task -> getTaskByPartialName($name);
        //var_dump($tasks);
        require APP . 'view/_templates/header.php';
        require APP . 'view/task/SearchForTask.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete($task_id) {
        if (isset($task_id)) {
            $task = $this -> Task -> getTaskById($task_id);
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
                var_dump($task);
                if ($this -> Task -> deleteTask($task_id)) {
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
            if ($task && Helper::logged_in() && ($task -> owner_email == $_SESSION['login_user'] -> email || Helper::is_admin())) {
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
