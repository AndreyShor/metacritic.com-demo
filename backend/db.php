<?php

require_once  __DIR__ . '/db_connect.php';



class MySql extends Db_connect{

    private $serverData;

    protected $Db;

    function  __construct(){
    }



    public function addElement($table, $parameters, $values){
        try{
            $this->Db = $this->OpenCon();
            if(is_array($parameters) && is_array($values)) {
                if(count($parameters) == count($values)){
                    $sql = "INSERT INTO " . $table . " ( " . $parameters[0];
                    for ($i = 1; $i < count($parameters); ++$i) {
                        $sql .= ", " . $parameters[$i];
                    }
                    $sql .= ") VALUES('" . $values[0] . "'";
                    for ($i = 1; $i < count($values); ++$i) {
                        $sql .= ", '" . $values[$i] . "'";
                    }
                    $sql .= ");";


                    if ($this->Db->query($sql) === TRUE) {
                        return true;
                    } else {
                        throw new Exception("Error in inserting process:" . $this->Db->error);
                    }

                } else {
                    throw new Exception("Number of parameters not equal to values");
                }
            } else {
                throw new Exception("You must enter array");
            }
        } catch(Exception $e){
            $this->jsonResponse($e);
        } finally{
            $this->Db->close();
        }

    }

    public function readElement($table, $parameter, $value){
        try{
            $this->Db = $this->OpenCon();
            $sql = "SELECT * FROM " . $table . " WHERE " . $parameter . "= '" . $value . "';";
            $data = $this->Db->query($sql);
            if ($data) {
                $allData = [];
                while($row = $data->fetch_assoc()){
                    array_push($allData, $row);
                }
                return $allData;
            } else {
                throw new Exception("Error in inserting process:" . $this->Db->error);
            }
        }
        catch(Exception $e){
            $this->jsonResponse($e);
        }
        finally{
            $this->Db->close();
        }
    }

    public function readElementForComment($table, $parameter, $value, $parameter2, $value2){
        try{
            $this->Db = $this->OpenCon();
            $sql = "SELECT * FROM $table WHERE $parameter='$value' and  $parameter2='$value2';";
            $data = $this->Db->query($sql);
            if ($data) {
                $allData = [];
                while($row = $data->fetch_assoc()){
                    array_push($allData, $row);
                }
                return $allData;
            } else {
                throw new Exception("Error in inserting process:" . $this->Db->error);
            }
        }
        catch(Exception $e){
            $this->jsonResponse($e);
        }
        finally{
            $this->Db->close();
        }
    }

    public function readTable($table){
        try{
            $this->Db = $this->OpenCon();
            $sql = "SELECT * FROM $table ;";
            $data = $this->Db->query($sql);
            if ($data) {
                // $this->jsonResponse("Data readed succesfully");
                $allData = [];
                while($row = $data->fetch_assoc()){
                    array_push($allData, $row);
                }
                return $allData;
            } else {
                throw new Exception("Error in fetching process:" . $this->Db->error . $data);
            }
        }
        catch(Exception $e){
            $this->jsonResponse($e);
        }
        finally{
            $this->Db->close();
        }
    }

    public function deleteElement($table, $parameter, $value){
        try{
            $this->Db = $this->OpenCon();
            $sql = "DELETE FROM $table WHERE $parameter='$value'; ";
            $data = $this->Db->query($sql);
            if ($data) {
                return true;
            } else {
                throw new Exception("Error in deleting process:" . $this->Db->error);
            }
        }
        catch(Exception $e){
            $this->jsonResponse($e);
        }
        finally{
            $this->Db->close();
        }
    }

    public function updateElement($table, $parameters, $values, $identifier, $ide_value){
        try{
            $this->Db = $this->OpenCon();
            if(is_array($parameters) && is_array($values)) {
                if(count($parameters) == count($values)){
                    $sql = " UPDATE $table " . " SET $parameters[0]='$values[0]'";
                    for ($i = 1; $i < count($parameters); ++$i) {
                        $sql .= ", " . "$parameters[$i] = '$values[$i]'";
                    }
                    $sql .= " WHERE $identifier='$ide_value' ";
                    $sql .= ";";

                    if ($this->Db->query($sql) === TRUE) {
                        return true;
                    } else {
                        throw new Exception("Error in inserting process:" . $this->Db->error);
                    }

                } else {
                    throw new Exception("Number of parameters not equal to values");
                }
            } else {
                throw new Exception("You must enter array");
            }
        } catch(Exception $e){
            $this->jsonResponse($e);
        } finally{
            $this->Db->close();
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



}


?>