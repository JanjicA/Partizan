<?php
session_start();
    header('Content-Type: application/json');

    if(isset($_POST['naziv'])){
       
        $naziv = $_POST['naziv'];
    
        try {
            require_once "../../../config/connection.php";
            require_once "../../functions.php";
            $insertMeni= insert_meni($naziv);   
                     
            $meni = dohvati_sve("meni");
            http_response_code(201); 
            echo json_encode($meni);
        }
        catch(PDOException $ex){
            echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
            http_response_code(500);
        }
    } else {
        http_response_code(400);
    }
?> 