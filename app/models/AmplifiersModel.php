<?PHP

namespace App\models;
use App\database\Database;
use mysqli_result;

class AmplifiersModel
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

  private static function storePhotoOnTheServer(string $photoPath)
  {
    
  }

  public static function getAmplifiers(): bool|mysqli_result
  {
    self::initConnection();

    $response = Database::read(
      "amplificadores",
      [
        "cod_amp",
        "marca_amp",
        "tipo_amp",
        "modelo_amp",
        "preco_amp",
      ]
    );

    Database::close();
    return $response;
  }

  public static function createAmplifiers(array $amplifier)
  {
    self::initConnection();

    $reponse = Database::create(
      tableName: "amplificadores",
      columns: [
        "marca_amp",
        "modelo_amp",
        "preco_amp",
        "tipo_amp",
        "foto_amp"
      ],
      values: $amplifier
    );

    Database::close();
    return $reponse;
  }
}