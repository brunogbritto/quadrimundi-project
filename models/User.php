<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário
    public function createBasic($userData) {
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        $stmt->bindParam(1, $userData['username']);
        $stmt->bindParam(2, $userData['password']);
        $stmt->bindParam(3, $userData['email']);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    // Método para atualizar um usuário com informações completas
    public function updateUser($userData) {
        $query = "UPDATE users SET fullname = ?, artisticname = ?, birthdate = ?, city = ?, state = ?, phone1 = ?, phone2 = ?, instagram = ?, facebook = ?, tiktok = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $userData['fullname']);
        $stmt->bindParam(2, $userData['artisticname']);
        $stmt->bindParam(3, $userData['birthdate']);
        $stmt->bindParam(4, $userData['city']);
        $stmt->bindParam(5, $userData['state']);
        $stmt->bindParam(6, $userData['phone1']);
        $stmt->bindParam(7, $userData['phone2']);
        $stmt->bindParam(8, $userData['instagram']);
        $stmt->bindParam(9, $userData['facebook']);
        $stmt->bindParam(10, $userData['tiktok']);
        $stmt->bindParam(11, $userData['user_id']);

        return $stmt->execute();
    }


    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }// Outros métodos necessários para a classe User
    // ...
}
?>
