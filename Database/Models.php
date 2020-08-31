<?php
class Menu
{
    // DB stuff
    private $conn;
    private $table = 'menus';

    // Menu Properties
    public $id;
    public $title;
    public $servings;
    public $preface;
    public $image;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all Menus
    public function read()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY
        id DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->title = $row['title'];
        $this->servings = $row['servings'];
        $this->preface = $row['preface'];
        $this->image = $row['image'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, servings = :servings, preface = :preface, image = :image';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->servings = htmlspecialchars(strip_tags($this->servings));
        $this->preface = htmlspecialchars(strip_tags($this->preface));
        $this->image = htmlspecialchars(strip_tags($this->image));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':servings', $this->servings);
        $stmt->bindParam(':preface', $this->preface);
        $stmt->bindParam(':image', $this->image);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}
