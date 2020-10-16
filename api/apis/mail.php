<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = getUserByMail($_GET['email']);
$response = $data[0];
echo json_encode($response);