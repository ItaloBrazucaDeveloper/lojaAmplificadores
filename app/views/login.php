<?PHP
require_once "autoload.php";
use App\components\Form;
use App\components\Input;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/global.css">
  <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
  <div class="main-container">

    <header class="header-page">
      <h1 class="logo">
        ROCK N'ROLL <br>
        Amplificadores
      </h1>
    </header>

    <main>
      <h1>Acesso à Área Restrita</h1>
      <?PHP
      $loginForm = new Form(
        method: "POST",
        action: "login",
        inputs: [
          new Input(
            name: "username",
            placeholder: "Login",
            inputAttributes: [
              "required" => true,
              "autofocus" => true,
              "pattern" => "^[a-zA-Zà-úÀ-Úç\s]+$",
              "title" => "Somente letras são permitidas neste campo"
            ]
          ),
          new Input(
            name: "password",
            placeholder: "Senha",
            inputAttributes: ["required" => true]
          )
        ]
      );
      echo $loginForm->render();
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