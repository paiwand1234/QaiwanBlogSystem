<?php

class ContentTypes{
    const TEXT = "text";
    const FILE = "file";
    const VIDEO = "video";
    const IMAGE = "image";
    
}

class PostContents {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($project_id, $file_name, $file_dir, $file_type, $file_size) {
        try {
            return $this->db->create('content', [
                'project_id' => $project_id,
                'file_name' => $file_name,
                'file_dir' => $file_dir,
                'file_type' => $file_type,
                'file_size' => $file_size,
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



