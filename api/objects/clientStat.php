<?php
class ClientStat
{

    // подключение к базе данных и таблице 'products'
    private $conn;
    private $tableName = "satistic";

    // свойства объекта
    public $uuid;
    public $cCode;
    public $initDate;
    public $actions;

    // конструктор для соединения с базой данных
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // метод read() - получение товаров
    public function read()
    {

        // выбираем все записи
        $query = "SELECT * FROM " . $this->tableName . " ORDER BY date ASC";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();

        return $stmt;
    }

    // метод create - создание товаров
    public function create()
    {

        // запрос для вставки (создания) записей
        $query = "REPLACE INTO
                " . $this->tableName . "
            SET
                cCode=:cCode, initDate=:initDate, actions=:actions";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->cCode = htmlspecialchars(strip_tags($this->cCode));
        $this->initDate = htmlspecialchars(strip_tags($this->initDate));

        // привязка значений
        $stmt->bindParam(":cCode", $this->cCode);
        $stmt->bindParam(":initDate", $this->initDate);
        $stmt->bindParam(":actions", $this->actions);

        //comment
        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // метод update() - обновление товара
    public function update()
    {

        // запрос для обновления записи (товара)
        $query = "UPDATE
                " . $this->tableName . "
            SET
                actions=:actions
            WHERE
                uuid =:uuid";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // привязываем значения
        $stmt->bindParam(':uuid', $this->uuid);
        $stmt->bindParam(':actions', $this->actions);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // метод delete - удаление товара
    public function delete()
    {

        // запрос для удаления записи (товара)
        $query = "DELETE FROM " . $this->tableName . " WHERE uuid = ?";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->uuid = htmlspecialchars(strip_tags($this->uuid));

        // привязываем uuid записи для удаления
        $stmt->bindParam(1, $this->uuid);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
