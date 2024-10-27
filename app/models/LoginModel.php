<?PHP

namespace App\models;
require_once "autoload.php";
use App\database\Database;

class LoginModel
{
  public static function authenticate(string $userName, string $password): bool
  {
    Database::connect(
      hostName: "localhost",
      userName: "root",
      userPasswd: "",
      databaseName: "370738"
    );

    $response = Database::read(
      tableName: "funcionarios",
      columns: ["nome_fun", "login_fun", "senha_fun"]
    );
    var_dump($response->fetch_assoc());
    Database::close();
    return $response;
  }
}