

<div id="addCharacter" class="tab-pane active">
    <form action="index.php?action=addCharacter" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            <!-- Nome do Personagem -->
            <div class="form-group">
                <label for="name">Nome do personagem:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Identidade Civil -->
            <div class="form-group">
                <label for="civil_identity">Identidade Civil:</label>
                <input type="text" class="form-control" id="civil_identity" name="civil_identity">
            </div>

            <!-- Idade -->
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>

            <!-- Altura e Peso -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="height">Altura:</label>
                    <input type="text" class="form-control" id="height" name="height">
                </div>
                <div class="form-group col-md-6">
                    <label for="weight">Peso:</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
            </div>

            <!-- Nacionalidade -->
            <div class="form-group">
                <label for="nationality">Nacionalidade:</label>
                <input type="text" class="form-control" id="nationality" name="nationality">
            </div>

            <!-- Etnia -->
            <div class="form-group">
                <label for="ethnicity">Etnia:</label>
                <input type="text" class="form-control" id="ethnicity" name="ethnicity">
            </div>

            <!-- Identidade Sexual -->
            <div class="form-group">
                <label for="sexual_identity">Identidade Sexual:</label>
                <input type="text" class="form-control" id="sexual_identity" name="sexual_identity">
            </div>

            <!-- PCD -->
            <div class="form-group">
                <label for="pcd">PCD:</label>
                <select class="form-control" id="pcd" name="pcd">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <!-- Outros Detalhes -->
            <div class="form-group">
                <label for="other_details">Outros:</label>
                <input type="text" class="form-control" id="other_details" name="other_details">
            </div>

            <!-- Traje -->
            <div class="form-group">
                <label for="costume">Traje:</label>
                <input type="text" class="form-control" id="costume" name="costume">
            </div>

            <!-- Acessórios e Armas -->
            <div class="form-group">
                <label for="accessories">Acessórios e Armas:</label>
                <input type="text" class="form-control" id="accessories" name="accessories">
            </div>

            <!-- Habilidades Especiais -->
            <div class="form-group">
                <label for="special_abilities">Habilidades Especiais:</label>
                <input type="text" class="form-control" id="special_abilities" name="special_abilities">
            </div>

            <!-- Primeira Aparição -->
            <div class="form-group">
                <label for="first_appearance">1ª Aparição nos Quadrinhos / Ano:</label>
                <input type="text" class="form-control" id="first_appearance" name="first_appearance">
            </div>

            <!-- Breve Histórico -->
            <div class="form-group">
                <label for="backstory">Breve Histórico:</label>
                <textarea class="form-control" id="backstory" name="backstory"></textarea>
            </div>

            <div class="form-group">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_super_heroi" name="flg_super_heroi" value="1">
                <label class="form-check-label" for="flg_super_heroi">Super-Herói</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_anti_heroi" name="flg_anti_heroi" value="1">
                <label class="form-check-label" for="flg_anti_heroi">Anti-Herói</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_super_vilao" name="flg_super_vilao" value="1">
                <label class="form-check-label" for="flg_super_vilao">Super-Vilão</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_adulto" name="flg_adulto" value="1">
                <label class="form-check-label" for="flg_adulto">Adulto</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_infantil" name="flg_infantil" value="1">
                <label class="form-check-label" for="flg_infantil">Infantil</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_manga" name="flg_manga" value="1">
                <label class="form-check-label" for="flg_manga">Manga</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_ficcao_cientifica" name="flg_ficcao_cientifica" value="1">
                <label class="form-check-label" for="flg_ficcao_cientifica">Ficção Científica</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_terror" name="flg_terror" value="1">
                <label class="form-check-label" for="flg_terror">Terror</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_comedia" name="flg_comedia" value="1">
                <label class="form-check-label" for="flg_comedia">Comédia</label>
            </div>
            <!-- Campo de Upload de Imagem -->
            <div class="form-group mt-4 mb-4">
                <label for="characterImage">Imagem do Personagem:</label>
                <input type="file" class="form-control-file" id="characterImage" name="characterImage" accept="image/*">
            </div>

            </div>

        <input class="mb-3" type="submit" value="Adicionar Personagem">
    </form>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success mt-4" id="successMessage">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif; ?>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Verifica se a mensagem de sucesso existe
        var successMessage = document.getElementById("successMessage");
        if (successMessage) {
            // Oculta a mensagem após 1,5 segundos (1500 milissegundos)
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        }
    });
</script>
<script src="public/js/validateForm.js"></script>
<script src="public/js/characterFlags.js"></script>
