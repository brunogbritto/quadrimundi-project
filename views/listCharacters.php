<?php include_once __DIR__ . '/../utils/functions.php'; ?>

<div id="listCharacters" class="tab-pane">
    <h2>Lista de Personagens</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Flags</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($characters as $character): ?>
                <tr>
                    <td>
                        <a href="index.php?action=showCharacter&id=<?php echo $character['id']; ?>">
                            <?php echo htmlspecialchars($character['name']); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo renderFlagBadges($character); ?>
                    </td>
                    <td class="text-center"> 
                        <a href="index.php?action=editCharacter&id=<?php echo $character['id']; ?>">Editar</a> | 
                        <a href="index.php?action=deleteCharacter&id=<?php echo $character['id']; ?>" onclick="return confirmDelete();">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="public/js/confirmDelete.js"></script>
