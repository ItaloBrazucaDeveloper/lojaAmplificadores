<?PHP
use App\components\navigationMenu\NavigationMenu;
use App\components\Table;
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
          <a href="users/create" class="button-link">
            Cadastrar functionários
          </a>
        </header>

        <?PHP
        $rows = array_map(
          function ($row) {
             $row["actions"] = "
              <a href='users/edit/:id{$row['cod_fun']}'>
                <img
                  class='open-dialog'
                  data-action='edit'
                  height='20px'
                  src='assets/svg/edit_row.svg'
                  alt='edit'
                />
              </a>
            ";
            return $row;
          }, $rows
        );

        // Read Users table
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

</body>

</html>