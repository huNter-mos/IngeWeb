<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = newTopic($_GET['titre'],$_GET['content'],$_GET['date'],$_GET['user']);
$response = $data[0];
echo json_encode($response);