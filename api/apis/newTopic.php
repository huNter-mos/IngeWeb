<?php
header('Content-Type: application/json');
require_once 'api.php';
$data = newTopic($_GET['titre'],$_GET['content'],$_GET['date'],$_GET['categorie'],$_GET['userId']);
//http://bean.example.com/api/index.php?url=newTopic&titre=%20topic&content=test%20stp%20marche%20frero&date=2020-07-20&categorie=1&userId=1
$response = $data;
echo json_encode($response);