
<?php

class ClubHeads {
    private $db;
    private $table_name = 'club_heads';
    
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($clubId, $userId) {
        try {
            return $this->db->create($this->table_name, [
                'club_id' => $clubId,
                'user_id' => $userId
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating club head: " . $e->getMessage());
        }
    }

    public function read($clubHeadId) {
        try {
            return $this->db->read($this->table_name, $clubHeadId);
        } catch (PDOException $e) {
            throw new Exception("Error reading club head: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }


    public function readMultipleColumns($conditions, $operator) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions, $operator);
        } catch (PDOException $e) {
            throw new Exception("Error reading club heads: " . $e->getMessage());
        }
    }

    public function update($clubHeadId, $data) {
        try {
            return $this->db->update($this->table_name, $clubHeadId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating club head: " . $e->getMessage());
        }
    }

    public function delete($clubHeadId) {
        try {
            return $this->db->delete($this->table_name, $clubHeadId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting club head: " . $e->getMessage());
        }
    }
}

