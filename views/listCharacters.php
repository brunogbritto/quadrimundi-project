<div id="listCharacters" class="tab-pane">
    <h2>Lista de Personagens</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Poder</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($characters as $character): ?>
                <tr>
                    <td><?php echo htmlspecialchars($character['name']); ?></td>
                    <td><?php echo htmlspecialchars($character['power']); ?></td>
                    <td class="text-center"> 
                        <a href="index.php?action=editCharacter&id=<?php echo $character['id']; ?>">Editar</a> | 
                        <a href="index.php?action=deleteCharacter&id=<?php echo $character['id']; ?>" onclick="return confirmDelete();">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <script src="public/js/confirmDelete.js"></script>
    </table>
</div>
