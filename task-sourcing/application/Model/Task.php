<?php

/**
 * Class Task
 *
 * TODO: Create CRUD for tasks. 
 */

namespace Mini\Model;

use Mini\Core\Model;

class Task extends Model
{
    /**
     * Get all tasks from database
     */
    public function getAllTasks(){
        $sql = "SELECT * FROM task";
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

    //TODO: Fill into correct sql and correct parameters.
    public function createTask() {
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
