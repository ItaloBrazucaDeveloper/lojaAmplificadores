<?PHP

namespace App\routes;

interface Routes
{
  const routes = [
    "GET" => [
      "/" => "Login@index",
      "/home" => "Home@index",
      "/users" => "Users@index"
    ],
    "POST" => [
      "/login" => "Login@login",
      "/users" => "Users@create",
      "/users/:?id" => "Users@edit"
    ]
  ];
}