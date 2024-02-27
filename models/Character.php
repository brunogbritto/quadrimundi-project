<?php
class Character {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar todos os heróis
    public function getCharacters() {
        $query = "SELECT * FROM characters";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }

    // Método para buscar um herói específico pelo ID
    public function getCharacterById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Método para buscar heroi pelo codAutor
    public function getCharactersByCodAutor($codAutor) {
        $stmt = $this->conn->prepare("SELECT * FROM characters WHERE codAutor = ?");
        $stmt->execute([$codAutor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para adicionar um novo herói
    public function addCharacter($name, $power, $codAutor) {
        $query = "INSERT INTO characters (name, power, codAutor) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $power, $codAutor]);
        return $stmt;
    }

    // Método para atualizar um herói
    public function updateCharacter($id, $name, $power) {
        $query = "UPDATE characters SET name = ?, power = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $power, $id]);
         
    }

    // Método para excluir um herói
    public function deleteCharacter($id) {
        $stmt = $this->conn->prepare("DELETE FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt;
    }
}
?>
