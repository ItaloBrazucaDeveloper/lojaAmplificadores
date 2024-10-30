<?PHP

namespace App\controllers;
use App\models\UsersModel;
use App\components\Input;
use App\components\Radios;

class UsersController
{
  public function index()
  {
    [$headers, $rows] = $this->list();
    require "app/views/users.php";
  }

  public function createForm()
  {
    $session = "Funcionários";
    $method = "POST";
    $action = "";
    $inputs = [
      new Input(
        name: "name",
        placeholder: "Nome",
        inputAttributes: [
          "required" => true,
          "autofocus" => true,
          "autocomplete" => "name",
        ]
      ),
      new Input(
        name: "username",
        placeholder: "Login",
        inputAttributes: [
          "required" => true,
          "autocomplete" => "login",
        ]
      ),
      new Input(
        name: "userpasswd",
        type: "password",
        placeholder: "Senha",
        inputAttributes: [
          "required" => true,
          "autocomplete" => "false",
        ]
      ),
      new Radios(
        name: "userrole",
        label: "Função",
        opcoes: ["vendedor", "estoquista"],
        defaultChecked: "vendedor"
      ),
    ];
    require "app/views/create_form.php";
  }

  public function editForm()
  {
    $userId = parse_url(
      url: $_SERVER["REQUEST_URI"],
      component: PHP_URL_PATH
    );

    echo $userId;
    require "app/views/edit_form.php";
  }

  private function list(): array
  {
    $response = UsersModel::getUsers();
    
    $headers = [
      "N°",
      "Nome",
      "Login",
      "Função",
      "Status",
      "Editar"
    ];

    $usersData = [];
    while ($userTableRow = $response->fetch_assoc()) {
      $usersData[] = $userTableRow;
    }

    return [
      $headers,
      $usersData
    ];
  }

  public function create()
  {
    [
      "name" => $name,
      "username" => $userName,
      "userpasswd" => $userPasswd,
      "userrole" => $userRole
    ] = $_POST;

    $isCreated = UsersModel::createUser(
      user: [
        $name,
        $userName,
        $userPasswd,
        $userRole
      ]
    );

    $successQueyUri = $isCreated ? "true" : "false";
    header("Location: ?success={$successQueyUri}");
    exit;
  }

  public function edit()
  {

  }
}