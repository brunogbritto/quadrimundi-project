<?php
include_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    // Método para registrar um novo usuário/autor
    public function register($userData) {
        // Aqui você pode adicionar validação dos dados recebidos

        // Chama o método 'create' do modelo User
        $userId = $this->userModel->create($userData);

        if ($userId) {
            // Armazena o userId na sessão ou usa como codAutor
            $_SESSION['user_id'] = $userId;
            $_SESSION['codAutor'] = $userId; // Se desejar usar como codAutor
            // Se o usuário for criado com sucesso, redirecione ou dê feedback positivo
            $_SESSION['success_message'] = 'Cadastro realizado com sucesso!';
            header('Location: index.php?action=login');
        } else {
            // Em caso de falha, redirecione ou dê feedback de erro
            $_SESSION['error_message'] = 'Falha no cadastro. Tente novamente.';
            header('Location: index.php?action=register');
        }
    }

   // Método para processar o login
   public function login($username, $password) {
    // Obter dados do usuário pelo nome de usuário
    $user = $this->userModel->getUserByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        // Se a senha estiver correta, iniciar a sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirecionar para uma página, por exemplo, a lista de heróis
        header('Location: index.php?action=listHeroes');
        exit;
    } else {
        // Se as credenciais estiverem incorretas, enviar de volta para a página de login com uma mensagem de erro
        $_SESSION['error_message'] = 'Nome de usuário ou senha inválidos.';
        header('Location: index.php?action=login');
        exit;
    }
}

    // Método para processar logout (a ser implementado)
    // ...

    // Outros métodos conforme necessário
}
?>
