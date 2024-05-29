<?php

// include "../database.php";

class Projects {
    private $db;
    private $table_name = 'projects';
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($user_id, $name, $description) {
        try {
            return $this->db->create($this->table_name, [
                'user_id' => $user_id,
                'name' => $name,
                'description' => $description,
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating project: " . $e->getMessage());
        }
    }

    public function read($project_id) {
        try {
            return $this->db->read($this->table_name, $project_id);
        } catch (PDOException $e) {
            throw new Exception("Error reading project: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading project: " . $e->getMessage());
        }
    }




    public function update($project_id, $data) {
        try {
            return $this->db->update($this->table_name, $project_id, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating project: " . $e->getMessage());
        }
    }

    public function delete($project_id) {
        try {
            return $this->db->delete('projects', $project_id);
        } catch (PDOException $e) {
            throw new Exception("Error deleting project: " . $e->getMessage());
        }
    }
}
