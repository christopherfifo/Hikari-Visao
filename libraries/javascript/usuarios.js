// Função para deletar um usuário
function deleteUser(userId) {
    let userElement = document.getElementById(userId);
    if (userElement) {
        userElement.remove();
    }
}

// Função para abrir o modal de edição
function openEdit(userId) {
    let modal = document.getElementById("edit-modal");
    let form = document.getElementById("edit-form");
    
    // Preencher o formulário com as informações atuais
    let userName = document.querySelector(`#${userId} .user-details h2`).innerText;
    let userPhoto = document.querySelector(`#${userId} .user-photo`).style.backgroundImage;
    
    form.elements["edit-name"].value = userName;
    form.elements["edit-photo"].value = userPhoto.replace('url("', '').replace('")', '');
    
    // Configurar o evento de submissão do formulário
    form.onsubmit = function(event) {
        event.preventDefault();
        updateUser(userId);
        closeEdit();
    };
    
    modal.style.display = "block";
}

// Função para fechar o modal de edição
function closeEdit() {
    let modal = document.getElementById("edit-modal");
    modal.style.display = "none";
}

// Função para atualizar as informações do usuário
function updateUser(userId) {
    let userName = document.getElementById("edit-name").value;
    let userPhoto = document.getElementById("edit-photo").value;
    
    let userElement = document.getElementById(userId);
    if (userElement) {
        userElement.querySelector('.user-details h2').innerText = userName;
        userElement.querySelector('.user-photo').style.backgroundImage = userPhoto ? `url(${userPhoto})` : 'none';
    }
}

// Fechar o modal quando o usuário clicar fora do modal
window.onclick = function(event) {
    let modal = document.getElementById("edit-modal");
    if (event.target === modal) {
        closeEdit();
    }
}
