<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário
    public function create($userData) {
        // Preparação da consulta SQL para inserir os dados do usuário
        $query = "INSERT INTO users (codAutor, username, password, email, fullname, artisticname, birthdate, city, state, phone1, phone2, instagram, facebook, tiktok) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        // Sanitização dos dados
        $userData = array_map('htmlspecialchars', array_map('strip_tags', $userData));

        // Hash da senha para armazenamento seguro
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        // Vinculação dos dados aos parâmetros da consulta
        $stmt->bindParam(1, $userData['codAutor']);
        $stmt->bindParam(2, $userData['username']);
        $stmt->bindParam(3, $userData['password']);
        $stmt->bindParam(4, $userData['email']);
        $stmt->bindParam(5, $userData['fullname']);
        $stmt->bindParam(6, $userData['artisticname']);
        $stmt->bindParam(7, $userData['birthdate']);
        $stmt->bindParam(8, $userData['city']);
        $stmt->bindParam(9, $userData['state']);
        $stmt->bindParam(10, $userData['phone1']);
        $stmt->bindParam(11, $userData['phone2']);
        $stmt->bindParam(12, $userData['instagram']);
        $stmt->bindParam(13, $userData['facebook']);
        $stmt->bindParam(14, $userData['tiktok']);

        // Execução da consulta
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }// Outros métodos necessários para a classe User
    // ...
}
?>
