<?php 

require_once './../controller/users.php';

$option = $_POST['option'];


if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == "add_comment")) {
    session_start(); 
    $user = new Users();
    $user->addComment($_SESSION["user"]);
}




?>