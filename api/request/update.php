<?php
//// необходимые HTTP-заголовки
//header("Access-Control-Allow-Origin: *");
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
//$clientRequest->status = $data->status;
//$clientRequest->id = $data->id;
//
//// обновление товара
//if ($clientRequest->update()) {
//
//    // установим код ответа - 200 ok
//    http_response_code(200);
//
//    // сообщим пользователю
//    echo json_encode(array("message" => "Товар был обновлён."), JSON_UNESCAPED_UNICODE);
//}
//
//// если не удается обновить товар, сообщим пользователю
//else {
//
//    // код ответа - 503 Сервис не доступен
//    http_response_code(503);
//
//    // сообщение пользователю
//    echo json_encode(array("message" => "Невозможно обновить товар."), JSON_UNESCAPED_UNICODE);
//}
