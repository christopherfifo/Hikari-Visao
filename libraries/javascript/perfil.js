// Função para carregar a imagem de perfil


const perfilImg = document.getElementById("perfil-img");
const perfilNome = document.getElementById("perfil-name")


function loadProfilePic(event) {
    const profilePic = document.getElementById('profile-pic');
    profilePic.src = URL.createObjectURL(event.target.files[0]);
    perfilImg.src = profilePic.src;
  }
  
  // Função para salvar os dados e exibir os valores ao invés dos inputs
  function salvarDados() {
    const nome = document.getElementById('nome').value;
    const telefone = document.getElementById('telefone').value;
    const email = document.getElementById('email').value;
    const rg = document.getElementById('rg').value;
    const cpf = document.getElementById('cpf').value;
    
    if (!nome || !telefone || !email || !rg || !cpf) {
      alert('Por favor, preencha todos os campos.');
      return;
    }
  
    // Substitui os inputs pelos valores
    document.getElementById('nome-display').textContent = nome;
    document.getElementById('telefone-display').textContent = telefone;
    document.getElementById('email-display').textContent = email;
    document.getElementById('rg-display').textContent = rg;
    document.getElementById('cpf-display').textContent = cpf;

    perfilNome.innerHTML = nome;
  
    // Oculta os inputs e exibe os valores salvos
    document.querySelector('.profile-info').classList.add('hidden');
    document.querySelector('.saved-info').classList.remove('hidden');
    loadProfilePic()
  }
  
  // Função para voltar ao modo de edição
  function editarDados() {
    document.querySelector('.saved-info').classList.add('hidden');
    document.querySelector('.profile-info').classList.remove('hidden');
  }
  

  
const save = document.getElementById('save');

save.addEventListener('click', salvarDados);

const edit = document.getElementById('edit');

edit.addEventListener('click', editarDados);