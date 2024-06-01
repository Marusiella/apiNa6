<?php
require_once "TodoModel.php";

class Database
{
    private mysqli $conn;

    public function __construct()
    {
        $conn = new mysqli("localhost", "root", "", "todos");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    public function Get(): string
    {
        $sql = "SELECT id, title, UNIX_TIMESTAMP(timestamp) as timestamp, done FROM todo WHERE done not like 1";
        $q = $this->conn->query($sql);
        $arr = [];

        if ($q->num_rows > 0) {
            while ($row = $q->fetch_assoc()) {
                $arr[] = new TodoModel($row["id"], $row["title"], $row["timestamp"], $row["done"]);
            }

        }
        return json_encode($arr);
    }

    public function Add(string $title): void
    {
        $q = "INSERT INTO todo (title) VALUES ('$title')";
        $r = $this->conn->query($q);
    }

    public function Delete(string $id): void
    {
        $q = "DELETE FROM todo WHERE id = '$id'";
        $r = $this->conn->query($q);
    }
}