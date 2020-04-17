<?php

require_once './../db_connect.php';
require_once './../controller/article.php';
require_once './../controller/users.php';
$option = $_POST['option'];

echo print_r( $_POST);

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == 'addArt')) {
    $admin = new Article();
    $admin->addArticle();
    
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == "editArt")) {
    $admin = new Article();
    $admin->editArticle();
    
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($option == "editUser")) {
    $admin = new Users();
    $admin->editUser();
    
}

$option = $_GET['option'];

if (($_SERVER["REQUEST_METHOD"] == "GET") && ($option == "article")) {
    $admin = new Article();
    $admin->deleteArticle();
    
}

if (($_SERVER["REQUEST_METHOD"] == "GET") && ($option == "deleteUser")) {
    $admin = new Users();
    $admin->deleteUser();
    
}

?>