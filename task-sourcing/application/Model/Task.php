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
    public function getAllTasks()
    {
        $sql = "SELECT * FROM task";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
