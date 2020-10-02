<?php
header('Content-Type: application/json');
include 'api.php';
$data = getAllTopics();
$response = $data;
echo json_encode($response);
//http://bean.example.com/IngeWeb/api/index.php?url=topics cette adresse