<?php
// include "../database.php";

class UserRole{
    const ADMIN = "admin";
    const USER = "user";
    const HEAD = "head";
}

class Users {
    private $db;
    private $table_name = 'users';
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($username, $password, $email, $role, $student_id) {
        try {
            return $this->db->create($this->table_name, [
                'username' => $username,
                'password' => $password, // Hash the password
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
            return $this->db->read($this->table_name, $userId);
        } catch (PDOException $e) {
            throw new Exception("Error reading user: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading user: " . $e->getMessage());
        }
    }
    public function readMultipleColumns($conditions, $operator) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions, $operator);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }

    public function readWithLimit($limit, $offset = 0, $conditions = [], $orderbycolumn = "id", $direction = "ASC") {
        try {
            return $this->db->readWithLimit($this->table_name, $limit, $offset, $conditions, $orderbycolumn, $direction);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }


    public function update($userId, $data) {
        try {
            // Check if password needs to be hashed before updating
            if (isset($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            return $this->db->update($this->table_name, $userId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    public function delete($userId) {
        try {
            return $this->db->delete($this->table_name, $userId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }
}



