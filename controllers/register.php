<?php
if(!isset($_POST["submit"])){
    die("Dont\'t cheat");
    header("Location: ../views/register.php");
}
require '../database/database.php';

/* regisztracio kezdodik */
/* injection elleni vedekezes */
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$passwordConfirm = mysqli_real_escape_string($connection, $_POST['passwordConfirm']);
$email = mysqli_real_escape_string($connection, $_POST['email']);

if (empty($username) || empty($password) || empty($passwordConfirm) || empty($email)) {
    die('Kerlek tolts ik valamit');
}
else{
    /* Van/e userbam */
    /* TODO> kesobb */

    /* jelso ellenoryes */
    if(strlen($password)<8){
        die('Adj meg 8 karaktert');
    }
    elseif(!preg_match('/[A-Z]/', $password)){
        die('Adj meg legalabb 1 nagy betut');
    }
    elseif(!preg_match('/[0-9]/', $password)){
        die('Adj meg legalabb 1 nagy betut');
    }
    elseif(!preg_match('/["+!%/ˇ^˘°˛`˙´#&łŁ€ÄäđĐ|<>]/', $password)){
        die('Adj meg legalabb 1 nagy betut');
    }
    elseif ($password != $passwordConfirm) {
        die('Nem egyenlo a jelszo');
    }
    else{
        /* Jelszo rendbe */
        echo "Password confirm";
        $hashedPassword = passwoed_hash($password, PASSWORD_DEFAULT);
        echo 'PW hash';

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            die("nem jo");
        }
        else{
            /* Van-e ilyen felhaszaol */
            $user_query = 'SELECT * FROM users WHERE username = "`.$username`";';
            $result = mysqli_query($connection, $user_query);
            if(mysqli_num_rows($result) != 0){
                die('Van ilyen falhasznalonev');
            }
            else{
                die('Nincsen meg ilyen');
            }
        /* Adatbazisba tolt */
        $sql_query = 'INSERT INTO ~users`(`username`,`password`,`email`)
        VALUES ("` . $username`", "` . $pasword`", "` . $email`");';
        echo $sql_query;
        }
    }

}
