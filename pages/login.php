<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/senha.css" />
    <link rel="stylesheet" href="../css/tema.css" />
    <script src="../libraries/javascript/script.js" defer></script>
    <title>login</title>
  </head>
  <body class="obj">
    <header class="topo">
      <button class="tema obj">
        <a href="../index.php" class="home-link obj"
          ><span class="home-title"
            ><i class="fa-solid fa-house" id="home"></i>Home</span
          ></a
        >
      </button>
      <button class="tema">
        <i class="fa-solid fa-sun obj" id="dark"></i>
      </button>
    </header>
    <div class="container obj" id="container">
      <?php include('../libraries/LibLogin/LibInfo.php') ?>

      <?php include('../includes/components/login/register.php') ?>

      <?php include('../includes/components/login/Login2.php') ?>

      <div class="overlay-container">

        <?php include('../includes/components/login/infoLogin.php') ?>

      </div>
    </div>
  </body>
</html>
