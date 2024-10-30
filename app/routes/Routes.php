<?PHP

namespace App\routes;

interface Routes
{
  const routes = [
    "GET" => [
      "/" => "Login@index",
      "/home" => "Home@index",
      
      /* Users */
      "/users" => "Users@index",
      "/users/create" => "Users@createForm",
      "/\/users\/edit\/:id(\d+)/" => "Users@editForm",

      /* Amplifiers */
      "/amplifiers" => "Amplifiers@index",
      "/amplifiers/create" => "Amplifiers@createForm",
      "/\/amplifiers\/edit\/:id(\d+)/" => "Amplifiers@editForm",

      /* Sales */
      "/sales" => "Sales@index",
      "/sales/create" => "Sales@createForm",

      /* Reports */
      "/reports" => "Reports@index",
      "/reports/create" => "Reports@createForm",
    ],
    "POST" => [
      "/login" => "Login@login",

      /* Users */
      "/users/create" => "Users@create",
      "/users/edit/:id" => "Users@edit",

      /* Amplifiers */
      "/amplifiers/create" => "Amplifiers@create",
      "/amplifiers/edit/:id" => "Amplifiers@edit",
    ]
  ];
}