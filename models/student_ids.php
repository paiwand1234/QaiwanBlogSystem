<?php
// include "../database.php";
class StudentIds {
    private $db;
    private $table_name = 'student_ids'; 
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($id, $student_id, $user_is_active, $head_is_active) {
        try {
            return $this->db->create($this->table_name, [
                'student_id' => $student_id,
                'user_is_active' => $user_is_active,
                'head_is_active' => $head_is_active
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating student_id: " . $e->getMessage());
        }
    }

    public function read($id) {
        try {
            return $this->db->read($this->table_name, $id);
        } catch (PDOException $e) {
            throw new Exception("Error reading student_id: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading student_id: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            return $this->db->update($this->table_name, $id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating student_id: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            return $this->db->delete($this->table_name, $id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting student_id: " . $e->getMessage());
        }
    }
}

