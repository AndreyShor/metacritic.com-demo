<?php 

require_once __DIR__ . '/../db.php';

class Users extends MySql{

    private $serverData;
    private $tableName = "users";
    private $commentTable = "reviews";
    private $salt = "_J9..rasmJSNFJ2342KSNDKC^%%^DV$%#$";
    private $conn;

    function  __construct(){

    }


    public function getUsers(){
        return $DATA = $this->readTable($this->tableName);

    }

    public function getUser($id){
        return $DATA = $this->readElement($this->tableName, 'id', $id);

    }

    public function deleteUser(){
        $clientData = $this->parseGet();
        $result = $this->deleteElement($this->tableName, "id", $clientData['id']);
        if($result == true){
            header("Location: http://localhost/public/view/admin.php");
        } else {
            echo $result;
        }
    }

    public function editUser(){

        $clientData = $this->parsePost();

        $parameters = ["userEmail", "userPass"];
        $clientData["userPass"] = $this->cryptoData($clientData["userPass"]);

        $values = [$clientData["userEmail"], $clientData["userPass"]];

        $result = $this->updateElement($this->tableName, $parameters, $values, 'id', $clientData["id"]);
        if($result == true){
            echo "ok, edited";
        } else {
            echo $result;
        }
    }


    public function addComment($userName){
        // Take data from html form 
        $clientData = $this->parsePost();

        // By using usernae of the user find his id
        // Take data from html form 
        $clientData = $this->parsePost();

        // By using usernae of the user find his id
        $userData = $this->readElement($this->tableName, "userName", $userName);
        $userId = $userData[0]["id"];
        $userId = $userData[0]["id"];

        // find comment of user if exist 
        $check = $this->readElementForComment($this->commentTable, "user_id", $userId, "game_id", $clientData["aricle_id"]);

        // check if it is in this article 
        if(isset(($check[0]["user_id"])) &&	($check[0]["game_id"] == $clientData["aricle_id"])){
            echo "You already have review";
        } else {
            // if no add comment
            $parameters = ["user_id", "game_id", "rating", "review"];
            $values = [$userId, $clientData["aricle_id"], $clientData["comment_rating"], $clientData["comment_text"]];
            
            $result = $this->addElement($this->commentTable, $parameters, $values); // Class MySql ;
            if($result == true){
                echo "Your Comment upload";
            } else {
                echo $result;
            }
        }


    }
    
    public function fetchComments($articleid){
        $this->conn = $this->OpenCon();
        $sql = "SELECT userName, review, rating FROM reviews, users WHERE game_id='$articleid' and users.id = reviews.user_id;";
        $data = $this->conn->query($sql);
        if ($data) {
            $allData = [];
            while($row = $data->fetch_assoc()){
                array_push($allData, $row);
            }
            return $allData;
        } else {
            echo "Error";
        }
    }



    private function parsePost() {
		return $clientData =  $_POST;
    }

    private function parseGet() {
		return $clientData =  $_GET;
    }

    private function cryptoData($data) {
		return $data = crypt($data, $this->salt);
    }


}


?>