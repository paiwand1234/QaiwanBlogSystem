<?php

class StudentIds {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($id, $student_id, $user_is_active, $head_is_active) {
        try {
            return $this->db->create('student_ids', [
                'student_id' => $student_id,
                'user_is_active' => $user_is_active,
                'head_is_active' => $head_is_active
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating post: " . $e->getMessage());
        }
    }

    public function read($id) {
        try {
            return $this->db->read('student_ids', $id);
        } catch (PDOException $e) {
            throw new Exception("Error reading post: " . $e->getMessage());
        }
    }

    public function readOneRow($columnname, $value) {
        try {
            return $this->db->readOneRow('student_ids', $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading post: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            return $this->db->update('student_ids', $id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating post: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            return $this->db->delete('student_ids', $id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting post: " . $e->getMessage());
        }
    }
}

