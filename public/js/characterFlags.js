// Função para controlar as regras de exclusão das flags
function controlCheckBoxes() {
    var superHeroi = document.getElementById('flg_super_heroi');
    var antiHeroi = document.getElementById('flg_anti_heroi');
    var superVilao = document.getElementById('flg_super_vilao');
    var adulto = document.getElementById('flg_adulto');
    var infantil = document.getElementById('flg_infantil');

    // Função para desabilitar checkboxes conflitantes
    function toggleCheckbox(checkbox, shouldBeDisabled) {
        if (shouldBeDisabled) {
            checkbox.checked = false;
            checkbox.disabled = true;
        } else {
            checkbox.disabled = false;
        }
    }

    // Aplicar a lógica de exclusão mútua
    toggleCheckbox(antiHeroi, superHeroi.checked || superVilao.checked);
    toggleCheckbox(superVilao, superHeroi.checked || antiHeroi.checked);
    toggleCheckbox(superHeroi, antiHeroi.checked || superVilao.checked);

    toggleCheckbox(infantil, adulto.checked);
    toggleCheckbox(adulto, infantil.checked);
}

// Adiciona os listeners para as checkboxes relevantes
document.addEventListener('DOMContentLoaded', function() {
    ['flg_super_heroi', 'flg_anti_heroi', 'flg_super_vilao', 'flg_adulto', 'flg_infantil'].forEach(function(id) {
        var checkbox = document.getElementById(id);
        if (checkbox) {
            checkbox.addEventListener('change', controlCheckBoxes);
        }
    });

    // Inicializa as regras uma vez no carregamento da página
    controlCheckBoxes();
});
