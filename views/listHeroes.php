<div id="listHeroes" class="tab-pane">
    <h2>Lista de Super-Heróis</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Poder</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($heroes as $hero): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hero['name']); ?></td>
                    <td><?php echo htmlspecialchars($hero['power']); ?></td>
                    <td class="text-center"> 
                        <a href="index.php?action=editHero&id=<?php echo $hero['id']; ?>">Editar</a> | 
                        <a href="index.php?action=deleteHero&id=<?php echo $hero['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
