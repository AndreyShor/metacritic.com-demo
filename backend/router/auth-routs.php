<?php

require_once './../controller/auth.php';
$option = "";
$option = $_POST['optionOfAction'];


if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == "Login")) {
    $user = new Auth();
    $user->Login();
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == "Register")) {
    $user = new Auth();
    $user->Register();
}

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    session_start();
    session_unset();
    session_destroy();
    echo "destroy";
}



?>