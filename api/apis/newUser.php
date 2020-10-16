<?php
header('Content-Type: application/json');
require_once 'api.php';
$password = $_GET['password'];
$data = newUser($_GET['nickname'],$_GET['nom'],$_GET['prenom'],$_GET['email'],$password,$_GET['date_inscription']);
$response = $data;
echo json_encode($response);
//http://bean.example.com/api/index.php?url=newUser&nickname=Lobies&nom=asseel&prenom=ASSEEL&email=a@menjsl.com&password=azeaze&date_inscription=2020-07-01