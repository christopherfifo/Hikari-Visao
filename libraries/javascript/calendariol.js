function abrirModalReagendar(consultaId, dataAtual, horaAtual) {
    $('#consulta_id').val(consultaId);
    $('#nova_data').val(dataAtual);
    $('#nova_hora').val(horaAtual);
    $('#modalReagendar').modal('show');
}

function salvarReagendamento() {
    const novaData = $('#nova_data').val();
    const novoHorario = $('#nova_hora').val();
    const consultaId = $('#consulta_id').val();

    $.ajax({
        url: '../libraries/php/remarcarConsulta.php',
        type: 'POST',
        data: {
            consulta_id: consultaId,
            data_consulta: novaData,
            hora_consulta: novoHorario
        },
        success: function(response) {
            try {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    alert("Consulta reagendada com sucesso!");
                    $('#modalReagendar').modal('hide');
                    location.reload(); // Atualiza a página após o sucesso
                } else {
                    alert("Erro: " + data.message);
                }
            } catch (e) {
                alert('Erro ao processar a resposta do servidor.');
            }
        },
        error: function() {
            alert('Erro ao reagendar consulta.');
        }
    });
}
function deletarConsulta(consultaId, detalheId) {
    if (confirm("Tem certeza que deseja cancelar esta consulta?")) {
        $.ajax({
            url: '../libraries/php/deletarConsulta.php',
            type: 'POST',
            data: {
                consulta_id: consultaId,
                detalhe_id: detalheId
            },
            success: function(response) {
                try {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        alert("Consulta cancelada com sucesso!");
                        $('#consulta_' + consultaId).remove(); // Remove a consulta da lista
                    } else {
                        alert("Erro: " + data.message);
                    }
                } catch (e) {
                    alert('Erro ao processar a resposta do servidor.');
                }
            },
            error: function() {
                alert('Erro ao cancelar consulta.');
            }
        });
    }
}