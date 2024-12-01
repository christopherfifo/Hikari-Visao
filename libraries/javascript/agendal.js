function atualizarProfissional() {
    var select = document.getElementById('id_profissional');
    var nomeProfissional = select.options[select.selectedIndex].getAttribute('data-nome');
    var especialidadeProfissional = select.options[select.selectedIndex].getAttribute('data-especialidade');
    document.getElementById('nome_profissional').value = nomeProfissional;
    document.getElementById('especialidade_profissional').value = especialidadeProfissional;
}

function atualizarValorExame() {
    var select = document.getElementById('id_exame');
    var valorExame = select.options[select.selectedIndex].getAttribute('data-valor');
    var nomeExame = select.options[select.selectedIndex].getAttribute('data-nome');
    document.getElementById('valor_exame').value = valorExame;
    document.getElementById('nome_exame').value = nomeExame;
}

document.addEventListener('DOMContentLoaded', function() {
    atualizarProfissional();
    atualizarValorExame();
});