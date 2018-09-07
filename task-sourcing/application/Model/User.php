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
    public function getAllUsers(){
        $sql = "SELECT * FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Register a user to database.
     * TODO: Add datavalidation. 
     * @param string $email Email
     * @param string $password Password
     * @param string $name Name
     */
    public function register($email, $password, $name){
        $sql = "INSERT INTO user (email, password, name) VALUES (:email, :password, :name)";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':password' => $password, ':name' => $name);

        $query->execute($parameters);
    }

    public function login($email, $password) {
        $sql = "SELECT name, email, password, is_admin FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email);

        $account = $query->fetch();
        if ($account === false) {
        } else if (!password_verify($password, $account->password)) {
        } else {
            $_SESSION['login_user'] = $account;
        }
    }
}
