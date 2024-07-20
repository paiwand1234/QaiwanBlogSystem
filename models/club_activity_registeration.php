<?php


class ClubActivityRegisteration {
    private $db;
    private $table_name = 'club_activity_registration';
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function create($userId, $clubId, $image_dir,$title, $description, $status) {
        try {
            return $this->db->create($this->table_name, [
                'user_id' => $userId,
                'club_id' => $clubId,
                'image_dir' => $image_dir,
                'title' => $title,
                'description' => $description,
                'status' => $status,
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating club activity: " . $e->getMessage());
        }
    }

    public function readAll() {
        try {
            return $this->db->readAll($this->table_name);
        } catch (PDOException $e) {
            throw new Exception("Error reading club: " . $e->getMessage());
        }
    }

    public function read($activityId) {
        try {
            return $this->db->read($this->table_name, $activityId);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activities: " . $e->getMessage());
        }
    }

    public function readMultipleColumns($conditions, $operator) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions, $operator);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }

    public function update($activityId, $data) {
        try {
            return $this->db->update($this->table_name, $activityId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating club activity: " . $e->getMessage());
        }
    }

    public function delete($activityId) {
        try {
            return $this->db->delete($this->table_name, $activityId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting club activity: " . $e->getMessage());
        }
    }
}





