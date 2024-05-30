<?php

class Clubs {
    private $db;
    private $table_name = 'clubs';
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $description, $image) {
        try {
            return $this->db->create($this->table_name, [
                'name' => $name,
                'image' => $image,
                'description' => $description
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating club: " . $e->getMessage());
        }
    }

    public function read($clubId) {
        try {
            return $this->db->read($this->table_name, $clubId);
        } catch (PDOException $e) {
            throw new Exception("Error reading club: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading clubs: " . $e->getMessage());
        }
    }


    public function readMultipleColumns($conditions, $operator) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions, $operator);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }

    public function update($clubId, $data) {
        try {
            return $this->db->update($this->table_name, $clubId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating club: " . $e->getMessage());
        }
    }

    public function delete($clubId) {
        try {
            return $this->db->delete($this->table_name, $clubId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting club: " . $e->getMessage());
        }
    }
}
