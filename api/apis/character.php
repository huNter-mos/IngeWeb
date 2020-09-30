<?php
header('Content-Type: application/json');
include 'Characters.php';
$data = getCharacterById($_GET['api_params'][0]);
$response = $data;
echo json_encode($response);