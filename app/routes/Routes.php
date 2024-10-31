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
      "#^/users/edit/(\d+)$#" => "Users@editForm",

      /* Amplifiers */
      "/amplifiers" => "Amplifiers@index",
      "/amplifiers/create" => "Amplifiers@createForm",
      "#^/amplifiers/edit/(\d+)$#" => "Amplifiers@editForm",

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
      "#^/users/edit/(\d+)$#" => "Users@edit",

      /* Amplifiers */
      "/amplifiers/create" => "Amplifiers@create",
      "#^/amplifiers/edit/(\d+)$#" => "Amplifiers@edit",
    ]
  ];
}