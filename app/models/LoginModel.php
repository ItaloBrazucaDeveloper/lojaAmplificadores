<?PHP

namespace App\models;
use App\database\Database;

class LoginModel
{
  public static function authenticate(string $userName, string $password): array
  {
    Database::connect(
      hostName: "localhost",
      userName: "root",
      userPasswd: "",
      databaseName:"370738"
    );

    $response = Database::read(
      tableName: "funcionarios",
      columns: ["nome_fun", "funcao_fun"],
      conditions: [
        "login_fun" => $userName,
        "senha_fun" => $password
      ],
    );

    Database::close();

    return [
      "response" => $response->fetch_assoc(),
      "isValidUser" => $response->num_rows
    ];
  }
}