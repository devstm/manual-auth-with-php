<?php
require_once 'connect_to_db.php';

use connection\Database;
use Models\User;
use Models\Data;
require_once ('Models/Data.php');
//parse_ini_file("Config/.ini");

$dat = new Data();
$dat->get('.env');
print_r($env);
var_dump($dat);

function databaseInstance(){
    return  Database::getInstance();
}
$mysqli = databaseInstance()->getConnection();
require_once 'Models/User.php';


$name = "";
$email = "";
$password = "";
$configPassword = "";
$data = 'data.txt';
$array = [];
$row = [];
$hand = fopen('data.txt', "a+");
$errors = array('name' => '', 'email' => '', 'password' => '', 'configPassword' => '');
if (isset($_POST['submit'])) {
    //check email
    if (empty($_POST['email'])) {
        $errors["email"] = "enter your email";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email not valid";
        }

    }

    //check name
    if (empty($_POST['name'])) {
        $errors["name"] = "enter your name";
    } else {
        $name = $_POST['name'];
    }

    //check password
    if (empty($_POST['password'])) {
        $errors["password"] = "enter your password";
    } else {
        $password = $_POST['password'];
    }
    //check password
    if (empty($_POST['configPassword'])) {
        $errors["configPassword"] = "enter your config password";
    } else {
        $configPassword = $_POST['configPassword'];
    }
    if (!empty($_POST['configPassword']) && !empty($_POST['password'])) {
        if ($password != $configPassword) {
            $errors["configPassword"] = "not equal";

        }
    }


    //check errors
    if (array_filter($errors)) {
        //echo "ther is error";

    } else {
        if ($password == $configPassword) {
            //check if string has a spatial sql char's .
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);
//            $pas = md5($password);
            // creat sql
            $sql = "INSERT INTO Users( email,name, password) VALUE ('$email','$name','$password')";
            // file system
            $row = [$email, $name, $password];
            array_push($array, json_encode($row));
            file_put_contents($data, $array, FILE_APPEND);

            $user = new User($email, $name, $password);
            $user->save();
            $link = 'storage/users.txt';
            if (!file_exists($link))
                mkdir('storage');
            $users = file_get_contents($link);

            if (!$users)
                $users = [];
            else
                $users = unserialize($users);
            $users[] = $user;
            file_put_contents($link, serialize($users));

            // go to login
//           if ($user->save()) {
//              header('Location: login.php');
//           }

        }

    }
}
?>