<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Completar Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Completar Perfil</h2>
        <form action="/quadrimundi-project/index.php?action=completeProfile" method="post">
            <div class="form-group">
                <label for="fullname">Nome Completo:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="artisticname">Nome Artístico:</label>
                <input type="text" class="form-control" id="artisticname" name="artisticname">
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state">
            </div> 
            <div class="form-group">
                <label for="phone1">Telefone 1:</label>
                <input type="tel" class="form-control" id="phone1" name="phone1">
            </div>
            <div class="form-group">
                <label for="phone2">Telefone 2:</label>
                <input type="tel" class="form-control" id="phone2" name="phone2">
            </div>
            <div class="form-group">
                <label for="website">Site:</label>
                <input type="url" class="form-control" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook">
            </div>
            <div class="form-group">
                <label for="tiktok">TikTok:</label>
                <input type="text" class="form-control" id="tiktok" name="tiktok">
            </div>
            <button type="submit" class="btn btn-primary mb-4">Completar Cadastro</button>
        </form>
    </div>
</body>
</html>