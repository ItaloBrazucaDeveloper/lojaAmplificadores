<?PHP
use App\components\Form;
use App\components\Input;
use App\components\Radios;
use App\components\Select;
use App\components\navigationMenu\NavigationMenu;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edição - <?= $session ?></title>
  <link rel="stylesheet" href="../../assets/css/global.css">
  <link rel="stylesheet" href="../../assets/css/form.css">
  <link rel="stylesheet" href="../../assets/css/navigationMenu.css">
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
        <h1>Editar <?= $session ?></h1>
        <?PHP
        $createForm = new Form(
          method: $method,
          action: $action,
          enctype: $enctype ?? "",
          inputs: $inputs,
        );
        echo $createForm->render();
        ?>
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