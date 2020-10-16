<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = newComment($_GET['message'],$_GET['date'],$_GET['topicID'],$_GET['userId']);
$response = $data;
echo json_encode($response);
//http://bean.example.com/api/index.php?url=newComment&message=Jure ca marche&date=2020-07-09&topicID=3&userId=1