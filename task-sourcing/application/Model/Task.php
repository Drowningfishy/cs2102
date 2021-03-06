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
        $sql = "SELECT * FROM tasks_owned WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' => (int)$task_id
        );
        $query->execute($parameters);
        return ($query->fetchAll())[0];
    }

    public function getTaskByExpectpointDesc(){
        $sql = "SELECT * FROM tasks_owned order by expect_point Desc ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getOwnerById($task_id){
        $sql = "SELECT owner_email FROM tasks_owned WHERE task_id = :task_id";
        $query = $this ->db->prepare($sql);
        $parameters = array(
            ':task_id'=>(int)$task_id);
        $query->execute($parameters);
        return $query->fetch()->owner_email;
    }

    public function getTaskByUserEmail($owner_email)
    {
        $sql = "SELECT * FROM tasks_owned WHERE owner_email = :owner_email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':owner_email' => $owner_email
        );
        $query->execute($parameters);
        return ($query->fetchAll());
    }

    public function getBidedTaskByUserEmail($bidder_email)
    {
        $sql = "SELECT * FROM getBidedTasks WHERE bidder_email = :bidder_email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':bidder_email' => $bidder_email
        );
        $query->execute($parameters);
        return ($query->fetchAll());
    }

    public function getAssignedTaskByUserEmail($assignee_email)
    {
        $sql = "SELECT * FROM getAssigned WHERE assignee_email = :assignee_email" ;
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':assignee_email' => $assignee_email
        );
        $query->execute($parameters);
        return ($query->fetchAll());
    }

    
    public function getTaskByPartialName($task_name)
    {
        $sql = "SELECT * FROM tasks_owned WHERE task_name LIKE :task_name" ;
        $query = $this->db->prepare($sql);
        $parameters = array(':task_name' => '%'.$task_name.'%');
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getTaskAndRelationByAdvancedSearch($query_string)
    {
        $sql = "SELECT * FROM advancedSearch(:query)";
        $query = $this->db->prepare($sql);
        $parameters = array(':query' => $query_string);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getTaskByTaskType($task_type)
    {
        $sql = "SELECT * FROM tasks_owned WHERE task_type = :task_type" ;
        $query = $this->db->prepare($sql);
        $parameters = array(':task_type' => $task_type);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getBidsByTask($task_id)
    {
        $sql = "SELECT * FROM bids WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' =>  (int)$task_id
        );
        try {
            $query->execute($parameters);
            return $query->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }

    //TODO: Fill into correct sql and correct parameters.
    public function createTask($name, $description, $task_type, $point,$owner_email) {
        $sql = "INSERT INTO tasks_owned (task_name, expect_point, description, owner_email, task_type) VALUES (:task_name, :expect_point, :description,:owner_email,:task_type)";
        //echo $sql;
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_name' => $name,
            ':expect_point' => (int)$point,
            ':description' => $description,
            ':task_type'=> $task_type,
            ':owner_email' => $owner_email
        );
        try {
            if ($query->execute($parameters)){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO: Fill into correct sql and correct parameters.
    public function updateTask($task_id, $name, $description,$point) {
        $sql = "UPDATE tasks_owned SET task_name = :task_name, expect_point = :expect_point, description = :description WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_name' => $name,
            ':expect_point' => (int)$point,
            ':description' => $description,
            ':task_id' =>  (int)$task_id
        );
        try {
            if ($query->execute($parameters)){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO: Fill into correct sql and correct parameters.
    public function deleteTask($task_id) {
        $sql = "DELETE FROM tasks_owned WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' =>  (int)$task_id
        );
        try {
            if ($query->execute($parameters)){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTaskTypeNumber($type){
        $sql = "SELECT num FROM typeNumber WHERE task_type = :task_type";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_type' => $type,
        );
        $query->execute($parameters);
        return $query->fetchAll();

    }

    public function getTaskNumber(){
        $sql = "SELECT COUNT(*) FROM tasks_owned";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getHighestPoint($task_id){
        $sql = "SELECT Max FROM maxPoint WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id'=> $task_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
    
    public function getLowestPoint($task_id){
        $sql = "SELECT Min FROM minPoint WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id'=> $task_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function getWinnerEmail($task_id) {
        $sql = "SELECT assignee_email FROM assign WHERE task_id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' =>  (int)$task_id
        );
        try {
            $query->execute($parameters);
            return ($query->fetchAll());
        } catch (PDOException $e) {
            return null;
        }
    }
}
