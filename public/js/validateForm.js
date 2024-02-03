function validateForm() {
  var isValid = true;

  // Validação NOME
  var name = document.getElementById("name").value.trim();
  if (name.length < 2 || name.length > 50) {
    alert("O nome deve ter entre 2 e 50 caracteres.");
    isValid = false;
  } else if (!/^[a-zA-Z\u00C0-\u017F\s\-']*$/u.test(name)) {
    alert("O nome deve conter apenas letras, espaços, hífens e acentos.");
    isValid = false;
  }

  // Validação PODER
  var power = document.getElementById("power").value.trim();
  if (power === "") {
    alert("O campo poder não pode ficar em branco.");
    isValid = false;
  } else if (power.length > 100) {
    alert("A descrição do poder deve ter no máximo 100 caracteres.");
    isValid = false;
  } else if (!/^[a-zA-Z\s]*$/.test(power)) {
    alert("O poder deve conter apenas letras e espaços.");
    isValid = false;
  }

  return isValid; // Retorna false para evitar o envio do formulário caso a validação falhe
}
