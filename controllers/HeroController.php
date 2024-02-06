<?php
include_once __DIR__ . '/../models/Hero.php'; // Inclui modelo Hero
include_once __DIR__ . '/../config/database.php';  // Inclui a configuração do banco de dados

class HeroController {
    private $model;

    public function __construct() {
        global $conn;  // Usa a variável de conexão do banco de dados global
        $this->model = new Hero($conn);  // Cria uma instância do modelo Hero com a conexão
    }

    // Método para exibir a página de adição de herói
    public function addHeroPage() {
        $activeTab = 'addHero';
        $content = 'views/addHero.php';
        include 'views/layout.php';
    }

    // Método para lidar com a adição de um novo herói
    public function addHero($name, $power) {
        $this->model->addHero($name, $power);
        $_SESSION['success_message'] = "Super-Herói adicionado com sucesso!";
        header('Location: index.php?action=addHero');
    }

    // Método para exibir a lista de heróis
    public function listHeroes() {
        $activeTab = 'listHeroes';
        $heroes = $this->model->getHeroes();
        $content = 'views/listHeroes.php';
        include 'views/layout.php';
    }

    // Método para exibir a página de edição de herói
    public function editHeroPage($id) {
        $heroToEdit = $this->model->getHeroById($id);
        $content = 'views/editHero.php';
        include 'views/layout.php';
    }

    // Método para atualizar um herói
    public function updateHero($id, $name, $power) {
        $this->model->updateHero($id, $name, $power);
        $_SESSION['success_message'] = "Super-Herói atualizado com sucesso!";
        header('Location: index.php?action=listHeroes');
    }

    // Método para deletar um herói
    public function deleteHero($id) {
        $this->model->deleteHero($id);
        header('Location: index.php?tab=listHeroes');
    }
}
?>
