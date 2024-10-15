<?php 

session_start(); /* Indít */
session_unset(); /* Variable-k törlése */
session_destroy(); /* Session törlése */

header("Location: ../views/index.php?sikeresKijelentkezes"); /* Visszairányít */