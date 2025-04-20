<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $POST = $_POST;
}
else{
    $POST = array();
}

if(empty($POST['username'])){
    $username_error="Please enter a username";

}
if(empty($POST['password'])){
    $password_error="Please enter a password";
}
if(empty($POST['email'])){
    $email_error="Please enter an email address";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" autocomplete="off">
        Username: <input type="text" name="username">
        <span><?php if(isset($username_error)) echo $username_error; ?></span>
        <br>
        Password: <input type="password" name="password">
        <span><?php if(isset($password_error)) echo $password_error; ?></span>
        <br>
        Email: <input type="text" name="email">
        <span><?php if(isset($email_error)) echo $email_error; ?></span>
        <br>
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>
