<?php

class ClientRequest {

    // подключение к базе данных и таблице 'products'
    private $conn;
    private $table_name = 'requests';

    // свойства объекта
    public $id;
    public $name;
    public $phone;
    public $comment;

    public function __construct( $db ) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table_name . ' ORDER BY date ASC';
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

    function create() {
        $query = 'INSERT INTO ' . $this->table_name . ' SET name=:name, phone=:phone, comment=:comment';

        $stmt = $this->conn->prepare( $query );

        $stmt->bindParam( ':name', $this->name );
        $stmt->bindParam( ':phone', $this->phone );
        $stmt->bindParam( ':comment', $this->comment );

        return ( bool )$stmt->execute();
    }

}
