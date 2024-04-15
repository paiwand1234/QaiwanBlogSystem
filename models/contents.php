<?php

class Contents {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($contentType, $content) {
        try {
            return $this->db->create('content', [
                'content_type' => $contentType,
                'content' => $content
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating content: " . $e->getMessage());
        }
    }

    public function read($contentId) {
        try {
            return $this->db->read('content', $contentId);
        } catch (PDOException $e) {
            throw new Exception("Error reading content: " . $e->getMessage());
        }
    }

    public function update($contentId, $data) {
        try {
            return $this->db->update('content', $contentId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating content: " . $e->getMessage());
        }
    }

    public function delete($contentId) {
        try {
            return $this->db->delete('content', $contentId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting content: " . $e->getMessage());
        }
    }
}



