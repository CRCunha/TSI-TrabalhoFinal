<?php
date_default_timezone_set('America/Sao_Paulo');
include("conecta.php");
//echo"antes do if";
if(isset($_POST['enviar'])){
    //echo"dentro do if";
	$nome = utf8_encode($_POST['nome']);
	$email = utf8_encode($_POST['email']);
	$senha = utf8_encode($_POST['senha']);


	$sql = "INSERT INTO cliente (nome, email, senha) VALUES ('$nome','$email', '$senha')";
	try {

		$consulta = $link->prepare($sql);
	
		$consulta->execute();
		echo ("Incluido com sucesso!");
		header("Location:../index.php");
	}
	catch(PDOException $ex){
		echo($ex->getMessage());
	}
}
?>