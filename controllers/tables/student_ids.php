<?php

class StudentIds {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($id, $studentId) {
        try {
            return $this->db->create('student_ids', [
                'id' => $id,
                'student_id' => $studentId,
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

