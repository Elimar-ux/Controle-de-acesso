<?php

session_start();
include('conexao.php');
include('verificarLogin.php');


// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['pass']);
	$senhaConf = md5($_POST['passConfirma']);
	
		
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS OBRIGATORIOS ESTÃO PREENCIDOS
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
	$sql = "UPDATE funcionario SET nome_completo = '$nome', ";
	$sql .= " email = '$email', senha= '$senha' ";
	$sql .= " WHERE idFuncionario = " . $_POST['id'];
	
	echo "<p>SQL: " . $sql;
	
// 7. EXECUTAR SCRIPT SQL
	/* mysqli_query(
			LINK DE CONEXAO AO SERVIDOR DE BD, 
			COMANDO DO BD);
	*/
	$resultado = mysqli_query($conexao, $sql);
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
		//NSA
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	if($resultado){
		//echo "<p> Usuário '$nome' cadastrado com sucesso.";
		header("Location: index.php");
	}else{
		echo "<p> Falha ao cadastrar usuário. Verifique!";
	}

// 10. APRESENTAR OS DADOS
	
// 11. FECHAR CONEXÃO COM O BD
	
?>
