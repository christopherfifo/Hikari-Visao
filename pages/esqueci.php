<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Esqueci Minha Senha</title>
    <link rel="stylesheet" href="../css/esqueci.css">
</head>
<body>
    <div class="top-bar">
        <a href="../../aula_php/index.php">
            <i class="fa-solid fa-person-through-window"></i>
            Home
        </a>
    </div>
    <div class="container">
        <h1>Esqueci Minha Senha</h1>
        <form action="#">
            <label for="email">Digite seu e-mail:</label>
            <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
            <button type="submit">Enviar Link de Redefinição</button>
        </form>
        <div class="message">
            <p>Um link de redefinição será enviado para o seu e-mail.</p>
        </div>
    </div>
</body>
</html>
