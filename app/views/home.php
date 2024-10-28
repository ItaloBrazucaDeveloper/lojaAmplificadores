<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
  <link rel="stylesheet" type="text/css" href="assets/css/global.css">
  <link rel="stylesheet" type="text/css" href="assets/css/navigationMenu.css">
</head>

<body>
  <div class="main-container">

    <header class="header-page">
      <h1 class="logo">
        ROCK N'ROLL <br>
        Amplificadores
      </h1>
      <?PHP
      use App\components\navigationMenu\NavigationMenu;
      $userSessionInfo = $_SESSION["userSessionInfo"];
      echo NavigationMenu::render($userSessionInfo["responsability"]);
      ?>
    </header>

    <main id="conteudo_especifico">
      <h2> ADMINISTRAÇÃO </h2>
      <p>
        Seja bem-vindo ao sistema de controle de estoque e venda de
        amplificadores da Rock N' Rol Amplificadores
      </p>
    </main>

    <footer>
      <div id="institutial-text">
        <span>
          AMPLI - CONTROL <br>
          Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677
        </span>
      </div>
    </footer>

  </div>
</body>

</html>