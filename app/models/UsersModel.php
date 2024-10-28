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
        "nome_fun",
        "login_fun",
        "funcao_fun",
        "status_fun",
      ]
    );

    Database::close();
    return $response;
  }

  public function createUser($user)
  {
    $this->initConnection();

    $reponse = Database::create(

    );

    Database::close();
  }

  public function updateUser($user)
  {
    $this->initConnection();

    $reponse = Database::update(

    );

    Database::close();
  }
}