<?php
session_start();
require_once 'db.php';

if(isset($_POST['register'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $checkUser = $conn->query("SELECT user FROM users WHERE user = '$name'");
    if($checkUser->num_rows > 0){
        $_SESSION['used_name_error'] = 'username alr being used';
        $_SESSION['active_form'] = 'register-form';
       

    }

    elseif($password != $confirmPassword){
        $_SESSION['password_error'] = 'password doesnt match';
          $_SESSION['active_form'] = 'register-form';
           

    }

    else{
         $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $conn->query("INSERT INTO users (user,password) VALUES ('$name','$password')");
    }

    header("Location:index.php");
           exit();

   

    

   
}

if(isset($_POST['login'])){
        $password = $_POST['password'];
         $name = $_POST['username'];

        $result = $conn->query("SELECT * FROM users WHERE user = '$name'");
        if($result-> num_rows >0){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user['password'])){
                $_SESSION['username'] = $user['user'];
                header("Location: /FirstYearProject/Dashboard/dashboardHTML/home.html");
                exit();
            }
        }


        $_SESSION['login_error'] = 'incorrect password or username';
        $_SESSION['active_form'] = 'login-form';
        header("Location: index.php");
        exit();
    }
// add a register complete

if(isset($_POST['logout'])){
    $_SESSION = array(); // Clear all data
    session_destroy();   // Kill the session
    header("Location: index.php"); // Refresh the page to show defaults
    exit;

}
?>


