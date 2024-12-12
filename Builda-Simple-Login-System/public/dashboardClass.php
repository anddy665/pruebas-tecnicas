<?php

class Dashboard
{
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
    }


    public static function initializeSession()
    {
        session_start();


        if (!isset($_SESSION['username'])) {
            header('Location: index.php');
            exit;
        }


        return $_SESSION['username'];
    }


    public function displayWelcomeMessage()
    {
        return "Welcome to your dashboard, " . htmlspecialchars($this->username) . "!";
    }
}

$username = Dashboard::initializeSession();
$dashboard = new Dashboard($username);


echo $dashboard->displayWelcomeMessage();
