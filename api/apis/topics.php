<?php
header('Content-Type: application/json');
include 'api.php';
$data = getTopics();
$response = $data;
echo json_encode($response);