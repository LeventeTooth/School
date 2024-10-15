<!-- Védekezés injection ellen -->
<!-- Van-e ilyen felhasználó -->
<!-- Kérd le minden adatát -->

<?php
session_start();
if (isset($_POST['submit']) == false) { /* meg lett-e nyomva a submit gomb */
    header('Location: ../views/index.php');
    die('Don\'t cheat!');
}

require '../database/database.php';

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

/* Van-e ilyen felhasználó? */
/* Van-e ilyen felhasználó */
$user_query = 'SELECT * FROM users WHERE username = "' . $username . '";';
$result = mysqli_query($connection, $user_query);

if (mysqli_num_rows($result) != 1) {
    /*     header('Location: ../views/registration.php?status=loginError&error=userNotExist&username='.$username);
     */
    die('Nincs ilyen felhasználó, lehet elírtad a neved.');
} else {
    $userData = mysqli_fetch_assoc($result);
    /*mi van a tömbben?  var_dump($userData); */

    if (password_verify($password, trim($userData["password"])) == false) {
        die("Hibás jelszó");
    } else {
        /* Bejelentkezek */

        echo 'Bejelentkezés sikeres!';
        $fullNameSql = "SELECT fullName FROM users WHERE username='" . $username . "';";
        $fullNameResult = mysqli_query($connection, $fullNameSql);
        
        if ($fullNameResult) {
            if (mysqli_num_rows($fullNameResult) > 0) {
                $row = mysqli_fetch_assoc($fullNameResult);
                $_SESSION["fullName"] = $row['fullName'];
            } else {
                die ("Not GOOD");
            }
        }
        
        $emailSql = "SELECT email FROM users WHERE username='" . $username . "';";
        $emailResult = mysqli_query($connection, $emailSql);
        if ($emailResult && mysqli_num_rows($emailResult) > 0) {
            $row = mysqli_fetch_assoc($emailResult);
            $_SESSION["email"] = $row['email'];
        } else {
            die ("Not GOOD");
        }
        
        $_SESSION["username"] = $username;

        header('Location: ../views/index.php?status=loggedIn');
        exit();
    }
}

