<?PHP

namespace App\controllers;

class HomeController
{
  public function index()
  {
    require "app/views/home.php";
  }

  public function about()
  {
    require "app/views/about.php";
  }
}
