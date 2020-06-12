<?php

header("Content-Type: application/json");

if(isset($_POST['id'])){
    require_once "../../config/connection.php";
    include "../functions.php";

    $id = $_POST['id'];
    if($id=="0"){
        $postovi = dohvatiPostove();
    }
    elseif($id == "datumNajnovije"){
        $postovi = sortPostova($id);
    }
    else{
        $postovi = kategorijePostova($id);
    }
    

    echo json_encode($postovi);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400);
}