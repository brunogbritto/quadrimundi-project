<!-- login_page.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-container bg-white rounded-xl">
        <h2>Login</h2>
        <form action="index.php?action=login" method="post">
            <div class="form-group">
                <label for="username">Nome de Usuário:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error_message']; ?>
                    <?php unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>
            <p>Ainda não possui uma conta? <a href="index.php?action=register">Crie aqui.</a></p>
            <button type="submit" class="btn custom-btn">Entrar</button>
        </form>
        </div>
    </div>
</body>
</html>


