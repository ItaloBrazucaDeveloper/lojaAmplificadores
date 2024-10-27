<?PHP
session_start();
require "../src/functions/valida_sessao.php";
include "../src/views/menu_global.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administração</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
  <div class="main-container">

    <header>
      <h1 id="logo">
        ROCK N'ROLL <br>
        Amplificadores
      </h1>
      <?= Navi ?>
    </header>

    <main id="conteudo_especifico">
      <h2> ADMINISTRAÇÃO </h2>
      <p>
        Seja bem-vindo ao sistema de controle de estoque e venda de
        amplificadores da Rock N' Rol Amplificadores
      </p>
    </main>

    <footer>
      <div id="texto_institucional">
        <span>
          AMPLI - CONTROL <br>
          Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677
        </span>
      </div>
    </footer>

  </div>
</body>

</html>