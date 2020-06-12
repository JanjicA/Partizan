<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../../../config/connection.php";
    include "../../functions.php";

    $limit = $_GET['limit'];
    $vesti = dohvati_vestiSlike($limit);
    $num_of_news = get_pagination_count();

    echo json_encode([
        "vesti" => $vesti,
        "num_of_news" => $num_of_news
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400);
}