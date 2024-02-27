<?php
include_once __DIR__ . '/../models/Character.php'; // Inclui modelo Hero
include_once __DIR__ . '/../config/database.php';  // Inclui a configuração do banco de dados

class CharacterController {
    private $model;

    public function __construct() {
        global $conn;  // Usa a variável de conexão do banco de dados global
        $this->model = new Character($conn);  // Cria uma instância do modelo Hero com a conexão
    }

    // Método para exibir a página de adição de herói
    public function addCharacterPage() {
        if (isset($_SESSION['user_id']) && $_SESSION['profile_complete']) {
            $activeTab = 'addCharacter';
            $content = 'views/addCharacter.php';
            include 'views/layout.php';
        } else {
            // Redirecionar para completar perfil
            header('Location: views/complete_profile.php');
            exit;
        }
    }

    // Método para lidar com a adição de um novo herói
    public function addCharacter($name, $power) {
        if (isset($_SESSION['user_id'])) {
            $codAutor = $_SESSION['user_id'];
            $this->model->addCharacter($name, $power, $codAutor); 
            $_SESSION['success_message'] = "Personagem adicionado com sucesso!";
            header('Location: index.php?action=addCharacter');
            exit;
        } else {
            // Redirecionar para a página de login se o usuário não estiver logado
            header('Location: index.php?action=login');
            exit;
        }
    }

    // Método para exibir a lista de heróis
    public function listCharacters() {
        $activeTab = 'listCharacters';
        $characters = $this->model->getCharacters();
        $content = 'views/listCharacters.php';
        include 'views/layout.php';
    }

    public function listUserCharacters() {
        if (isset($_SESSION['user_id'])) {
            $codAutor = $_SESSION['user_id']; 
            $characters = $this->model->getCharactersByCodAutor($codAutor);
            $content = 'views/listCharacters.php';
            include 'views/layout.php';
        } else {
            // Redirecionar para login se o usuário não estiver logado
            header('Location: index.php?action=login');
            exit;
        }
    }

    // Método para exibir a página de edição de herói
    public function editCharacterPage($id) {
        $heroToEdit = $this->model->getCharacterById($id);
        $content = 'views/editCharacter.php';
        include 'views/layout.php';
    }

    // Método para atualizar um herói
    public function updateCharacter($id, $name, $power) {
        $this->model->updateCharacter($id, $name, $power);
        $_SESSION['success_message'] = "Personagem atualizado com sucesso!";
        header('Location: index.php?action=listCharacters');
    }

    // Método para deletar um herói
    public function deleteCharacter($id) {
        $this->model->deleteCharacter($id);
        header('Location: index.php?action=listCharacters');
        exit;
    }
}
?>
