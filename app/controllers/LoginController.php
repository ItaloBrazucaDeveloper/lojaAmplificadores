<?PHP

namespace App\controllers;
require_once "autoload.php";
use App\Helpers\DataHygiene;
use App\models\LoginModel;

class LoginController
{
  public function index()
  {
    require "app/views/login.php";
  }

  public function login()
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $isValidUser = false;

    if (!DataHygiene::isEmptyString($username, $password)) {
      [
        "response" => $response,
        "isValidUser" => $isValidUser
      ] = LoginModel::authenticate($username, $password);

      $_SESSION["userSessionInfo"] = [
        "name" => $response["nome_fun"],
        "responsability" => $response["funcao_fun"]
      ];
    }

    $headerLocation = $isValidUser ? "home" : "./";

    header("Location: {$headerLocation}");
    exit();
  }
}