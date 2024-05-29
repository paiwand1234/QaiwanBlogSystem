<?php

class ClubActivityChats {
    private $db;
    private $table_name = 'club_activity_chats';
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function create($clubActivityId, $clubId, $name, $content) {
        try {
            return $this->db->create($this->table_name, [
                'club_activity_id' => $clubActivityId,
                'club_id' => $clubId,
                'name' => $name,
                'content' => $content
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating club activity chat: " . $e->getMessage());
        }
    }

    public function read($chatId) {
        try {
            return $this->db->read($this->table_name, $chatId);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity chat: " . $e->getMessage());
        }
    }

    public function readOneColumn($columnname, $value) {
        try {
            return $this->db->readOneColumn($this->table_name, $columnname, $value);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity chats: " . $e->getMessage());
        }
    }

    public function readMultipleColumns($conditions) {
        try {
            return $this->db->readMultipleColumns($this->table_name, $conditions);
        } catch (PDOException $e) {
            throw new Exception("Error reading club activity chats: " . $e->getMessage());
        }
    }

    public function update($chatId, $data) {
        try {
            return $this->db->update($this->table_name, $chatId, $data);
        } catch (PDOException $e) {
            throw new Exception("Error updating club activity chat: " . $e->getMessage());
        }
    }

    public function delete($chatId) {
        try {
            return $this->db->delete($this->table_name, $chatId);
        } catch (PDOException $e) {
            throw new Exception("Error deleting club activity chat: " . $e->getMessage());
        }
    }
}
