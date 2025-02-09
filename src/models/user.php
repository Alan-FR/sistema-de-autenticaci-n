<?php

# modelo para crear un usuario

Class User {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function createUser ($name, $email, $password) {
        $sql = "INSERT INTO tbl_users (name,email,password) 
        VALUES (:name,:email,:password)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));

        return $stmt->execute();
    }

    public function findByEmail ($email) {
        $sql = "SELECT * FROM tbl_users WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}