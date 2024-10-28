<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Amplificadores</title>
  <link rel="stylesheet" href="../assets/css/global.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
  <div id="principal">

    <header id="topo">
      <h1 id="logo">
        ROCK N'ROLL <br>
        Amplificadores
      </h1>
      <nav id="menu_global" class="menu_global">
        <ul align="right">
          <?php set_menu_global($_SESSION["usuario"]["funcao_fun"]) ?>
        </ul>
      </nav>
    </header>

    <div id="conteudo_especifico">
      <h1> AMPLIFICADORES </h1>
      <p align="right">
        <a href="../src/views/cadastro.php?setor=amplificadores">
          Cadastrar amplificador
        </a>
      </p>
    </div>

    <footer id="rodape">
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