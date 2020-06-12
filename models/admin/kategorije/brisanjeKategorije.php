<?php
session_start();
    header('Content-Type: application/json');

    if(isset($_POST['id'])){
       
        $id = $_POST['id'];
    
        try {
            require_once "../../../config/connection.php";
            require_once "../../functions.php";
            $brisanjeKat= brisanje_jednog_zapisa("kategorije","idKategorije",$id);            
            $kategorije = dohvati_sve("kategorije");
            http_response_code(200); 
            echo json_encode($kategorije);
        }
        catch(PDOException $ex){
            echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
            http_response_code(500);
        }
    } else {
        http_response_code(400);
    }
?>