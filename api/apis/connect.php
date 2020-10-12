<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = connectForum($_GET['email'],$_GET['pwd']);
$response = $data;
echo json_encode($response);