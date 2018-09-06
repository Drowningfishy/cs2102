<?php

/**
 * Class User
 *
 * TODO: Create CRUD for users. 
 */

namespace Mini\Model;

use Mini\Core\Model;

class User extends Model
{
    /**
     * Get all users from database
     */
    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
