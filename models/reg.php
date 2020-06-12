<?php
    session_start();
    include "../config/connection.php";
    include "functions.php";
    if (isset($_POST['submitAccount'])) {
//   echo "CAAAa";
        $ime = $_POST['tbName'];
        $prezime = $_POST['tbLast'];
        $email = $_POST['tbEmail'];
        $lozinka = $_POST['tbPassword'];
        
        $errors = [];
    
        $reImePrezime = "/^[A-Z][a-z]{2,15}$/";
        $reLozinka = "/^[\w]{5,}$/";
    
    
        if (!preg_match($reImePrezime, $ime)) {
            $errors[] = "Ime je pogrešno.";
        }
        if (!preg_match($reImePrezime, $prezime)) {
            $errors[] = "Prezime je pogrešno.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email je pogrešan.";
        }
        if (!preg_match($reLozinka, $lozinka)) {
            $errors[] = "Lozinka je pogrešna.";
        }
        
    
    
        if (count($errors) !=0 ) {
            $_SESSION['greskeRegistracija']=$errors;
           header("Location: ../index.php?page=registracija");
        // var_dump($_SESSION['greskeRegistracija']);
        } 
        else 
        {
            $rez = registracija_korisnika($ime,$prezime,$email,$lozinka);
           if($rez){
               header("Location: ../index.php?page=logovanje");
            // var_dump($rez);
           }
        }

    }
?>