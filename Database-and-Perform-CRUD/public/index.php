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

    public function makeConnection($server, $user, $key, $db)
    {
        $conn = new mysqli($server, $user, $key, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully<br>";

       
    }


    public function extractInfo($server, $user, $key, $db) {
        $conn = new mysqli($server, $user, $key, $db);

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Name: " . $row["name"] . ",  Email: ". $row["email"] . ", Age:  ". $row["age"]. "<br>";
            }
        } else {
            echo "No data found in the 'users' table.";
        }

        $conn->close();
    }
}


$connect = new MysqlConnection("localhost", "harrisong", "root", "student_data");
$connect->makeConnection($connect->servername, $connect->username, $connect->password, $connect->database);
$connect->extractInfo("localhost", "harrisong", "root", "student_data");
