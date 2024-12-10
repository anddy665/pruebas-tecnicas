<?php

// Create a function that validates whether a given email address is valid. The function should:

// -Accept an email string as input.
// -Use appropriate validation methods to check if the email format is correct.
// -Return true for valid emails and false for invalid ones.

class ValidateEmail
{
    public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    public function  emailValidation($email)
    {
        if (is_string($email)) {
            return var_dump(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
        }
    }
};


$emailValue = $_REQUEST['email'];
$newValidation = new ValidateEmail($emailValue);
$emailForValidate = $newValidation->email;


$data = new ValidateEmail($emailValue);
$data->emailValidation($emailForValidate);
