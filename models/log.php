<?php 
    session_start();
    if(isset($_POST['prijaviSe']))
    { 
        $email =$_POST['email'];
        $lozinka = $_POST['password'];
        $greske=[];

        $regLozinka="/^[\w]{5,}$/";

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            array_push($greske,"Niste dobro uneli email!");
        }

        if(!preg_match($regLozinka,$lozinka))
        {
            array_push($greske,"Niste dobro uneli lozinku");

        }

        if(count($greske)>0)
        {   $_SESSION['greskeLogovanje']=$greske;
            header("Location: ../index.php?page=logovanje");
        }else
        {
            require_once "../config/connection.php";
            require_once "functions.php";
            $user= logovanje_korisnika($email,$lozinka);
             if($user){
                $_SESSION['korisnik'] =$user;
                header("Location: ../index.php");
            }
            else{
                $_SESSION['greskeUser'] = "Ne postoji korisnik sa tim parametrima za logovanje.";
                header("Location: ../index.php?page=logovanje");
            }
            

        }
    }
  