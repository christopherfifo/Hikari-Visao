function enableEditing() {
    // Habilitar os campos para edição
    document.getElementById('nome').removeAttribute('readonly');
    document.getElementById('numero_celular').removeAttribute('readonly');
    document.getElementById('rg').removeAttribute('readonly');
    document.getElementById('cpf').removeAttribute('readonly');
    document.getElementById('data_nascimento').removeAttribute('readonly');
    document.getElementById('sexo').removeAttribute('disabled');

    // Mostrar botão de salvar e esconder botão de editar
    document.getElementById('edit-btn').style.display = 'none';
    document.getElementById('save-btn').style.display = 'inline-block';
}

// Remover o atributo 'disabled' do campo 'sexo' antes de enviar o formulário
document.querySelector('form').addEventListener('submit', function() {
    document.getElementById('sexo').removeAttribute('disabled');
    
    // Restaurar os campos para readonly após a submissão do formulário
    document.getElementById('nome').setAttribute('readonly', true);
    document.getElementById('numero_celular').setAttribute('readonly', true);
    document.getElementById('rg').setAttribute('readonly', true);
    document.getElementById('cpf').setAttribute('readonly', true);
    document.getElementById('data_nascimento').setAttribute('readonly', true);

    // Esconder o botão de salvar e mostrar o botão de editar novamente
    document.getElementById('save-btn').style.display = 'none';
    document.getElementById('edit-btn').style.display = 'inline-block';
});