<?php

class Posts {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($userId, $title, $contentId) {
        try {
            return $this->db->create('posts', [
                'user_id' => $userId,
                'title' => $title,
                'content_id' => $contentId
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating post: " . $e->getMessage());
        }
    }

    public function read($postId) {
        try {
            return $this->db->read('posts', $postId);
        } catch (PDOException $e) {
            throw new Exception("Error reading post: " . $e->getMessage());
        }
    }

    public function update($postId, $data) {
        try {
            return $this->db->update('posts', $postId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating post: " . $e->getMessage());
        }
    }

    public function delete($postId) {
        try {
            return $this->db->delete('posts', $postId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting post: " . $e->getMessage());
        }
    }
}

