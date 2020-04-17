<?php 

// require_once './../db.php';
require_once __DIR__ . '/../db.php';

class Article extends MySql{

    private $serverData;
    private $tableName = "article";

    function  __construct(){
    }


    public function getArticles(){
        return $DATA = $this->readTable($this->tableName);

    }

    public function getArticle($id){
        return $DATA = $this->readElement($this->tableName, "id", $id);
    }

    public function filterArticle($genre){
        return $DATA = $this->readElement($this->tableName, "genre", $genre);
        echo print_r($DATA);
    }

    public function addArticle(){
        $this->imageUpload();
        $data = $this->parsePost();

        $parameters = ["title", "descArt", "imageUrl", "genre"];
        $values = [$data["artName"], $data["artDesc"], $_SESSION["target_file"], $data["genre"]];

        $this->addElement($this->tableName, $parameters, $values); // Class MySql
        
    }


    public function deleteArticle(){
        $clientData = $this->parseGet();
        $result = $this->deleteElement($this->tableName, "id", $clientData['id']);
        if($result == true){
            header("Location: http://localhost/public/view/admin.php");
        } else {
            echo $result;
        }
    }

    public function editArticle(){

        $this->imageUpload();

        $clientData = $this->parsePost();


        $parameters = ["title", "descArt", "imageUrl"];
        $values = [$clientData["artName"], $clientData["artDesc"], $_SESSION["target_file"]];
        $result = $this->updateElement($this->tableName, $parameters, $values, 'id', $clientData["id"]);
        echo print_r( "Result " .$result);
        if($result == true){
            header("Location: http://localhost/public/view/admin.php");
        } else {
            echo $result;
        }
    }


    private function imageUpload(){
        try{
            $target_dir = "C:/Apache24/htdocs/www/public/img/article";
            $target_file = $target_dir . "/" . basename($_FILES["img"]["name"]);
            $pathFetch = "/public/img/article/" . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                throw new Exception("File is not an image.");
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
                throw new Exception("Sorry, file already exists.");
            }
            // Check file size
            if ($_FILES["img"]["size"] > 5000000) {
                $uploadOk = 0;
                throw new Exception("Sorry, your file is too large.");
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $uploadOk = 0;
                throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                throw new Exception("Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    $_SESSION["target_file"] = $pathFetch;
                    echo "OK";
                } else {
                    throw new Exception("Sorry, there was an error uploading your file.");
                }
            }
        } catch(Exception $e) {
            echo $e;
        }
    }


    private function jsonResponse($data) {
        if (is_array($data)){
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $data = ["text" => $data];
            $this->jsonResponse($data);
        }
    }

    private function parsePost() {
		return $clientData =  $_POST;
    }

    private function parseGet() {
		return $clientData =  $_GET;
    }






}

?>