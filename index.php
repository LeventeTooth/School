<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Valtozo */
    $nev = 'aaaa';
    echo '<h1 name="cim">Basic tutorial</h1>';
    /* strlen() strin hossz */
    echo strlen( $nev );
    echo '<br>';
    /* pow() negyzset */
    echo 'Ketto a 3.on ' . pow( 2, 3);
    /* array-ba, dictionary-ba akarmi is */
    $arrayName = array(2,'aaaaa',array(3,'aaa'));
    $dictionary = array('Bela' => 43);
    
    $szamok = array(2,4,7,ö);
    foreach ($variable as  $value) {
        echo $value;
    }
    foreach ($szamok as $key => $value) {
        echo 'kulcs'. $key .'szam'. $value .'' . '<br>';
    }
    ?>
</body>
</html>