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
    public function __construct() {
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    }
    /**
     * Get all users from database
     */
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function register($email, $name, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this -> db -> prepare($sql);
        $parameters = array(':email' => $email);
        $query->execute($parameters);
        $account = $query->fetch();

        if (!$account) {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $query = $this -> db -> prepare($sql);
            $parameters = array(
                ':name' => $name,
                ':email' => $email,
                ':password' => $hash = password_hash($password, PASSWORD_BCRYPT),
            );
            $query -> execute($parameters);
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $sql = "SELECT name, email, password, is_admin FROM users WHERE email = :email";
        $query = $this -> db -> prepare($sql);
        $parameters = array(':email' => $email);
        $query->execute($parameters);
        $account = $query->fetch();

        if ($account) {
            if (password_verify($password, $account -> password)) {
                $_SESSION['login_user'] = $account;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function logout() {
        session_destroy();
    }
}
