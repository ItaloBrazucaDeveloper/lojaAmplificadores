<?PHP

namespace App\components\navigationMenu;

interface NavigationItems
{
  const NAVIGATION_ITEMS = [
    [
      'text' => 'Vendas',
      'href' => 'sales'
    ],
    [
      'text' => 'Amplificadores',
      'href' => 'amplifiers'
    ],
    [
      'text' => 'Relatórios',
      'href' => 'reports'
    ],
    [
      'text' => 'Funcionários',
      'href' => 'users'
    ],
  ];
}