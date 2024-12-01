function deletarUsuario(userId) {
    if (confirm('Tem certeza que deseja deletar este usuário?')) {
        $.ajax({
            url: '', // A mesma página, já que estamos tratando a requisição no mesmo arquivo
            type: 'POST',
            data: { id: userId },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    $('#usuario-' + userId).remove(); // Remove o usuário da interface
                    alert(result.message);
                } else {
                    alert(result.message);
                }
            },
            error: function() {
                alert('Erro ao tentar deletar o usuário. Tente novamente mais tarde.');
            }
        });
    }
}