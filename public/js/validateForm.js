function validateForm() {
  var isValid = true;

  // Validação NOME
  var name = document.getElementById("name").value.trim();
  if (name.length < 2 || name.length > 50) {
    alert("O nome deve ter entre 2 e 50 caracteres.");
    isValid = false;
  } else if (!/^[a-zA-Z\u00C0-\u017F\s\-']+$/.test(name)) {
    alert("O nome deve conter apenas letras, espaços, hífens e acentos.");
    isValid = false;
  }

  // Validação IDADE
  var age = document.getElementById("age").value;
  if (age !== "" && (isNaN(age) || age < 0)) {
    alert("A idade deve ser um número positivo.");
    isValid = false;
  }

  // Validação PESO
  var weight = document.getElementById("weight").value.trim();
  if (!validateWeight(weight)) {
      alert("O peso deve ser um número entre 1 e 999,99 kg.");
      isValid = false;
  }

  // Validação ALTURA
  var height = document.getElementById("height").value.trim();
  if (height !== "" && !/^\d{1,3}([,.]\d{1,2})?$/.test(height)) {
      alert("A altura deve ser um número com até 3 dígitos e opcionalmente um ponto ou vírgula seguido de até 2 dígitos (por exemplo: '180', '1.75' ou '1,75').");
      isValid = false;
  }

  // Validação de PCD
  var pcd = document.getElementById("pcd").value;
  if (pcd !== "0" && pcd !== "1") {
    alert("Seleção de PCD inválida.");
    isValid = false;
  }

  // Validação da PRIMEIRA APARIÇÃO (formato de data como exemplo)
  var firstAppearance = document.getElementById("first_appearance").value;
  if (firstAppearance !== "" && !/^\d{4}-\d{2}-\d{2}$/.test(firstAppearance)) {
    alert("Formato da data da primeira aparição inválido. Use o formato AAAA-MM-DD.");
    isValid = false;
  }

  // Outras validações de texto podem seguir o mesmo padrão do NOME

  // Validar IMAGEM DO PERSONAGEM (exemplo básico)
  var imageInput = document.getElementById("characterImage");
  if (imageInput.files.length > 0) {
    var fileSize = imageInput.files[0].size / 1024 / 1024; // in MB
    if (fileSize > 5) {
      alert("A imagem deve ser menor que 5MB.");
      isValid = false;
    }
    // Adicionar mais verificações se necessário, como tipo de arquivo
  }

  return isValid; // Retorna false para evitar o envio do formulário caso a validação falhe
}
