<?PHP

namespace App\controllers;
use App\models\UsersModel;

class UsersController
{
  public function index()
  {
    [$headers, $rows] = $this->list();
    require "app/views/users.php";
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
      "Ações"
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
    header("Location: users?sucess={$successQueyUri}");
    exit;
  }

  public function edit()
  {

  }
}