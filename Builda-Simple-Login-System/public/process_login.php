<?php
class Auth
{
    private $users;


    public function __construct()
    {
        $this->users = [
            'user1' => password_hash('password123', PASSWORD_DEFAULT),
            'admin' => password_hash('admin123', PASSWORD_DEFAULT),
        ];
    }


    public function login($username, $password)
    {

        if (isset($this->users[$username]) && password_verify($password, $this->users[$username])) {
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        } else {
            return "Invalid username or password. Please <a href='index.html'>try again</a>.";
        }
    }
}



session_start();


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$auth = new Auth();


$message = $auth->login($username, $password);


if (isset($message)) {
    echo "<p>$message</p>";
}
