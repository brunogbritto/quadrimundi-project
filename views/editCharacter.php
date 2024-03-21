
<form action="index.php?action=updateCharacter" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($CharacterToEdit['id']); ?>">

            <!-- Nome do Personagem -->
            <div class="form-group">
                <label for="name">Nome do Personagem:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($CharacterToEdit['name']); ?>">
            </div>

            <!-- Identidade Civil -->
            <div class="form-group">
                <label for="civil_identity">Identidade Civil:</label>
                <input type="text" class="form-control" id="civil_identity" name="civil_identity" value="<?php echo htmlspecialchars($CharacterToEdit['civil_identity']); ?>">
            </div>

            <!-- Idade -->
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($CharacterToEdit['age']); ?>">
            </div>

            <!-- Altura e Peso -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="height">Altura:</label>
                    <input type="text" class="form-control" id="height" name="height" value="<?php echo htmlspecialchars($CharacterToEdit['height']); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="weight">Peso:</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($CharacterToEdit['weight']); ?>">
                </div>
            </div>

            <!-- Nacionalidade -->
            <div class="form-group">
                <label for="nationality">Nacionalidade:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo htmlspecialchars($CharacterToEdit['nationality']); ?>">
            </div>

            <!-- Etnia -->
            <div class="form-group">
                <label for="ethnicity">Etnia:</label>
                <input type="text" class="form-control" id="ethnicity" name="ethnicity" value="<?php echo htmlspecialchars($CharacterToEdit['ethnicity']); ?>">
            </div>

            <!-- Identidade Sexual -->
            <div class="form-group">
                <label for="sexual_identity">Identidade Sexual:</label>
                <input type="text" class="form-control" id="sexual_identity" name="sexual_identity" value="<?php echo htmlspecialchars($CharacterToEdit['sexual_identity']); ?>">
            </div>

            <!-- PCD -->
            <div class="form-group">
                <label for="pcd">PCD:</label>
                <select class="form-control" id="pcd" name="pcd" value="<?php echo htmlspecialchars($CharacterToEdit['pcd']); ?>">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <!-- Outros Detalhes -->
            <div class="form-group">
                <label for="other_details">Outros:</label>
                <input type="text" class="form-control" id="other_details" name="other_details" value="<?php echo htmlspecialchars($CharacterToEdit['other_details']); ?>">
            </div>

            <!-- Traje -->
            <div class="form-group">
                <label for="costume">Traje:</label>
                <input type="text" class="form-control" id="costume" name="costume" value="<?php echo htmlspecialchars($CharacterToEdit['costume']); ?>">
            </div>

            <!-- Acessórios e Armas -->
            <div class="form-group">
                <label for="accessories">Acessórios e Armas:</label>
                <input type="text" class="form-control" id="accessories" name="accessories" value="<?php echo htmlspecialchars($CharacterToEdit['accessories']); ?>">
            </div>

            <!-- Habilidades Especiais -->
            <div class="form-group">
                <label for="special_abilities">Habilidades Especiais:</label>
                <input type="text" class="form-control" id="special_abilities" name="special_abilities" value="<?php echo htmlspecialchars($CharacterToEdit['special_abilities']); ?>">
            </div>

            <!-- Primeira Aparição -->
            <div class="form-group">
                <label for="first_appearance">1ª Aparição nos Quadrinhos / Ano:</label>
                <input type="text" class="form-control" id="first_appearance" name="first_appearance" value="<?php echo htmlspecialchars($CharacterToEdit['first_appearance']); ?>">
            </div>

            <!-- Breve Histórico -->
            <div class="form-group">
                <label for="backstory">Breve Histórico:</label>
                <textarea class="form-control" id="backstory" name="backstory" value="<?php echo htmlspecialchars($CharacterToEdit['backstory']); ?>"></textarea>
            </div>

            <div class="form-group">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_super_heroi" name="flg_super_heroi" value="1" <?php echo $CharacterToEdit['flg_super_heroi'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_super_heroi">Super-Herói</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_anti_heroi" name="flg_anti_heroi" value="1" <?php echo $CharacterToEdit['flg_anti_heroi'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_anti_heroi">Anti-Herói</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_super_vilao" name="flg_super_vilao" value="1" <?php echo $CharacterToEdit['flg_super_vilao'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_super_vilao">Super-Vilão</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_adulto" name="flg_adulto" value="1" <?php echo $CharacterToEdit['flg_adulto'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_adulto">Adulto</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_infantil" name="flg_infantil" value="1" <?php echo $CharacterToEdit['flg_infantil'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_infantil">Infantil</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_manga" name="flg_manga" value="1" <?php echo $CharacterToEdit['flg_manga'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_manga">Manga</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_ficcao_cientifica" name="flg_ficcao_cientifica" value="1" <?php echo $CharacterToEdit['flg_ficcao_cientifica'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_ficcao_cientifica">Ficção Científica</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_terror" name="flg_terror" value="1" <?php echo $CharacterToEdit['flg_terror'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_terror">Terror</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="flg_comedia" name="flg_comedia" value="1" <?php echo $CharacterToEdit['flg_comedia'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flg_comedia">Comédia</label>
            </div>

            </div>

    <input class="mb-4" type="submit" value="Atualizar Personagem">
</form>

<script src="public/js/characterFlags.js"></script>

