<?php
date_default_timezone_set('America/Sao_Paulo');
include("conecta.php");
include("like.php");
//echo"antes do if";
if(isset($_POST['enviar'])){
    //echo"dentro do if";
	$nome = utf8_encode($_POST['nome']);
	$categoria = utf8_encode($_POST['categoria']);
	$imagem = utf8_encode($_POST['imagem']);


	$sql = "INSERT INTO produto (nome, categoria, imagem) VALUES ('$nome','$categoria', '$imagem')";
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