<?php
// include "../database.php";
class ProjectContent {
    private $db;
    private $table_name = 'project_contents';

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($project_id, $file_name, $file_dir, $file_type, $file_size) {
        try {
            return $this->db->create($this->table_name, [
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
            return $this->db->read($this->table_name, $project_content_id);
        } catch (PDOException $e) {
            throw new Exception("Error reading project content: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading post: " . $e->getMessage());
        }
    }


    public function update($project_content_id, $data) {
        try {
            return $this->db->update($this->table_name, $project_content_id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating project content: " . $e->getMessage());
        }
    }

    public function delete($project_content_id) {
        try {
            return $this->db->delete($this->table_name, $project_content_id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting project content: " . $e->getMessage());
        }
    }
}
