<?php
date_default_timezone_set('America/Sao_Paulo');
include("conecta.php");
include("like.php");
if(isset($_POST['enviar'])){
	$nome = utf8_encode($_POST['nome']);
	$categoria = utf8_encode($_POST['categoria']);
	$imagem = utf8_encode($_POST['imagem']);
	$preco = utf8_encode($_POST['preco']);

	$sql = "INSERT INTO produto (nome, categoria, imagem, preco) VALUES ('$nome','$categoria', '$imagem', '$preco')";
	try {
		$consulta = $link->prepare($sql);
		$consulta->execute();
		header("Location:../index.php");
	}
	catch(PDOException $ex){
		echo($ex->getMessage());
	}
}
?>