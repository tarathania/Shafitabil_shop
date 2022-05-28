<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'product';

    // Post Properties
    public $id;
    public $name;
    public $uom;
    public $stock;
    public $price;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY ID';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE ID = ?';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['ID'];
          $this->name = $row['namBarang'];
          $this->uom = $row['UOM'];
          $this->stock = $row['Stock'];
          $this->price = $row['price'];
    }
  }