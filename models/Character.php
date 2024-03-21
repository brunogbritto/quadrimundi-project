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
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
               flg_infantil, flg_ficcao_cientifica, flg_manga, flg_comedia, image
           ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       
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
            $data['flg_super_heroi'],
            $data['flg_anti_heroi'],
            $data['flg_super_vilao'],
            $data['flg_adulto'],
            $data['flg_terror'],
            $data['flg_infantil'],
            $data['flg_ficcao_cientifica'],
            $data['flg_manga'],
            $data['flg_comedia'],
            $data['image']
        ]);
        
        return $stmt;
    }
        

    // Método para atualizar um Character
    public function updateCharacter($data) {
        $query = "UPDATE characters SET 
                    name = :name, 
                    civil_identity = :civil_identity, 
                    age = :age, 
                    height = :height, 
                    weight = :weight, 
                    nationality = :nationality, 
                    ethnicity = :ethnicity, 
                    sexual_identity = :sexual_identity, 
                    pcd = :pcd, 
                    other_details = :other_details, 
                    costume = :costume, 
                    accessories = :accessories, 
                    special_abilities = :special_abilities, 
                    first_appearance = :first_appearance, 
                    backstory = :backstory, 
                    flg_super_heroi = :flg_super_heroi, 
                    flg_anti_heroi = :flg_anti_heroi, 
                    flg_super_vilao = :flg_super_vilao, 
                    flg_adulto = :flg_adulto, 
                    flg_terror = :flg_terror, 
                    flg_infantil = :flg_infantil, 
                    flg_ficcao_cientifica = :flg_ficcao_cientifica, 
                    flg_manga = :flg_manga, 
                    flg_comedia = :flg_comedia,
                    image = :image 
                WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Vinculação dos parâmetros
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':civil_identity', $data['civil_identity']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':height', $data['height']);
        $stmt->bindParam(':weight', $data['weight']);
        $stmt->bindParam(':nationality', $data['nationality']);
        $stmt->bindParam(':ethnicity', $data['ethnicity']);
        $stmt->bindParam(':sexual_identity', $data['sexual_identity']);
        $stmt->bindParam(':pcd', $data['pcd']);
        $stmt->bindParam(':other_details', $data['other_details']);
        $stmt->bindParam(':costume', $data['costume']);
        $stmt->bindParam(':accessories', $data['accessories']);
        $stmt->bindParam(':special_abilities', $data['special_abilities']);
        $stmt->bindParam(':first_appearance', $data['first_appearance']);
        $stmt->bindParam(':backstory', $data['backstory']);
        $stmt->bindParam(':flg_super_heroi', $data['flg_super_heroi'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_anti_heroi', $data['flg_anti_heroi'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_super_vilao', $data['flg_super_vilao'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_adulto', $data['flg_adulto'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_terror', $data['flg_terror'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_infantil', $data['flg_infantil'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_ficcao_cientifica', $data['flg_ficcao_cientifica'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_manga', $data['flg_manga'], PDO::PARAM_INT);
        $stmt->bindParam(':flg_comedia', $data['flg_comedia'], PDO::PARAM_INT);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
   
    // Método para excluir um Character
    public function deleteCharacter($id) {
        $stmt = $this->conn->prepare("DELETE FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt;
    }
}
?>
