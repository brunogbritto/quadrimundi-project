

<div id="addCharacter" class="tab-pane active">
    <form action="index.php?action=addCharacter" method="post" onsubmit="return validateForm()">
        <label class="mt-4" for="name">Nome:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="power">Poder:</label>
        <input type="text" id="power" name="power"><br><br>

        <input type="submit" value="Adicionar Personagem">
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
