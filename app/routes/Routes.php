<?PHP

namespace App\routes;

interface Routes
{
  const routes = [
    "GET" => [
      "/" => "Login@index",
      "/home" => "Home@index"
    ],
    "POST" => [
      "/login" => "Login@login"
    ]
  ];
}