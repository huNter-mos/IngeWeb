<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = getCommentByTopic($_GET['api_params'][0]);
$response = $data;
echo json_encode($response);