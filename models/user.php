<?php

class UserRole{
    const ADMIN = "admin";
    const USER = "user";
    const HEAD = "head";
}

class User {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($username, $password, $role) {
        try {
            return $this->db->create('users', [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
                'role' => $role
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating user: " . $e->getMessage());
        }
    }

    public function read($id) {
        try {
            return $this->db->read('users', $id);
        } catch (PDOException $e) {
            throw new Exception("Error reading user: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            // Check if password needs to be hashed before updating
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            return $this->db->update('users', $id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            return $this->db->delete('users', $id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }
}

