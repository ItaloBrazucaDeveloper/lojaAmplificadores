<?PHP

namespace App\models;
use App\database\Database;
use mysqli_result;

class UsersModel
{
  private static function initConnection()
  {
    Database::connect(
      hostName: "localhost",
      userName: "root",
      userPasswd: "",
      databaseName: "370738"
    );
  }

  public static function getUsers(): bool|mysqli_result
  {
    self::initConnection();

    $response = Database::read(
      tableName: "funcionarios",
      columns: [
        "cod_fun",
        "nome_fun",
        "login_fun",
        "funcao_fun",
        "status_fun",
      ]
    );

    Database::close();
    return $response;
  }

  public static function createUser(array $user): bool
  {
    self::initConnection();

    $reponse = Database::create(
      tableName: "funcionarios",
      columns: [
        "nome_fun",
        "login_fun",
        "senha_fun",
        "funcao_fun"
      ],
      values: $user
    );

    Database::close();
    return $reponse;
  }

  public function updateUser($user)
  {
    $this->initConnection();

    $reponse = Database::update(

    );

    Database::close();
  }
}