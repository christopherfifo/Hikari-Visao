<?php
include('../libraries/php/configuracoesl.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../css/barraLateral.css" />
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="stylesheet" href="../css/configuracoes.css" />
    <script src="../libraries/javascript/configuracoesl.js" defer></script>
    <style>
        .espaco-senha {
            position: relative;
            width: 100%;
        }
        .olhos {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px; /* Ajuste do tamanho do ícone */
        }
        .inputs_login {
            padding-right: 35px; /* Adiciona espaço para o ícone */
            width: 100%;
            box-sizing: border-box; /* Para garantir que o padding não afete a largura total */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <main>
                <section class="config-section">
                    <h1>Configurações</h1>

                    <div class="config-group">
                        <h2>Preferências de Conta</h2>
                        <form id="account-preferences-form">
                            <label for="theme">Tema:</label>
                            <select id="theme" name="theme" class="form-control">
                                <option value="light">Claro</option>
                                <option value="dark">Escuro</option>
                            </select>

                            <label for="notifications">Notificações:</label>
                            <input type="checkbox" id="notifications" name="notifications" checked />
                            <label for="notifications">Receber Notificações</label>

                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </form>
                    </div>

                    <div class="config-group">
                        <h2>Segurança</h2>
                        <form id="security-form" method="post">
                            <input type="hidden" name="action" value="alterar_senha" />
                            <label for="current-password">Senha Atual:</label>
                            <div class="espaco-senha">
                                <input type="password" id="current-password" name="current-password" required class="form-control inputs_login" />
                                <i class="fa-regular fa-eye olhos" onclick="togglePasswordVisibility('current-password')"></i>
                            </div>

                            <label for="new-password">Nova Senha:</label>
                            <div class="espaco-senha">
                                <input type="password" id="new-password" name="new-password" required class="form-control inputs_login" />
                                <i class="fa-regular fa-eye olhos" onclick="togglePasswordVisibility('new-password')"></i>
                            </div>

                            <label for="confirm-password">Confirmar Nova Senha:</label>
                            <div class="espaco-senha">
                                <input type="password" id="confirm-password" name="confirm-password" required class="form-control inputs_login" />
                                <i class="fa-regular fa-eye olhos" onclick="togglePasswordVisibility('confirm-password')"></i>
                            </div>

                            <button type="submit" class="btn btn-success">Alterar Senha</button>
                        </form>
                    </div>

                    <div class="config-group">
                        <h2>Excluir Conta</h2>
                        <form id="delete-account-form" method="post">
                            <input type="hidden" name="action" value="excluir_conta" />
                            <p>Se você deseja excluir sua conta, esta ação é irreversível e todos os seus dados serão perdidos.</p>
                            <label for="confirm-delete">Digite sua senha para confirmar:</label>
                            <div class="espaco-senha">
                                <input type="password" id="confirm-delete" name="confirm-delete" required class="form-control inputs_login" />
                                <i class="fa-regular fa-eye olhos" onclick="togglePasswordVisibility('confirm-delete')"></i>
                            </div>
                            <button type="submit" class="btn btn-danger">Excluir Conta</button>
                        </form>
                    </div>
                </section>
            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
