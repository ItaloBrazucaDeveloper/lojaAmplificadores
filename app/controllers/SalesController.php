<?PHP

namespace App\controllers;

class SalesController
{
  public function index()
  {
    require "app/views/sales.php";
  }

  public function createForm()
  {
    require "app/views/create_form.php";
  }
}