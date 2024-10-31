<?PHP

namespace App\routes;

class Router implements Routes
{
  private static function callController(string $controllName, string $method, array $params = [])
  {
    $controllName .= "Controller";
    $controllPath = "App\\controllers\\{$controllName}";

    if (!class_exists($controllPath)) {
      self::call404Page();
    }

    $controlIntance = new $controllPath();
    $controlIntance->$method(...$params);
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

    $uriNoSiteName = preg_replace(
      pattern: '/^.*\/loja_amp/',
      replacement: '',
      subject: $uri
    );

    return $uriNoSiteName;
  }

  public static function route()
  {
    $uriNoSiteName = self::getUriNoSiteName();
    $method = $_SERVER["REQUEST_METHOD"];
    
    // Procura por rota exata primeiro
    if (isset(Routes::routes[$method][$uriNoSiteName])) {
      $controllerNameAndMethod = Routes::routes[$method][$uriNoSiteName];
      [$controller, $method] = explode("@", $controllerNameAndMethod);
      self::callController($controller, $method);
      return;
    }

    // Procura por rotas com padrões dinâmicos
    foreach (Routes::routes[$method] as $pattern => $handler) {
      // Verifica se é uma rota com padrão regex (começa com # e termina com #)
      if (strlen($pattern) > 0 && $pattern[0] === '#') {
        if (preg_match($pattern, $uriNoSiteName, $matches)) {
          [$controller, $method] = explode("@", $handler);
          // Remove o match completo, mantendo apenas os grupos capturados
          array_shift($matches);
          self::callController($controller, $method, $matches);
          return;
        }
      }
    }

    self::call404Page();
  }
}