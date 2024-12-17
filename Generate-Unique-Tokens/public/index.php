<?php

class TokenClass
{
    private $users;
    private $existingTokens = [];

    public function __construct($users)
    {
        $this->users = $users;
    }


    private function generateUniqueToken($prefix = '')
    {
        do {
            $token = uniqid($prefix, true); 
        } while (in_array($token, $this->existingTokens));
        return $token; 
    }

    public function addTokens()
    {
        foreach ($this->users as $index => $user) {

            $newToken = $this->generateUniqueToken();
            $this->users[$index]['token'] = $newToken;
            $this->existingTokens[] = $newToken;
        }
        return $this->users;

    }
    public function printUsers()
    {
        foreach ($this->users as $user) {
            printf(
                "Name: %s | Age: %d | Token: %s\n",
                $user['name'],
                $user['age'],
                $user['token']
            );
        }
    }
}


$users = [
    ["name" => "Harrisong", "age" => 30, "token" => null],
    ["name" => "Jeff", "age" => 25, "token" => null],
    ["name" => "Charly", "age" => 28, "token" => null],
    ["name" => "Bar", "age" => 32, "token" => null],
    ["name" => "Bar", "age" => 29, "token" => null],
];


$tokenHandler = new TokenClass($users);


$updatedUsers = $tokenHandler->addTokens();


echo "### Lista de Usuarios con Tokens ###\n";
$tokenHandler->printUsers();


echo "\n### Resultado Completo con var_dump ###\n";
var_dump($updatedUsers);
