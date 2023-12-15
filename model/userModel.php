<?php
include_once __DIR__ ."/../dataBase/connection.php";

class user {
    
    private $f_name;
    private $l_name;
    private $email;
    private $password;
    private $profile;
    private $connection;
    
    public function __construct($f_name,$l_name,$email,$password,$profile){
        $this->connection = dataBaseConnection::connect();
        $this->f_name= $f_name;
        $this->l_name= $l_name;
        $this->email= $email;
        $this->password= $password;
        $this->profile= $profile;
    }

    function createUser(){
        $sql = "INSERT INTO users (first_name,last_name,email,password,profile) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($this->connection,$sql);
        mysqli_stmt_bind_param($stmt,'sssss',$this->f_name,$this->l_name,$this->email,$this->password,$this->profile);
        $result = mysqli_stmt_execute($stmt);
    }
    
    public function getUserByEmail(){
        $sql = "SELECT * from users where email=?";
        $stmt = mysqli_prepare($this->connection,$sql);
        mysqli_stmt_bind_param($stmt,'s',$this->email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


    public function getFName() {
        return $this->f_name;
    }

    public function getLName() {
        return $this->l_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getProfile() {
        return $this->profile;
    }

    // Setters
    public function setFName($f_name) {
        $this->f_name = $f_name;
    }

    public function setLName($l_name) {
        $this->l_name = $l_name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setProfile($profile) {
        $this->profile = $profile;
    }

}



?>