<?php
session_start();
include('conexao.php');


// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['pass']);
	$senhaConf = md5($_POST['passConfirma']);

	if($nome == "" OR  $email == "" OR $senha == "" OR $senhaConf == ""){
		echo "<br>Campos obrigatorio não preenchido";
	}else{
		echo "<br>Campos preenchido";
	}
	
	
	
	// 3.2. VERIFICAR SE AS SENHAS SÃO IGUAIS
	if($senha == $senhaConf){
		echo "<p>Senhas Iguais";
	}else{
		echo "<p>Senhas DIFERENTES";
	}
	
	if($conexao){
		echo "<p>Conexão realizad com sucesso";
	}else{
		echo "<p>Falha na conexão com o BD";
	}
	
// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
	$sql = "INSERT INTO funcionario (nome_completo, email, senha)";
	$sql .= " VALUES ('$nome', '$email', '$senha')";
	
	echo "<p>SQL: " . $sql;
	
	
	$resultado = mysqli_query($conexao, $sql);
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
		//NSA
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	if($resultado){
		echo "<p> Usuário '$nome' cadastrado com sucesso.";
		header("Location: index.php");
	}else{
		echo "<p> Falha ao cadastrar usuário. Verifique!";
	}

// 10. APRESENTAR OS DADOS
	
// 11. FECHAR CONEXÃO COM O BD
