<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = getAllTopics();
$response = $data;
echo json_encode($response);
//http://bean.example.com/IngeWeb/api/index.php?url=topics cette adresse