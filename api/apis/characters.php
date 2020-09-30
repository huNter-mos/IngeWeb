
<?php
header('Content-Type: application/json');
include 'Characters.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    create();
    if(!empty($_GET["sort"])){
        $data = getCharactersOrdered($_GET["sort"]);
    }else{
        $data=getCharactersBase();
    }
    $response = $data;
    echo json_encode($response);
}else{
    http_response_code(401);
    header('Content-Type: application/json');
    $response = [
        "error" => "Unauthorized"
    ];
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}