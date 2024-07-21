<?php

class Operators {
    const OR = "OR";
    const AND = "AND";
}

class Database {
    private $host = 'localhost';
    private $dbname = 'u304011287_qaiwan_blog';
    private $username = 'u304011287_paiwand';
    private $password = '7KabZ^*qUdx=';
    // private $port = 8889;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Set default fetch mode
    ];
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function create($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($data));
        return $this->pdo->lastInsertId();
    }

    public function readAll($table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readOneColumn($table, $rowname, $value) {
        $sql = "SELECT * FROM $table WHERE $rowname = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$value]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readMultipleColumns($table, $conditions, $operator) {
        $query = "SELECT * FROM $table WHERE ";
        $params = [];
        $clauses = [];
        foreach ($conditions as $column => $value) {
            // THIS WILL AUTOMATICALLY ADD IT TO THE END OF THE ARRAY
            $clauses[] = "$column = :$column";
            $params[$column] = $value;
        }
        $query .= implode(' ' . $operator . ' ', $clauses);
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $id, $data) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
        }
        $set = implode(', ', $set);

        $sql = "UPDATE $table SET $set WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge(array_values($data), [$id]));
        return $stmt->rowCount();
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    // New method to read with limit
    public function readWithLimit($table, $limit, $offset, $conditions , $orderbycolumn, $direction) {
        // Initialize the SQL query
        $sql = "SELECT * FROM $table";
    
        // Add conditions if provided
        if (!empty($conditions)) {
            $clauses = [];
            $params = [];
            foreach ($conditions as $column => $value) {
                $clauses[] = "$column = ?";
                $params[] = $value;
            }
            $sql .= ' WHERE ' . implode(' AND ', $clauses);
        }
    
        // Append LIMIT and OFFSET
        $sql .= " ORDER BY $orderbycolumn $direction LIMIT ? OFFSET ?";
    
        // Prepare the statement
        $stmt = $this->pdo->prepare($sql);
    
        // Bind parameters for conditions
        if (!empty($conditions)) {
            $i = 1;
            foreach ($params as $param) {
                $stmt->bindValue($i, $param);
                $i++;
            }
            // Bind the LIMIT and OFFSET parameters
            $stmt->bindValue($i, $limit, PDO::PARAM_INT);
            $stmt->bindValue($i + 1, $offset, PDO::PARAM_INT);
        } else {
            // Bind the LIMIT and OFFSET parameters if no conditions
            $stmt->bindValue(1, $limit, PDO::PARAM_INT);
            $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        }
    
        // Execute the statement
        $stmt->execute();
    
        // Fetch and return the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
