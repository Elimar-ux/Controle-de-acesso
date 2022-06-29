<?php

session_start();
include('conexao.php');
include('verificarLogin.php');


// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$idFuncionario = $_POST['codigo'];

	
		
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS OBRIGATORIOS ESTÃO PREENCIDOS
	if($idFuncionario == ""){
		echo "<br>Campos obrigatorio não preenchido";
	}else{
		echo "<br>Campos preenchido";
	}
	

	
	if($conexao){
		echo "<p>Conexão realizad com sucesso";
	}else{
		echo "<p>Falha na conexão com o BD";
	}
	
// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
	$sql = "DELETE FROM funcionario ";
	$sql .= " WHERE idFuncionario = " . $idFuncionario;
	
	echo "<p>SQL: " . $sql;

	
	$resultado = mysqli_query($conexao, $sql);
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
		//NSA
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	if($resultado){
		$msg = "<p> Usuário deletado com sucesso.";
		header("Location: index.php");
	}else{
		echo "<p> Falha ao cadastrar usuário. Verifique!";
	}


	
?>








