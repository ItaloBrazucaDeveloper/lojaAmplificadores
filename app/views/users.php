<?PHP
use App\components\navigationMenu\NavigationMenu;
use App\components\Table;
use App\components\DialogForm;
use App\components\Input;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funcionários</title>
  <link rel="stylesheet" href="assets/css/global.css">
  <link rel="stylesheet" href="assets/css/navigationMenu.css">
  <link rel="stylesheet" href="assets/css/table.css">
  <link rel="stylesheet" href="assets/css/dialog.css">
</head>

<body>
  <div class="main-container">

    <header class="header-page">
      <h1 class="logo">
        ROCK N'ROLL <br>
        Amplificadores
      </h1>
      <?PHP
      $userSessionInfo = $_SESSION["userSessionInfo"];
      echo NavigationMenu::render($userSessionInfo["responsability"]);
      ?>
    </header>

    <main>
      <div class="container-table">

        <header class="header-table">
          <h2>
            Funcionários <br>
            <span>Lista de todos os funcionários cadastrados</span>
          </h2>
          <?PHP
          $dialogFormUsers = new DialogForm(
            method: "POST",
            action: "",
            inputs: [
              new Input(
                name: "nome_fun",
                label: "Nome"
              ),
              new Input(
                name: "login_fun",
                label: "Login"
              ),
              new Input(
                name: "senha_fun",
                label: "Senha"
              ),
              new Input(
                name: "funcao_fun",
                label: "Função"
              ),
            ]
          );
          echo $dialogFormUsers->render();
          ?>
          <button type="button" class="open-dialog">Cadastrar functionários</button>
        </header>

        <?PHP
        $usersTable = new Table();
        echo $usersTable->render(
          headers: $headers,
          rows: $rows
        );
        ?>

      </div>
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

  <script defer src="assets/javascript" type=""></script>
</body>

</html>