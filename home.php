<?php

session_start();
include('verificarLogin.php');

include('conexao.php');


$sql = "SELECT * FROM funcionario";
$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);

?>
<p>
<p>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Listar Usuário</title>
		<meta charset="UTF-8">
	</head>

	<body>
		<?php
		if (isset($_GET['m'])) { //existe conteúdo na variavel
			echo $_GET['m'] . "<br/>"; //imprimindo a msg de erro
		}

		?>
		<!-- Menu -->
		| <a href="cadastrar.php">CADASTRAR USUÁRIO</a>|
		| <a href="logout.php">Sair da seção</a>|
		<!-- Fim-Menu -->

		<h3>Listar Usuário</h3>

		<table border="1">

			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Login</th>
				<th colspan="3">Ações</th>
			</tr>

			<?php
			do {
			?>
				<tr>
					<td><?php echo $arResultado['idFuncionario']; ?></td>
					<td><?php echo $arResultado['nome_completo']; ?></td>
					<td><?php echo $arResultado['email']; ?></td>

					<td>
						<a href="visualizar.php?a=<?php echo $arResultado['idFuncionario']; ?>">Visualizar</a>
					</td>
					<td>
						<a href="editar.php?a=<?php echo $arResultado['idFuncionario']; ?>">Editar</a>
					</td>
					<td>
						<a href="excluir.php?a=<?php echo $arResultado['idFuncionario']; ?>">Excluir</a>
					</td>
				</tr>

			<?php
			} while ($arResultado = mysqli_fetch_assoc($resultado));
			?>




		</table>
		<p>
			<a href="index.php">+ Novo Usuário</a>
		</p>
	</body>

	</html>