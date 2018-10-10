<?php

/**
 * Class Bid
 *
 * TODO: Create CRUD for bids. 
 */

namespace Mini\Model;

use Mini\Core\Model;
use PDOException;

class Bid extends Model
{
    /**
     * Get all bids from database
     */
    public function getAllBids()
    {
        $sql = "SELECT * FROM Bid";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    //TODO: Fill into correct sql and correct parameters.
    public function getBidsByTask($task_id)
    {
        $sql = "";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    //TODO: Fill into correct sql and correct parameters.
    public function getBidsByUser($user_email)
    {
        $sql = "";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    //TODO: Fill into correct sql and correct parameters.
    public function createBid($task_id, $user_email, $value) {
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
    public function updateBid($task_id, $user_email, $value) {
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
    public function deleteBid($task_id, $user_email) {
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
