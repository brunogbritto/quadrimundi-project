
<form action="index.php?action=updateHero" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($heroToEdit['id']); ?>">

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($heroToEdit['name']); ?>"><br><br>

    <label for="power">Poder:</label>
    <input type="text" id="power" name="power" value="<?php echo htmlspecialchars($heroToEdit['power']); ?>"><br><br>

    <input type="submit" value="Atualizar Super-Herói">
</form>

