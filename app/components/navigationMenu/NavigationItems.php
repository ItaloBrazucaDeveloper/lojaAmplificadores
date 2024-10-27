<?PHP

namespace App\components\navigationMenu;

interface NavigationItems
{
  const NAVIGATION_ITEMS = [
    [
      'text' => 'Vendas',
      'href' => 'vendas'
    ],
    [
      'text' => 'Amplificadores',
      'href' => 'amplificadores'
    ],
    [
      'text' => 'Relatórios',
      'href' => 'relatorios'
    ],
    [
      'text' => 'Funcionários',
      'href' => 'funcionarios'
    ],
  ];
}