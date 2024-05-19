<?php

class ProjectContent {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($project_id, $file_name, $file_dir, $file_type, $file_size) {
        try {
            return $this->db->create('project_content', [
                'project_id' => $project_id,
                'file_name' => $file_name,
                'file_dir' => $file_dir,
                'file_type' => $file_type,
                'file_size' => $file_size,
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating project content: " . $e->getMessage());
        }
    }

    public function read($project_content_id) {
        try {
            return $this->db->read('project_content', $project_content_id);
        } catch (PDOException $e) {
            throw new Exception("Error reading project content: " . $e->getMessage());
        }
    }

    public function update($project_content_id, $data) {
        try {
            return $this->db->update('project_content', $project_content_id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating project content: " . $e->getMessage());
        }
    }

    public function delete($project_content_id) {
        try {
            return $this->db->delete('project_content', $project_content_id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting project content: " . $e->getMessage());
        }
    }
}
