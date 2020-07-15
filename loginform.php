<?php
$email = " ";
$password = " ";
$error="";
//$errors = array('email' => '', 'password' => '' );
session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $pas = md5($password);
    $sql = "SELECT * FROM Users WHERE email = '$email' and password = '$pas'";
    //get result
    $result = mysqli_query($con, $sql);
    //fetch details
    $out = mysqli_fetch_array($result);
    print_r($out);
    if ($out) {
        if ($out['email'] == $email && $out['password'] == $pas) {
            $_SESSION['username'] = $email; // $_SESSION['loggedin'] = true or false would work too
            $_SESSION['mypassword'] = $pas; // Why store the password in session data?
            header('Location: home.php');

        } else {
            echo "fieled to connecct to database";
        }
    }
    else{
     $error = "password error";
    }
    if(isset($_GET['saleh'])){
        session_unregister('first');
    }


    mysqli_free_result($result);
    mysqli_close($con);


}

