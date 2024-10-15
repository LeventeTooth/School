<?php
if (isset($_POST['submit']) == false) { /* meg lett-e nyomva a submit gomb */
    header('Location: ../views/registration.php');
    die('Don\'t cheat!');
}

require '../database/database.php';
echo 'atatok feltoltese megkezdodott';
$fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phoneNumer = mysqli_real_escape_string($connection, $_POST['phoneNumer']);
$zipcode = mysqli_real_escape_string($connection, $_POST['zipcode']);
$city = mysqli_real_escape_string($connection, $_POST['city']);
$street = mysqli_real_escape_string($connection, $_POST['street']);
$houseNumber = mysqli_real_escape_string($connection, $_POST['houseNumber']);
$Deliveryzipcode = mysqli_real_escape_string($connection, $_POST['Deliveryzipcode']);
$Deliverycity = mysqli_real_escape_string($connection, $_POST['Deliverycity']);
$Deliverystreet = mysqli_real_escape_string($connection, $_POST['Deliverystreet']);
$DeliveryhouseNumber = mysqli_real_escape_string($connection, $_POST['DeliveryhouseNumber']);
/* Ide meg jott volna a termekek es a vegosszeg, csak a kosar tartalmanak feltoltese nem jott ossze 1.5 or probalkozas utan, ugyhogy azt inkabb elengedtem */

if (preg_match('/[A-Za-z]/', $fullName) && preg_match('/[0-9]/', $phoneNumer) && 
filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/[0-9]/', $zipcode) && 
preg_match('/[0-9]/', $houseNumber) && preg_match('/[A-Za-z]/', $city) && 
preg_match('/[A-Za-z]/', $street)) {
    

    $sql_query = 'INSERT INTO `rendelesek`(`fullName`, `email`, `phoneNumber`, `zipcode`, `city`, `street`, `houseNumber`, `Deliveryzipcode`, `Deliverycity`, `Deliverystreet`, `DeliveryhouseNumber`) 
    VALUES ("' . $fullName . '", "' . $email . '", "' . $phoneNumer . '", "' . $zipcode . '", "' . $city . '", "' . $street . '", "' . $houseNumber . '", "' . $Deliveryzipcode . '", "' . $Deliverycity . '", "' . $Deliverystreet . '", "' . $DeliveryhouseNumber . '");';
    mysqli_query($connection, $sql_query);

    header("Location: ../views/index.php?sikeresMegrendeles");
} else {
    die('Valami adat nem jo');
}
