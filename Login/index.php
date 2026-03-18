
<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'used_name' => $_SESSION['used_name_error'] ?? '',
    'same_pass' => $_SESSION['password_error'] ?? '',
    
];

$activeForm = $_SESSION['active_form'] ?? 'login-form';
session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function whatActiveForm($formname,$activeForm){
    return $formname === $activeForm ? 'active' : '';
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="auth.css">
    
</head>
<body  >
    <header>
        <button type = "button" id="theme-switch">⏾</button>
        <script src="script.js" defer></script>
    </header>
    
    

    <div class="container">
        <div class="form-box <?= whatActiveForm('login-form',$activeForm); ?>" id="login-form">
            <form action="login.php" method="post">
                <h2>Login</h2>
                
        
    
                <?= showError($errors['login']);?>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form'); return false;">Register</a></p>
            </form>
        </div>

        <div class="form-box <?= whatActiveForm('register-form',$activeForm); ?>" id="register-form">
            <form action="login.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['used_name']);?>
                <?= showError($errors['same_pass']);?>
                <input type= "text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="register">Register</button>
                <p>Have an account? <a href="#" onclick="showForm('login-form'); return false;">Login</a></p>
            </form>
        </div>


    </div>


    

   

</body>
</html>



   

 