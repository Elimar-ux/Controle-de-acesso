<?php

session_start();
include('conexao.php');


$email = $_POST['email'];
$senha =  md5($_POST['pass']);

echo "<br> $email - $senha";


if ($email == "" or $senha == "") {

	$msg = "Campos obrigatórios vazio";
	header("Location: index.php?m=$msg");
	exit;
}

$sql = "SELECT email, senha FROM Funcionario";
$sql .= " WHERE email = '$email' ";
$resultado = mysqli_query($conexao, $sql);


$arResultado = mysqli_fetch_assoc($resultado);


$emailCadastrado = $arResultado['email'];
$senhaCadastrado = $arResultado['senha'];

echo "<br> $emailCadastrado - $senhaCadastrado";

if ($senha == $senhaCadastrado) {

	$_SESSION['email'] = $email;

	$msg = "Seja bem vindo";
	header("Location: home.php?m=$msg");
	exit;
} else {

	$msg = "Dados inválidos";
	header("Location: index.php?m=$msg");
	exit;
}


mysqli_close($conexao);
?>








