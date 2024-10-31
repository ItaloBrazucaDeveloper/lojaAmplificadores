<?PHP

namespace App\controllers;
use App\models\UsersModel;
use App\components\Input;
use App\components\Radios;
use App\components\Select;

class UsersController
{
  private array $formSettings;

  public function __construct()
  {
    $this->formSettings = [
      'session' => "Funcionários",
      'method' => "POST",
      'action' => "",
      'inputs' => [
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
      ]
    ];
  }

  public function index()
  {
    [$headers, $rows] = $this->list();
    require "app/views/users.php";
  }

  public function createForm()
  {
    [
      'session' => $session,
      'method' => $method,
      'action' => $action,
      'inputs' => $inputs
    ] = $this->formSettings;
    
    require "app/views/create_form.php";
  }

  public function editForm(string $id)
  {
    [
      'session' => $session,
      'method' => $method,
      'action' => $action,
      'inputs' => $inputs
    ] = $this->formSettings;

    $action = "users/edit/{$id}";
    
    $inputs[] = new Select(
      name: "status",
      label: "Status",
      options: ["ativo", "inativo"],
    );

    $inputsValues = UsersModel::getUsers(
      columns: [
        "nome_fun",
        "login_fun",
        "senha_fun",
        "funcao_fun",
        "status_fun"
      ],
      conditions: ["cod_fun = {$id}"]
    );

    foreach($inputs as $input) {
      $input->setHtmlAttributes(
        ...["value" => $inputsValues[0][$input->name]]
      );
    }

    require "app/views/update_form.php";
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