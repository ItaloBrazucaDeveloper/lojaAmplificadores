<?PHP
use App\components\navigationMenu\NavigationMenu;
use App\components\Radios;
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
  <script defer src="assets/js/dialog.js"></script>
  <script defer src="assets/js/getTableRow.js"></script>
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
          // Create Users form
          $dialogFormUsers = new DialogForm(
            title: "Cadastrar Funcionários",
            description: "Cadastre novos funcionários para a loja!",
            dataAction: "create",
            method: "POST",
            action: "users",
            inputs: [
              new Input(
                name: "name",
                label: "Nome",
                inputAttributes: [
                  "required" => "true",
                  "autofocus" => "true",
                  "autocomplete" => "name",
                ]
              ),
              new Input(
                name: "username",
                label: "Login",
                inputAttributes: [
                  "required" => "true",
                  "autocomplete" => "login",
                ]
              ),
              new Input(
                name: "userpasswd",
                type: "password",
                label: "Senha",
                inputAttributes: [
                  "required" => "true",
                  "autocomplete" => "false",
                ]
              ),
              new Radios(
                name: "userrole",
                label: "Função",
                opcoes: ["vendedor", "estoquista"],
                defaultChecked: "vendedor"
              ),
            ]
          );
          echo $dialogFormUsers->render();
          ?>
          <button type="button" class="open-dialog" data-action="create">
            Cadastrar functionários
          </button>
        </header>

        <?PHP
        $actionsTableColumn = ["edit", "remove"];
        $actionIcons = array_map(
          fn ($action): string =>
          "
            <img
              class='open-dialog'
              data-action='{$action}'
              height='20px'
              src='assets/svg/{$action}_row.svg'
              alt='{$action}'
            />
          ", $actionsTableColumn
        );

        // Edit Users form
        $dialogFormEdit = new DialogForm(
          title: "Editar Funcionários",
          description: "Edite os dados do funcionário!",
          dataAction: "edit",
          method: "POST",
          action: "users/edit/id:",
          inputs: [
            new Input(
              name: "name",
              label: "Nome",
              inputAttributes: [
                "required" => "true",
                "autofocus" => "true",
                "autocomplete" => "name",
              ]
            ),
            new Input(
              name: "username",
              label: "Login",
              inputAttributes: [
                "required" => "true",
                "autocomplete" => "login",
              ]
            ),
            new Input(
              name: "userpasswd",
              type: "password",
              label: "Senha",
              inputAttributes: [
                "required" => "true",
                "autocomplete" => "false",
              ]
            ),
            new Radios(
              name: "userrole",
              label: "Função",
              opcoes: ["vendedor", "estoquista"],
              defaultChecked: "vendedor"
            ),
          ]
        );

        // Edit Users form
        $dialogFormRemove = new DialogForm(
          title: "Remove Funcionários",
          description: "Bastante atenção, você realmente deseja remover esse funcionário?",
          dataAction: "remove",
          method: "POST",
          submitButtonText: "Confirmar",
          action: "users/remove/id:",
          inputs: []
        );

        $rows = array_map(
          function ($row) use(
            $actionIcons,
            $dialogFormEdit,
            $dialogFormRemove
          ) {
            
            $row["actions"] = "
              <div class=''>
                {$dialogFormEdit->render()}
                {$actionIcons[0]}
              </div>
              <div class=''>
                {$dialogFormRemove->render(true)}
                {$actionIcons[1]}
              </div>
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