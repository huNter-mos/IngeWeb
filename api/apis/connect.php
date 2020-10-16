<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = connectForum($_GET['email'],$_GET['pwd']);
$response = $data[0];
$response['hash'] = md5($_GET['pwd']);
echo json_encode($response);