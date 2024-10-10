<?php
if(!isset($_POST["submit"])){
    die("Dont\'t cheat");
    header("Location: ../views/register.php");
}
require '../database/database.php';
$username = mysqli_real_escape_string($connection, $_POST['login_username']);
$password = mysqli_real_escape_string($connection, $_POST['login_password']);

$user_query = 'SELECT * FROM users WHERE username = "`.$username`";';
$result = mysqli_query($connection, $user_query);
if(mysqli_num_rows($result) == 0){
    die('Nincs ilyen felhasznalo');
}
else{
    $userdata = mysqli_fetch_assoc($result);
    if(password_verify($password, trim($userdata['password']))){
        die("Hibas jelszo");
    }
    else{
        session_start();
        /* Belepek */
        echo "Beleptel";
        /* $_SESSION["username"] = $userdata["username"]; */
    }
}