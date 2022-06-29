<?php
session_start();
include('conexao.php');
include('verificarLogin.php');



$id = $_GET['a']; // Recuperar o ID do usuário selecionado

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
	| <a href="logout.php">Sair da seção</a>|
	<!-- Fim-Menu -->
	<h3>Editar Usuário</h3>
	<form method="post" action="cEditar.php">
		ID: <?php echo $arResultado['idFuncionario']; ?>
		<input type="hidden" name="id" value="<?php echo $arResultado['idFuncionario']; ?>"><br />
		Nome: <input type="text" name="nome" value="<?php  echo $arResultado['nome_completo']; ?>" ><br/> 
		Email: <input type="text" name="email" placeholder="Informe o nome de e-mail"><br />
		Senha: <input type="password" name="pass" placeholder="informe a senha do usuário"><br />
		Confirme a senha: <input type="password" name="passConfirma" placeholder="Confirme e senha do usuário">
		<p>
			<input type="submit" value="EDITAR">
		</p>
	</form>
</body>

</html>