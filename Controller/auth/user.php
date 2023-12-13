<?php
include '../../model/userModel.php';
session_start();

class controllerUser
 {

    public function registration($f_name,$l_name,$email,$password,$profile,$repeatPassword){

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

        // $this->validation($f_name,$l_name,$email,$password,$profile,$repeatPassword);

        if(empty($_SESSION['f_namError']) && empty($_SESSION['l_namError']) && empty($_SESSION['emailError']) && empty($_SESSION['passwordError']) && empty($_SESSION['confirm_password_Error'])){
            $m_user= new user($f_name,$l_name,$email,$password,$profile);
            $m_user->createUser();
            $this->redirect("../../View/admin/dashboard.php");
        }
            

    }

    // public function validation($f_name,$l_name,$email,$password,$profile,$repeatPassword){

    //     if(empty($f_name)){
    //         $_SESSION['f_namError']="first name required";
    //     }else{
    //         $_SESSION['f_namError']="";
    //     }

    //     if(empty($l_name)){
    //         $_SESSION['l_namError']="last name required";
    //     }else{
    //         $_SESSION['l_namError']="";
    //     }

    //     if(empty($email)) {
    //         $_SESSION['emailError'] = "email is required";
    //     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $_SESSION['emailError']="invalid email";
    //     }else{
    //         $_SESSION['emailError']="";
    //     }

    //     if(empty($password)) {
    //         $_SESSION['passwordError']= "password is required";
    //     } elseif (strlen($password) < 9) {
    //         $_SESSION['passwordError']= "at least 8 caract";
    //     }else{
    //         $_SESSION['passwordError']="";
    //     }

    //     if ($password != $repeatPassword) {
    //         $_SESSION['confirm_password_Error']= "password doesn't match";
    //     } else {
    //         $_SESSION['confirm_password_Error'] ="";
    //     }
    // }

    
    public function redirect($url) {
        header("Location: $url");
    }

    
}



?>