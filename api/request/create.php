<?php
//// необходимые HTTP-заголовки
//header("Access-Control-Allow-Origin: https://nkavd.com");
//header("Access-Control-Allow-Origin: http://localhost:8000");
//
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST");
//header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//
//include_once '../config/database.php';
//include_once '../objects/clientRequest.php';
//
//$database = new Database();
//$db = $database->getConnection();
//
//$clientRequest = new ClientRequest($db);
//$data = json_decode(file_get_contents("php://input"));
//
//$clientRequest->name = $data->name;
//$clientRequest->mail = $data->mail;
//$clientRequest->phone = $data->phone;
//$clientRequest->price = $data->price;
//$clientRequest->status = $data->status;
//$clientRequest->summary = $data->summary;
//$clientRequest->comment = $data->comment;
//
//if (true) {
//
//    if ($clientRequest->create()) {
//        http_response_code(200);
//        echo json_encode(array("message" => "Товар был создан."), JSON_UNESCAPED_UNICODE);
//    } else {
//        http_response_code(503);
//        echo json_encode(array("message" => "Невозможно создать товар."), JSON_UNESCAPED_UNICODE);
//    }
//} else {
//
//    http_response_code(400);
//    echo json_encode(array("message" => "Невозможно создать товар. Данные неполные. "), JSON_UNESCAPED_UNICODE);
//}
