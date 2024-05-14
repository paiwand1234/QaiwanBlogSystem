<?php

class UserRole{
    const ADMIN = "admin";
    const USER = "user";
    const HEAD = "head";
}

class Users {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($username, $password, $email, $role, $student_id) {
        try {
            return $this->db->create('users', [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
                'email' => $email,
                'role' => $role,
                'student_id' => $student_id
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating user: " . $e->getMessage());
        }
    }

    public function read($userId) {
        try {
            return $this->db->read('users', $userId);
        } catch (PDOException $e) {
            throw new Exception("Error reading user: " . $e->getMessage());
        }
    }

    public function update($userId, $data) {
        try {
            // Check if password needs to be hashed before updating
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            return $this->db->update('users', $userId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    public function delete($userId) {
        try {
            return $this->db->delete('users', $userId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }
}



