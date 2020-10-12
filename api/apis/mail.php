<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = getUserByMail($_GET['email']);
$response = $data;
echo json_encode($response);