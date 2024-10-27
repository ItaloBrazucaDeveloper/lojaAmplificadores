<?PHP

namespace App\controllers;
require_once "autoload.php";
use App\models\LoginModel;
use App\components\navigationMenu\NavigationMenu;

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

    $isValidLogin = LoginModel::authenticate($username, $password);

    if ($isValidLogin) {

    }
  }
}