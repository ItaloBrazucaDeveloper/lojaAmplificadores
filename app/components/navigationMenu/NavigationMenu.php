<?PHP

namespace App\components\navigationMenu;

class NavigationMenu implements NavigationItems
{
  private static array $accessLevels = [
    'admin' => [0, 3], // fullAcess
    'vendedor' => [0, 2], // ["vendas", "amplificadores", "relatórios"]
    'estoquista' => [1, 2], // ["amplificadores", "relatórios"]
  ];

  public static function render(string $cargo = null): string
  {
    $nivelAcesso = self::$accessLevels[$cargo];
    $navigationItems = "";

    if ($nivelAcesso) {
      for ($index = $nivelAcesso[0]; $index <= $nivelAcesso[1]; $index++) {
        $navigationItemText = self::NAVIGATION_ITEMS[$index]["text"];
        $navigationItemLink = self::NAVIGATION_ITEMS[$index]["href"];

        $navigationItems .= self::renderNavigationItem(
          htmlspecialchars($navigationItemLink),
          htmlspecialchars($navigationItemText)
        );
      }
    }

    $navigationItems .= self::renderNavigationItem('logout', 'Sair');

    return "
      <nav class='navigation-menu'>
        <ul>
          {$navigationItems}
        </ul>
      </nav>
    ";
  }

  private static function renderNavigationItem(string $href, string $text): string
  {
    return "
      <li>
        <a href='{$href}'>{$text}</a>
      </li>
    ";
  }
}