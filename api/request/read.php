<?php
//// необходимые HTTP-заголовки
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//
//// подключение базы данных и файл, содержащий объекты
//include_once '../config/database.php';
//include_once '../objects/clientRequest.php';
//
//// получаем соединение с базой данных
//$database = new Database();
//$db = $database->getConnection();
//
//// инициализируем объект
//$clientRequest = new ClientRequest($db);
//
//// запрашиваем товары
//$stmt = $clientRequest->read();
//$num = $stmt->rowCount();
//
//// проверка, найдено ли больше 0 записей
//if ($num > 0) {
//
//    // массив товаров
//    $clientRequests_arr = array();
//    $clientRequests_arr["records"] = array();
//
//    // получаем содержимое нашей таблицы
//    // fetch() быстрее, чем fetchAll()
//    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//
//        // извлекаем строку
//        extract($row);
//
//        $clientRequest_item = array(
//            "id" => $id,
//            "name" => $name,
//            "phone" => html_entity_decode($phone),
//            "mail" => $mail,
//            "price" => $price,
//            "date" => $date,
//            "summary" => $summary,
//            "status" => $status,
//            "comment"=> $comment
//        );
//
//        array_push($clientRequests_arr["records"], $clientRequest_item);
//    }
//
//    http_response_code(200);
//    echo json_encode($clientRequests_arr);
//} else {
//    http_response_code(200);
//    echo json_encode(array("message" => "Список заявок пуст"), JSON_UNESCAPED_UNICODE);
//}
