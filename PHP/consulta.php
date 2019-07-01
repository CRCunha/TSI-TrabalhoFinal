<?php
include("conecta.php");
$sql = "select nome,categoria, imagem, preco from produto";
try {
	$consulta = $link->prepare($sql);
	$consulta->execute();
	while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
		$nome = utf8_decode($registro['nome']);
		$categoria = utf8_decode($registro['categoria']);
		$imagem = utf8_decode($registro['imagem']);
		$preco = utf8_decode($registro['preco']);

		echo("
		<div class='quadro'>
		<div class='top '  style='background-image: url($imagem); background-size: 60%; background-position: center; background-repeat: no-repeat;
		border-top-left-radius: 8px; border-top-right-radius: 8px'></div>
		<div class='bot '>
			<div class='container '>
				<div class='info '>$nome <div class='preco'>$preco R$</div></div>
				<div class='info2 '>
					<div class='img1 '></div>
					<div class='img2 '><img src='../IMG/CATEGORIAS/$categoria.png'></div>
				</div>
			</div>
		</div>
	</div>
		");
	}
}
catch(PDOException $ex){
	echo($ex->getMessage());
}
?>