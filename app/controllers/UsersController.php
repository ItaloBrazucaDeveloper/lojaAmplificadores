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
    if (!$response)
      return [[], []];

    $headers = [
      "Nome",
      "Login",
      "Função",
      "Status",
      "Ações"
    ];

    $usersData = [];
    while ($userTableRow = $response->fetch_assoc()) {
      $userTableRow["actions"] = "
        <div>
          <img height='20px' src=\"assets/svg/edit_row.svg\" alt=\"editar\" />
          <img height='20px' src=\"assets/svg/remove_row.svg\" alt=\"remover\" />
        </div>
      ";
      $usersData[] = $userTableRow;
    }

    return [
      $headers,
      $usersData
    ];
  }

  public function create()
  {

  }

  public function edit()
  {

  }
}