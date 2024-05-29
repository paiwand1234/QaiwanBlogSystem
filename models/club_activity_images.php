<?php

class ClubActivityImages {
    private $db;
    private $table_name = 'club_activity_images';
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function create($clubActivityId, $clubId, $image) {
        try {
            return $this->db->create($this->table_name, [
                'club_activity_id' => $clubActivityId,
                'club_id' => $clubId,
                'image' => $image
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating club activity image: " . $e->getMessage());
        }
    }

    public function read($imageId) {
        try {
            return $this->db->read($this->table_name, $imageId);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity image: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity images: " . $e->getMessage());
        }
    }

    public function readMultipleColumns($conditions, $operator) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions, $operator);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }
    public function update($imageId, $data) {
        try {
            return $this->db->update($this->table_name, $imageId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating club activity image: " . $e->getMessage());
        }
    }

    public function delete($imageId) {
        try {
            return $this->db->delete($this->table_name, $imageId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting club activity image: " . $e->getMessage());
        }
    }
}
