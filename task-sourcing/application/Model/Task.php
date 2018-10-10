<?php

/**
 * Class Task
 *
 * TODO: Create CRUD for tasks. 
 */

namespace Mini\Model;

use Mini\Core\Model;
use PDOException;

class Task extends Model
{
    /**
     * Get all tasks from database
     */
    public function getAllTasks(){
        $sql = "SELECT * FROM tasks_owned";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    //TODO: Fill into correct sql and correct parameters.
    public function getTaskById($task_id)
    {
        $sql = "";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    
    public function getTaskByPartialName($task_name)
    {
        $sql = "SELECT * FROM tasks_owned WHERE task_name LIKE :task_name" ;
        $query = $this->db->prepare($sql);
        $parameters = array(':task_name' => $task_name);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    //TODO: Fill into correct sql and correct parameters.
    public function createTask($name, $description, $point, $owner_email) {
        $sql = "INSERT INTO tasks_owned (task_name, expect_point, description, owner_email) VALUES (:task_name, :expect_point, :description, :owner_email)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_name' => $name,
            ':expect_point' => $point,
            ':description' => $description,
            ':owner_email' => $owner_emai
        );
        try {
            $query->execute($parameters);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO: Fill into correct sql and correct parameters.
    public function updateTask() {
        $sql = "";
        $query = $this->db->prepare($sql);
        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO: Fill into correct sql and correct parameters.
    public function deleteTask() {
        $sql = "";
        $query = $this->db->prepare($sql);
        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function assignWinner($task_id, $winner_email) {
        $sql = "";
        $query = $this->db->prepare($sql);
        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getWinner($task_id) {
        $sql = "";
        $query = $this->db->prepare($sql);
        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
