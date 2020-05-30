<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");
header('Content-type: application/json');

require("../db/db.php");

function input($dataa) {
    $dataa = stripslashes($dataa);
    $dataa = htmlspecialchars($dataa);
    $dataa = strip_tags($dataa);
    $dataa = trim($dataa);
    return $dataa;
}

$data = json_decode(file_get_contents('php://input'), true);

$jsonResponse['status'] = "failure";

$name = input($data['name']);
$email = input($data['email']);
$tel = input($data['tel']);
$text = input($data['text']);

if (trim($email) != '' && trim($name) != '' && trim($email) != '' && 
        trim($tel) != '' && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[0-9]+$/u", $tel)) {
    $ok = R::exec("INSERT INTO orderss (name, email, tel, text) VALUES (?,?,?,?);", [$name, $email, $tel, $text]);
    if ($ok) {
        $ok = mail($email, "smart bb", "Ваша заявка принята, скоро с Вами свяжутся сотрудники компании", "From: smart@epolice.kz");
        if ($ok) {
            $jsonResponse['status'] = "success";
        } else {
            $jsonResponse['status'] = "failure";
        }
    } else {
        $jsonResponse['status'] = "failure";
    }
}
echo json_encode($jsonResponse, JSON_UNESCAPED_UNICODE);
