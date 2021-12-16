<?php

class ClientRequest
{

    // подключение к базе данных и таблице 'products'
    private $conn;
    private $table_name = "requests";

    // свойства объекта
    public $id;
    public $name;
    public $phone;
    public $comment;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY date ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, phone=:phone, comment=:comment";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":comment", $this->comment);

        return (bool)$stmt->execute();
    }

//    // метод update() - обновление товара
//    function update()
//    {
//        $query = "UPDATE
//                " . $this->table_name . "
//            SET
//                status =:status
//            WHERE
//                id =:id";
//
//        // подготовка запроса
//        $stmt = $this->conn->prepare($query);
//
//        // привязываем значения
//        $stmt->bindParam(':id', $this->id);
//        $stmt->bindParam(':status', $this->status);
//
//        // выполняем запрос
//        if ($stmt->execute()) {
//            return true;
//        }
//
//        return false;
//    }

    // метод delete - удаление товара 
//    function delete()
//    {
//
//        // запрос для удаления записи (товара)
//        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
//
//        // подготовка запроса
//        $stmt = $this->conn->prepare($query);
//
//        // очистка
//        $this->id = htmlspecialchars(strip_tags($this->id));
//
//        // привязываем id записи для удаления
//        $stmt->bindParam(1, $this->id);
//
//        // выполняем запрос
//        if ($stmt->execute()) {
//            return true;
//        }
//
//        return false;
//    }
}
