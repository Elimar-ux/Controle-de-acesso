<?php

// Validador de seção de Login
session_start();
include('verificarLogin.php');
include('conexao.php');

// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)

$id = $_GET['a']; // Recuperar o ID do usuário selecionado


// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
$sql = "SELECT * FROM funcionario";
$sql .= " WHERE idFuncionario = " . $id;

$resultado = mysqli_query($conexao, $sql);

$arResultado = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html>

<head>
	<title>USUÁRIO</title>
</head>

<body>
	<!-- Menu -->
	| <a href="cadastrar.php">CADASTRAR USUÁRIO</a>|
	| <a href="home.php">Voltar</a>|
	<!-- Fim-Menu -->
	<h3>Excluir Usuário</h3>
	<p>Desejar realmente excluir este usuário? </p>

	<form method="post" action="cExcluir.php">
		<input type="hidden" name="codigo" value="<?php echo $arResultado['idFuncionario']; ?>">
		ID: <?php echo $arResultado['idFuncionario']; ?>
		<br />
		Nome: <?php echo $arResultado['nome_completo']; ?>
		<br />
		E-mail: <?php echo $arResultado['email']; ?>
		<br />
		<p>
			<input type="submit" value="EXCLUIR">
		</p>
	</form>
</body>

</html>