<?php
header('Content-Type: application/json');
include 'api.php';
$data = getCommentById($_GET['api_params'][0]);
$response = $data;
echo json_encode($response);