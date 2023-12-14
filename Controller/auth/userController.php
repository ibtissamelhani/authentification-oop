<?php
include __DIR__ . '/../../model/userModel.php';
session_start();

class controllerUser
 {

    public function registration($f_name,$l_name,$email,$password,$profile,$repeatPassword){

        $this->validation($f_name,$l_name,$email,$password,$profile,$repeatPassword);

        if(empty($_SESSION['f_namError']) && empty($_SESSION['l_namError']) && empty($_SESSION['emailError']) && empty($_SESSION['passwordError']) && empty($_SESSION['confirm_password_Error'])){
            $password = password_hash($password,PASSWORD_BCRYPT);
            $m_user= new user($f_name,$l_name,$email,$password,$profile);
            $m_user->createUser();
            $this->redirect("../../index.php");
        }
            

    }

    public function validation($f_name,$l_name,$email,$password,$profile,$repeatPassword){

        if(empty($f_name)){
            $_SESSION['f_namError']="first name required";
        }else{
            $_SESSION['f_namError']="";
        }

        if(empty($l_name)){
            $_SESSION['l_namError']="last name required";
        }else{
            $_SESSION['l_namError']="";
        }

        if(empty($email)) {
            $_SESSION['emailError'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailError']="invalid email";
        }else{
            $_SESSION['emailError']="";
        }

        if(empty($password)) {
            $_SESSION['passwordError']= "password is required";
        } elseif (strlen($password) < 9) {
            $_SESSION['passwordError']= "at least 8 caract";
        }else{
            $_SESSION['passwordError']="";
        }

        if ($password != $repeatPassword) {
            $_SESSION['confirm_password_Error']= "password doesn't match";
        } else {
            $_SESSION['confirm_password_Error'] ="";
        }
    }

    
    public function redirect($url) {
        header("Location: $url");
    }

    public function logout() {
        session_unset();
        $this->redirect("../../View/auth/login.php");
        exit();
    }



    public function login($email,$password){

        if(empty($email)) {
            $_SESSION['emailErr'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr']="invalid email";
        }else{
            $_SESSION['emailErr']="";
        }

        if(empty($password)) {
            $_SESSION['passwordErr']= "password is required";
        }  elseif (strlen($password) < 9) {
             $_SESSION['passwordError']= "at least 8 caract";
         }else{
            $_SESSION['passwordErr']="";
        }


        if(empty($_SESSION['passwordErr']) && empty($_SESSION['emailErr'])){

        $m_user= new user(null,null,$email,$password,null);
        $row = $m_user->getUserByEmail();
        if($row){
            if(password_verify($password, $row['password'])){
                $_SESSION['userId'] = $row['id'];
                $_SESSION['isAdmin'] = $row['isAdmin'];
                $_SESSION['loggedIn'] = true;

                if($row['isAdmin']){
                    $this->redirect("../../View/admin/dashboard.php");    
                }else{
                $this->redirect("../../index.php"); 
                }
            }
            
        }else{
            echo "<script>alert(\"this email doesn't existe!!!!! \")</script>";
        }
       
        }


    }


}



?>