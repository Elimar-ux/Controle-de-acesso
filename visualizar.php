<?php
// Validador de seção de Login
session_start();
include('conexao.php');
include('verificarLogin.php');


$id = $_GET['a']; // Recuperar o ID do usuário selecionado



// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
$sql = "SELECT * FROM funcionario";
$sql .= " WHERE idFuncionario = " . $id;
echo "<p>SQL: " . $sql;


$resultado = mysqli_query($conexao, $sql);

$arResultado = mysqli_fetch_assoc($resultado);




mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>

<head>
	<title>VISUALIZAR USUÁRIO</title>
</head>

<body>
	<h3>Visualizar usuário</h3>

	<table>
		<tr>
			<td>
				IdFuncionario: <?php echo $arResultado['idFuncionario'] ?><br /><br>
			</td>

		</tr>
		<tr>
			<br>
			<td>
				E-mail: <?php echo $arResultado['email'] ?><br /><br>
			</td>
		</tr>
	</table>

	<!-- ficaria melhor assim, devido não precisar fazer dentro de um form: 
		
				<h3>Visualizar usuário</h3>
					Nome: <?php echo $arResultado['nome'] ?><br/>

					Email: <?php echo $arResultado['email'] ?><br/>

					Senha: <?php echo $arResultado['senha'] ?><br/>

			</p> 
		-->
	<p>
		<button onclick="window.location.href='home.php'">VOLTAR</button>
	</p>

</body>

</html>