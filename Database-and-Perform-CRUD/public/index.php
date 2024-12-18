<?php

class MysqlConnection
{
    public $servername;
    public $username;
    public $password;
    public $database;

    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function makeConnection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully<br>";
    }


    public function extractInfo()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Name: " . $row["name"] . ",  Email: " . $row["email"] . ", Age:  " . $row["age"] . "<br>";
            }
        } else {
            echo "No data found in the 'users' table.";
        }

        $conn->close();
    }


    public function deleteData()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM users WHERE id=1";

        if ($conn->query($sql) === TRUE) {
            echo "deleted successfully";
        } else {
            echo "Error deleting data: " . $conn->error;
        }

        $conn->close();
    }
}


$connect = new MysqlConnection("localhost", "harrisong", "root", "student_data");
$connect->makeConnection();
$connect->extractInfo();
$connect->deleteData();
