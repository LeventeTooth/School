<?php

if (isset($_POST['submit']) == false) { /* meg lett-e nyomva a submit gomb */
    header('Location: ../views/registration.php');
    die('Don\'t cheat!');
}

require '../database/database.php';

/* Regisztráció elkezdődik, ELLENŐRZÉS */
echo 'Login start<br>';

/* Speciális karakterek skippelése (injection elleni védekezés alapja) */
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$passwordConfirm = mysqli_real_escape_string($connection, $_POST['passwordConfirm']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$fullName = mysqli_real_escape_string($connection, $_POST['fullName']);

/* Kaptam-e értéket */
if (empty($username) || empty($password) || empty($passwordConfirm) || empty($email) || empty($fullName)) {
    die("Kérlek tölts ki minden mezőt a regisztráció előtt.");
} else {
    /* Ha minden értéket megkaptam, megyek tovább. */
    echo 'Data collected<br>';

    /* Jelszó ellenőrzés */
    if (strlen($password) < 8) {
        die("Adj meg legalább nyolc karaktert");
    } else if (!preg_match('/[A-Z]/', $password)) {
        die("Adj meg legalább egy nagy betűt.");
    } else if (!preg_match('/[a-z]/', $password)) {
        die("Adj meg legalább egy kis betűt.");
    } else if (!preg_match('/[0-9]/', $password)) {
        die("Adj meg legalább egy számot.");
    } else if (!preg_match('/[*!#&@]/', $password)) {
        die("Adj meg legalább egy speciális karaktert.");
    } else if ($password != $passwordConfirm) {
        die("A jelszó megerősítés nem sikerült.");
    } else {
        /* Hasheljük a jelszót a védelemhez és megyünk az ebédszünet után tovább. */
        echo 'Password Confirmed<br>';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo 'PW hashed<br>';

        /* Email ellenőrzése */
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            die("Nem megfelelő e-mail formátum");
        } else {

            /* Van-e ilyen felhasználó */
            $user_query = 'SELECT * FROM users WHERE username = "' . $username . '";';
            $result = mysqli_query($connection, $user_query);

            if (mysqli_num_rows($result) != 0) {
                header('Location: ../views/registration.php?status=registrationError&error=userExist&username='.$username);
                die('Van ilyen felhasználónév, válassz másikat.');
            } else {
                /* Adatbázisba feltölt */
                $sql_query = 'INSERT INTO `users`(`username`, `password`, `email`, `fullName`) 
                VALUES ("' . $username . '", "' . $hashedPassword . '", "' . $email . '", "' . $fullName .'");';
                echo $sql_query;
                mysqli_query($connection, $sql_query);
                echo 'Registration complete';

                /* Visszairányítom a főoldalra. */
                header('Location: ../views/index.php?status=registrationSuccess');
            }
        }
    }
}


