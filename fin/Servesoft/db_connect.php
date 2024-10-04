<?php
// auth.php

class Auth {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT User.*, Role.Role_name FROM User 
                                    JOIN Role ON User.Role_id = Role.Role_id 
                                    WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['User_id'];
                $_SESSION['role'] = $user['Role_name'];
                return true;
            }
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function hasRole($role) {
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }

    public function requireRole($role) {
        if (!$this->isLoggedIn() || !$this->hasRole($role)) {
            header("Location: login.php");
            exit();
        }
    }
}

// Usage example:
// $auth = new Auth($db);
// $auth->requireRole('admin');
?>