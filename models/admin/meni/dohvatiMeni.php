<?php
session_start();
    header('Content-Type: application/json');

    if(isset($_POST['id'])){
       
        $id = $_POST['id'];
    
        try {
            require_once "../../../config/connection.php";
            require_once "../../functions.php";            
            $meni = dohvati_jedan_zapis("meni","idMeni",$id);
            http_response_code(200); 
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