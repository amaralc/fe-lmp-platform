<?php
// i will keep yelling this
// DON'T FORGET TO START THE SESSION !!!
session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['estah_logado'])) {
    unset($_SESSION['estah_logado']);
}

// now that the user is logged out,
// go to login page
header('Location: login.php');
?> 