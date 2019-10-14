<?php

class Validation
{

    public $errors;

    public function __construct()
    {
        $errors = [];
    }

    public function emptyFieldsSignUp()
    {
        $flag = false;

        if (empty($_POST['email'])) {
            array_push($errors, 'Please enter your email <br>');
            return $flag;
        }
        if (empty($_POST['password'])) {
            array_push($errors, 'Please enter your password <br>');
            return $flag;
        }
        if (empty($_POST['name']) || empty($_POST['lastName']) || empty($_POST['sLastName'])) {
            array_push($errors, 'Please provide your full name <br>');
            return $flag;
        }
        if (empty($_POST['cellphone'])) {
            array_push($errors, 'Please enter your cellphone <br>');
            return $flag;
        }
        if (empty($_POST['phone'])) {
            array_push($errors, 'Please enter your phone <br>');
            return $flag;
        }
        if (empty($_POST['phoneCode'])) {
            array_push($errors, 'Please enter your phoneCode <br>');
            return $flag;
        }
        if (empty($_POST['username'])) {
            array_push($errors, 'Please enter your username <br>');
            return $flag;
        }

        return !$flag;
    }

    public function emptyFieldsLogin()
    {
        $flag = false;
        if (empty($_POST['username'])) {
            echo "Please enter your username <br>";
            $flag = true;
        }
        if (empty($_POST['password'])) {
            echo "Please enter your password <br>";
            $flag = true;
        }
        return $flag;
    }

    public function isValidPassword($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return false;
            $errors->push('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
        } else {
            return true;

        }

    }
}

?>