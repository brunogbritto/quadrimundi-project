<?php
class Hero {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar todos os heróis
    public function getHeroes() {
        $query = "SELECT * FROM heroes";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }

    // Método para buscar um herói específico pelo ID
    public function getHeroById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM heroes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Método para buscar heroi pelo codAutor
    public function getHeroesByCodAutor($codAutor) {
        $stmt = $this->conn->prepare("SELECT * FROM heroes WHERE codAutor = ?");
        $stmt->execute([$codAutor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para adicionar um novo herói
    public function addHero($name, $power, $codAutor) {
        $query = "INSERT INTO heroes (name, power, codAutor) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $power, $codAutor]);
        return $stmt;
    }

    // Método para atualizar um herói
    public function updateHero($id, $name, $power) {
        $query = "UPDATE heroes SET name = ?, power = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $power, $id]);
         
    }

    // Método para excluir um herói
    public function deleteHero($id) {
        $stmt = $this->conn->prepare("DELETE FROM heroes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt;
    }
}
?>
