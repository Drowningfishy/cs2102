<?php

/**
 * Class Bid
 *
 * TODO: Create CRUD for bids. 
 */

namespace Mini\Model;

use Mini\Core\Model;

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
}
