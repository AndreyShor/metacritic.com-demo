<?php 

require_once __DIR__ . '/../db_connect.php';

class Auth extends Db_connect{

    protected $Db;
    private $serverData;
    private $tableName = "users";
    private $salt = "_J9..rasmJSNFJ2342KSNDKC^%%^DV$%#$";


    function  __construct(){
        $this->Db = $this->OpenCon();
    }


    public function Login(){
        $clientData = $this->parsePost();
        $clientData["userPass"] = $this->cryptoData($clientData["userPass"]);

        // $serverData;
        $this->selectUser($this->tableName, $clientData['userName']);
        
        if($clientData['userPass'] == $this->serverData['userPass']){
            session_start();
            if(!isset($_SESSION["Login"])){
                $_SESSION["Login"] = true;
                $_SESSION["user"] = $this->serverData['userName'];
            }
            $this->jsonResponse("Login");
        } else {
            $this->jsonResponse("Incorrect Password");
        }
    }

    public function Register(){
        $clientData = $this->parsePost();
        $clientData["userPass"] = $this->cryptoData($clientData["userPass"]);

        $this->insertUser($this->tableName, $clientData["userName"], $clientData["userPass"] , $clientData["userEmail"], 0);

    }

    public function userIsAdmin($userName){
        $this->selectUser($this->tableName, $userName);
        if($this->serverData['is_admin'] == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }


    private function cryptoData($data) {
		return $data = crypt($data, $this->salt);
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
    
    private function insertUser($table, $userName, $userPass, $userEmail, $is_admin){
        try{
            $checkTable = $this->Db->query("SHOW TABLES LIKE '". $table ."'");
            if($checkTable->num_rows == 1){
                $сheckUserName = $this->Db->query("SELECT userName FROM " . $table . " WHERE userName= '" . $userName ."';");
                $сheckUserEmail = $this->Db->query("SELECT userEmail FROM " . $table . " WHERE userEmail= '" . $userEmail ."';");

                if (($сheckUserName->num_rows == 0) && ($сheckUserEmail->num_rows == 0)) {
                    $sql = "INSERT INTO " . $table . " (userName, userPass, userEmail, is_admin)" . " VALUES('" . $userName . "' , '" . $userPass . "' , '" . $userEmail . "' , '" . $is_admin ."');";
                    if ($this->Db->query($sql) === TRUE) {
                        $this->jsonResponse("User data inserted successfully");
                    } else {
                        throw new Exception("Error in inserting process:" . $this->Db->error);
                    }
                } else {
                    if(!($сheckUserName->num_rows == 0)){
                        throw new Exception("User with such user name exist. Choice another username");
                    }
                    if(!($сheckUserEmail->num_rows == 0)){
                        throw new Exception("User with such email exist. Choice another email");
                    }
                }


            } else {
                throw new Exception("Table not exist");
            }

        } catch (Exception $e){
            $this->jsonResponse($e);
        } finally{
            $this->Db->close();
        }
    }

    private function selectUser($table, $userName){
        try{
            $checkTable = $this->Db->query("SHOW TABLES LIKE '". $table ."'");
            if($checkTable->num_rows == 1){
                $user = $this->Db->query("SELECT userName, userPass, is_admin FROM " . $table . " WHERE userName= '" . $userName ."';");
                if($user->num_rows == 1) {
                    $this->serverData = $user->fetch_assoc();
                } else {
                    throw new Exception("There is no such user");
                }
            } else {
                throw new Exception("Table not exist");
            }

        } catch (Exception $e) {
            $this->jsonResponse($e);
        } finally{
            $this->Db->close();
        }
    }





}


?>