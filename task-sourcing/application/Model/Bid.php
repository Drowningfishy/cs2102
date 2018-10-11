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

    public function getBidsByUser($user_email)
    {
        $sql = "SELECT * FROM bids WHERE bidder_email = :bidder_email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':bidder_email' =>  $user_email
        );
        try {
            $query->execute($parameters);
            return $query->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function createBid($task_id, $user_email, $value) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this -> db -> prepare($sql);
        $parameters = array(':email' => $user_email);
        $query->execute($parameters);

        $account = $query->fetch();

        if ($account -> bidding_point_balance >= $value) {
            $sql = "INSERT INTO bids (task_id, bidder_email, bidding_point) VALUES (:task_id, :bidder_email, :bidding_point)";
            //echo $sql;
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':task_id' => (int)$task_id,
                ':bidder_email' => $user_email,
                ':bidding_point' => $value
            );
            try {
                $query->execute($parameters);
            } catch (PDOException $e) {
                return false;
            }

            $sql = "UPDATE users SET bidding_point_balance = :new_balance WHERE email = :email";
            $query = $this -> db -> prepare($sql);
            $parameters = array(
                ':new_balance' => $account -> bidding_point_balance - $value,
                ':email' => $account -> email);
            try {
                $query->execute($parameters);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateBid($task_id, $user_email, $value) {
        $sql = "UPDATE bids SET bidding_point = :bidding_point WHERE task_id = :task_id, bidder_email = :bidder_email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' => (int)$task_id,
            ':bidder_email' => $user_email,
            ':bidding_point' => $value
        );
        try {
            $query->execute($parameters);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteBid($task_id, $user_email) {
        $sql = "DELETE FROM bids WHERE task_id = :task_id, bidder_email = :bidder_email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' => (int)$task_id,
            ':bidder_email' => $user_email,
        );
        try {
            $query->execute($parameters);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function assignWinner($task_id, $winner_email) {
        $sql = "INSERT INTO assign (time, task_id, assignee_email) VALUES (now(), :task_id, :assignee_email)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':task_id' =>  (int)$task_id,
            ':assignee_email' => $winner_email,
        );
        try {
            $query->execute($parameters);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
