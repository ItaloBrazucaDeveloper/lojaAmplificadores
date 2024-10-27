# Sistema de balcão para uma loja de amplificadores

## Descrição

O sistema de balcão de uma loja de amplificadores é um sistema trabalhado no curso técnico de informática - Matéria de Desenvolvimento WEB. O sistema permite o Cadastro/Atualização/Listagem/Remoção de funcionários, amplificadores, vendas, realátorios. Além disso, existe uma divisão entre o que cada funcionário(vendedor, estoquista e administrador) consegue fazer no sistema.

## Sobre a estrutura do projeto

- Utilização de um sistema de autoload
  - Inserido nos arquivos de classes um namespace
  - Configurada a função `spl_autoload_register`
- Utilização de um sistema de rotas
  - Classe para gerenciar as rotas
  - Arquivo `.htaccess` para redirecionar todas as requisições não encontradas para o index.php
  - Interface com uma constante que armazena as rotas
- Utilização do sistema MVC (Model-View-Controller)
  - Classes para os modelos e os controllers

## O que tem em cada pasta

- `app`: Contém os arquivos da aplicação
  - `app/components`: Contém os componentes do sistema
  - `app/controllers`: Contém os controllers do sistema
  - `app/database`: Contém os arquivos de conexão e manipulação com o banco de dados
  - `app/helpers`: Contém as classes utilitárias do sistema
  - `app/models`: Contém as classes que trazem o necessário para cada view do sistema
  - `app/routes`: Contém as rotas do sistema
  - `app/views`: Contém as páginas do sistema
- `assets`: Contém os arquivos estáticos do sistema
  - `assets/css`: Contém os arquivos de CSS do sistema
  - `assets/images`: Contém as imagens do sistema

## Tecnologias

- PHP
- MySQL
- HTML
- CSS