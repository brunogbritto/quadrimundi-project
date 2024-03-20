<?php
include_once __DIR__ . '/../models/Character.php'; // Inclui modelo Character
include_once __DIR__ . '/../config/database.php';  // Inclui a configuração do banco de dados

class CharacterController {
    private $model;

    public function __construct() {
        global $conn;  // Usa a variável de conexão do banco de dados global
        $this->model = new Character($conn);  // Cria uma instância do modelo Character com a conexão
    }

    // Método para exibir a página de adição de Character
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

    // Método para lidar com a adição de um novo Character
    public function addCharacter($data) {
        if (isset($_SESSION['user_id'])) {
            // Adiciona o 'codAutor' com base no usuário logado
            $data['codAutor'] = $_SESSION['user_id'];

        // Inicializa todas as flags como 0
        $flagKeys = ['flg_super_heroi', 'flg_anti_heroi', 'flg_super_vilao', 'flg_adulto', 'flg_terror', 'flg_infantil', 'flg_ficcao_cientifica', 'flg_manga', 'flg_comedia'];
        foreach ($flagKeys as $key) {
            $data[$key] = 0;
        }

        // Sobrescreve com 1 se a flag estiver marcada no POST
        foreach ($_POST as $key => $value) {
            if (in_array($key, $flagKeys)) {
                $data[$key] = 1;
            }
        }

            // Validação e Sanitização dos dados (importante!)
            // Você precisará implementar a lógica de validação e sanitização aqui.

            // Chama o método addCharacter do modelo
            $result = $this->model->addCharacter($data);

            if ($result) {
                $_SESSION['success_message'] = "Personagem adicionado com sucesso!";
                header('Location: index.php?action=listCharacters');
            } else {
                // Tratar erro na inserção
                $_SESSION['error_message'] = "Erro ao adicionar personagem.";
                header('Location: index.php?action=addCharacter');
            }
        } else {
            // Redirecionar para a página de login se o usuário não estiver logado
            header('Location: index.php?action=login');
            exit;
        }
    }

    //Método para lidar com a exibição de detalhes do Character
    public function showCharacterDetails($id) {
        $character = $this->model->getCharacterById($id);
        include 'views/characterDetails.php';
    }


    // Método para exibir a lista de Characters
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

    // Método para exibir a página de edição de Character
    public function editCharacterPage($id) {
        $CharacterToEdit = $this->model->getCharacterById($id);
        $content = 'views/editCharacter.php';
        include 'views/layout.php';
    }


    // Método para atualizar um Character
    public function updateCharacter() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    
        // Verifica se todos os campos necessários estão presentes no $_POST
        if (!isset($_POST['id'], $_POST['name'], $_POST['civil_identity'])) {
            $_SESSION['error_message'] = "Dados incompletos para atualização.";
            header('Location: index.php?action=editCharacter&id=' . $_POST['id']);
            exit;
        }
    
        // Chama o método do modelo para atualizar o personagem
        $result = $this->model->updateCharacter($_POST);
    
        // Redireciona com uma mensagem apropriada
        if ($result) {
            $_SESSION['success_message'] = "Personagem atualizado com sucesso!";
        } else {
            $_SESSION['error_message'] = "Erro ao atualizar personagem.";
        }
        header('Location: index.php?action=listCharacters');
        exit;
    }
    
    
    


    // Método para deletar um Character
    public function deleteCharacter($id) {
        $this->model->deleteCharacter($id);
        header('Location: index.php?action=listCharacters');
        exit;
    }
}
?>
