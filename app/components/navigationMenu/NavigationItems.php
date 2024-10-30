<?PHP

namespace App\components\navigationMenu;

interface NavigationItems
{
  const NAVIGATION_ITEMS = [
    [
      'text' => 'Vendas',
      'href' => '/loja_amp/sales'
    ],
    [
      'text' => 'Amplificadores',
      'href' => '/loja_amp/amplifiers'
    ],
    [
      'text' => 'Relatórios',
      'href' => '/loja_amp/reports'
    ],
    [
      'text' => 'Funcionários',
      'href' => '/loja_amp/users'
    ],
  ];
}