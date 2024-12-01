<?php
include('../libraries/php/pagamentosl.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/consultas.css">
    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    html, body {
    height: 100%;
}

.wrapper {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

.content-wrapper {
    flex: 1;
    padding-bottom: 20px; 
}
</style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" >
    <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
			<?php include('../libraries/php/principall.php') ?>        
		<?php else: ?>
			<?php include('../libraries/php/secundariol.php') ?>         
		<?php endif; ?>
        <?php include('../includes/components/navbar.php'); ?>
        <?php include('../includes/components/saidebar.php'); ?>

        <div class="content-wrapper color" >
            <main class="container" >
                <h2>Consultas Pendentes</h2>
                <?php if (!empty($mensagem)): ?>
                    <p><?= htmlspecialchars($mensagem) ?></p>
                <?php endif; ?>
                
                <?php if (count($consultas_pendentes) > 0): ?>
                    <div class="d-flex flex-wrap" style="gap: 1rem; width: 100%;  margin-inline: auto;">                        <?php foreach ($consultas_pendentes as $consulta): ?>
                            <div class="card mb-3 flex-fill" style="min-width: 200px; max-width: 350px; margin-bottom: 20px; flex:1;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= htmlspecialchars($consulta['nome_profissional']) ?></h5>
                                    <p><strong>Especialidade:</strong> <?= htmlspecialchars($consulta['especialidade_profissional']) ?></p>
                                    <p><strong>Valor:</strong> R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></p>
                                    <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($consulta['data_consulta'])) ?></p>
                                    <p><strong>Hora:</strong> <?= date('H:i', strtotime($consulta['hora_consulta'])) ?></p>
                                    <div class="justify-content-center" style="display: flex; align-items: center; gap: 1.5rem;">
                                        <button 
                                            type="button" 
                                            class="btn btn-success pagar-btn" 
                                            data-id="<?= $consulta['id_consulta'] ?>" 
                                            data-valor="<?= $consulta['valor_exame'] ?>" 
                                            data-toggle="modal" 
                                            data-target="#confirmPaymentModal">
                                            Pagar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Não há consultas futuras agendadas.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmPaymentModal" tabindex="-1" role="dialog" aria-labelledby="confirmPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmPaymentModalLabel">Confirmar Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja confirmar o pagamento para esta consulta?</p>
                    <p><strong>Valor:</strong> R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></p>
                </div>
                <div class="modal-footer">
                    <form id="confirm-payment-form" method="POST">
                        <input type="hidden" name="id_consulta" id="modal-id-consulta">
                        <input type="hidden" name="valor_pago" id="modal-valor-pago">
                        <button type="submit" class="btn btn-success">Aceitar</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.pagar-btn', function () {
            const consultaId = $(this).data('id');
            const valor = $(this).data('valor');
            
            $('#modal-id-consulta').val(consultaId);
            $('#modal-valor-pago').val(valor);
            $('#modal-valor').text(valor.toFixed(2).replace('.', ','));
        });
    </script>
</body>
</html>
