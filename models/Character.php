<?php
class Character {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar todos os Characters
    public function getCharacters() {
        $query = "SELECT * FROM characters";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }

    // Método para buscar um Character específico pelo ID
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

        // Método para adicionar um novo Character
    public function addCharacter($data) {
        $query = "INSERT INTO characters (
               name, civil_identity, age, height, weight, nationality, ethnicity, sexual_identity, pcd, 
               other_details, costume, accessories, special_abilities, first_appearance, backstory, 
               codAutor, flg_super_heroi, flg_anti_heroi, flg_super_vilao, flg_adulto, flg_terror, 
               flg_infantil, flg_ficcao_cientifica, flg_manga, flg_comedia
           ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       
        $stmt = $this->conn->prepare($query);
            
        $stmt->execute([
            $data['name'], 
            $data['civil_identity'],
            $data['age'],
            $data['height'],
            $data['weight'],
            $data['nationality'],
            $data['ethnicity'],
            $data['sexual_identity'],
            $data['pcd'],
            $data['other_details'],
            $data['costume'],
            $data['accessories'],
            $data['special_abilities'],
            $data['first_appearance'],
            $data['backstory'],
            $data['codAutor'],
            isset($data['flg_super_heroi']) ? 1 : 0,
            isset($data['flg_anti_heroi']) ? 1 : 0,
            isset($data['flg_super_vilao']) ? 1 : 0,
            isset($data['flg_adulto']) ? 1 : 0,
            isset($data['flg_terror']) ? 1 : 0,
            isset($data['flg_infantil']) ? 1 : 0,
            isset($data['flg_ficcao_cientifica']) ? 1 : 0,
            isset($data['flg_manga']) ? 1 : 0,
            isset($data['flg_comedia']) ? 1 : 0
        ]);
        
        return $stmt;
    }
        
    // Método para atualizar um Character
    public function updateCharacter($id, $name, $power) {
        $query = "UPDATE characters SET name = ?, power = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $power, $id]);
         
    }

    // Método para excluir um Character
    public function deleteCharacter($id) {
        $stmt = $this->conn->prepare("DELETE FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt;
    }
}
?>
