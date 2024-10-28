<?PHP
session_start();
require "../src/functions/valida_sessao.php";
include "../src/views/menu_global.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Relatórios</title>
	<link rel="stylesheet" href="../assets/css/global.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
	<div id="principal">

		<div id="topo">
			<div id="logo">
				<h1> ROCK N´ROLL </h1>
				<h1> Amplificadores </h1>
			</div>
			<div id="menu_global" class="menu_global">
				<p align="right"> Olá </p>
			</div>
		</div>

		<div id="conteudo_especifico">
			<h1> RELATÓRIOS </h1>
			<ul type="none">
				<li><a href="rel_funcionarios.php">Relatório de Funcionários</a></li>
				<li><a href="rel_estoque.php">Relatório de amplificadores em estoque</a></li>
				<li><a href="rel_total_vendas.php">Faturamento total do mês</a></li>
			</ul>
		</div>

		<div id="rodape">
			<div id="texto_institucional">
				<div id="texto_institucional">
					<h6> AMPLI - CONTROL </h6>
					<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6>
				</div>
			</div>

		</div>
	</div>
</body>

</html>