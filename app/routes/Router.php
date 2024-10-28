<?PHP

namespace App\routes;

class Router implements Routes
{
  private static function callController(string $controllName, string $method)
  {
    $controllName .= "Controller";
    $controllPath = "App\\controllers\\{$controllName}";

    if (!class_exists($controllPath)) {
      self::call404Page();
      exit;
    }

    $controlIntance = new $controllPath();
    $controlIntance->$method();
  }

  private static function call404Page()
  {
    require "app/views/error_404.php";
    exit;
  }

  private static function getUriNoSiteName()
  {
    $uri = parse_url(
      url: $_SERVER["REQUEST_URI"],
      component: PHP_URL_PATH
    );

    $uriNoSiteName = str_replace(
      search: "/370738/lojaAmplificadores",
      replace: "",
      subject: $uri
    );

    return $uriNoSiteName;
  }

  public static function route()
  {
    $uriNoSiteName = self::getUriNoSiteName();
    $method = $_SERVER["REQUEST_METHOD"];
    $existRoute = isset(Routes::routes[$method][$uriNoSiteName]);

    !$existRoute && self::call404Page();

    $controllerNameAndMethod = Routes::routes[$method][$uriNoSiteName];
    [$controller, $method] = 
      explode("@", $controllerNameAndMethod);

    self::callController($controller, $method);
  }
}