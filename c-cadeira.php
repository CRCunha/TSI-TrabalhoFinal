<?php
    session_start();
    require 'conecta.php';
    require 'function.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trabalho PHP + AJAX</title>
    <!--METAS-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="web, developer, design, layout, UI, UX">
    <meta name="language" content="PT-BR">
    <meta name="author" content="Nome">
    <meta name="robots" ontent="noindex">
    <meta name="googlebot" content="noindex">
    <!--LINKS-->
    <link rel="stylesheet" href="CSS/GERAL/GERAL.css" ">
    <link rel="stylesheet" href="CSS/NORMALIZE/NORMALIZE.css ">
    <link rel="stylesheet" href="CSS/HEADER/header.css ">
    <link rel="stylesheet" href="CSS/MAIN/main.css ">
    <link rel="stylesheet" href="CSS/MAIN/quadros.css ">
    <link rel="stylesheet" href="CSS/MODAL/modal.css ">
    <link rel="stylesheet" href="CSS/MODAL/modal2.css ">
    <link rel="stylesheet" href="CSS/MODAL/modal3.css ">
    <link rel="stylesheet" href="CSS/BUSCA/busca.css ">
    <link rel="stylesheet" href="CSS/FOOTER/footer.css">
    <link rel="stylesheet" href="CSS/MOBILE/mobile.css">
    <script src="JS/modal.js " type="text/JavaScript "></script>
    <script src="JS/log-reg.js " type="text/JavaScript "></script>
    <!--FONTES-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap " rel="stylesheet ">
    <!--FAV ICON-->
    <link rel="shortcut icon " href="IMG/fav.png" />
</head>

<body>
    <header>
        <div class="infos ">
            <div class="container ">
                <div class="l-side ">
                <?php if (isLoggedIn()): ?>
                        <div class="top">Olá <?php echo $_SESSION['nome']; ?> <a id="logout" href="logout.php">Deslogar</a></div>
                    <?php else: ?>
                        <div class="top">Olá User</div>
                    <?php endif; ?>
                </div>
                <div class="r-side ">
                    <div class="info " onclick="abrir2() ">Login / Register</div>
                    <div class="avatar ">
                        <a href="user.php">
                            <div class="img "></div>
                        </a>
                    </div>
                    <div class="carrinho ">
                        <img src="IMG/HEADER/carrinho.png " onclick="abrir() ">
                    </div>
                    <div style="margin-left: 25px" class="carrinho ">
                        <img src="IMG/HEADER/add.png " onclick="abrir3() ">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="busca">
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="c-mouse.php">Mouse</a>
            <a href="c-teclado.php">Teclado</a>
            <a href="c-headset.php">HeadSet</a>
            <a href="c-cadeira.php">Cadeira</a>
            <a href="c-controle.php">Controle</a> 
            <a href="c-console.php">Console</a>
            <a href="c-monitor.php">Monitor</a>
        </div>
    </div>
    <main>
        <div class="title">Produtos</div>
        <div class="content ">
            <!-- Produtos -->
			<?php
				include("conecta.php");

				$sql = "select * from produto WHERE categoria = 'cadeira'";
				try {
					$consulta = $link->prepare($sql);
					$consulta->execute();
					while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
						$nome = utf8_decode($registro['nome']);
						$categoria = utf8_decode($registro['categoria']);
						$imagem = utf8_decode($registro['imagem']);
						$preco = utf8_decode($registro['preco']);
					
						echo"
						<div class='quadro'>
						<div class='top '  style='background-image: url($imagem); background-size: 60%; background-position: center; background-repeat: no-repeat;
						border-top-left-radius: 8px; border-top-right-radius: 8px'></div>
						<div class='bot '>
							<div class='container '>
								<div class='info '>$nome <div class='preco'>$preco R$</div></div>
								<div class='info2 '> ";?>
									<a href="c-cadeira.php?add=carrinho&id=<?=$registro['id']?>"><div class='img1 '></div></a>
								<?php echo "<div class='img2 '><img src='../IMG/CATEGORIAS/$categoria.png'></div>
								</div>
							</div>
						</div>
					</div>
						";?>
                        <?php
					}
				}
				catch(PDOException $ex){
					echo($ex->getMessage());
				}
			?>
        </div>
    </main>
    <div  class="modal ">
        <div class="container ">
            <div class="header ">
                <div class="content ">
                    <div class="left "></div>
                    <div class="center ">Carrinho de Compras</div>
                    <div class="right ">
                        <img onclick="fechar() " src="IMG/MODAL/close.png ">
                    </div>
                </div>
            </div>
            <div class="carrinho-p">
                <div class='produto-carrinho'>
                <div class='info-produtos'>Nome</div>
                <div class='info-produtos'>Valor</div>
                <div class='info-produtos'>Categoria</div>
                </div>
                <?php

                    
                        if(!isset($_SESSION['itens'])){
                            $_SESSION['itens'] = array();
                            $_SESSION['armazenaId'] = array();
                        }
                        
                        if(isset($_GET['add']) && $_GET['add'] == 'carrinho'){
                            /*Adiciona ao carrinho*/
                            $idProduto=$_GET['id'];

                            array_push($_SESSION['armazenaId'],$idProduto);

                            if(!isset($_SESSION['itens'][$idProduto])){
                                $_SESSION['itens'][$idProduto] =1;
                            }else{
                                $_SESSION['itens'][$idProduto] +=1;
                            }
                        }
                        if(count($_SESSION['itens']) == 0 ){
                            echo("<div class='vazio'>");
                            echo "Carrinho vazio<br>";
                            echo("<a href='index.php'>Adicionar itens</a>");
                            echo("</div>");
                        }else{
                            //var_dump($_SESSION['itens']);
                            /*Montando a consulta */

                            $query = "SELECT * FROM produto WHERE id IN (";
                            $query_aux="";
                            /*Montando a sengunda parte da query*/
                            for ($i=0; $i < count($_SESSION['armazenaId']) ; $i++) { 
                                $query_aux .= $_SESSION['armazenaId'][$i];
                                if($i < count($_SESSION['armazenaId'])-1){
                                    $query_aux .=",";
                                }else{
                                    $query_aux .="";
                                }
                            }
                            $query_aux.=")";
                            $query .=$query_aux;
                            
                            try{
                                $consulta=$link->prepare($query);
                                $consulta->execute();
                                $resultado=$consulta->fetchAll();
                                //echo "Requisição ok";
                            }catch(PDOException $ex){
                                echo"Erro na requisição:".$query;
                            }
                            ?>
                            
                            <?php 
                            $valorTotal = 0;
                            foreach($resultado as $key=>$value):
                                echo("<div class='produto-carrinho'>");
                                    echo("<div class='info-produtos'>");
                                        echo($value['nome']);
                                    echo("</div>");
                                    echo("<div class='info-produtos'>");
                                        echo($value['preco']. " R$");
                                        $valor = $value['preco'];
                                    echo("</div>");
                                    echo("<div class='info-produtos'>");
                                        $imgProdutoCarrinho = $value['categoria'];
                                        echo("<img src='../IMG/CATEGORIAS/$imgProdutoCarrinho.png'>");
                                    echo("</div>");
                                    echo("<div class='info-produtos'>");
                                        $imagemProduto = $value['imagem'];
                                        echo("<a href='$imagemProduto' Target='_blank'>Visualizar</a>");
                                    echo("</div>");
                                    echo("<div class='info-produtos'>");
                                        echo("<div class='excluir'>");
                                            echo("<div class='img-excluir'>X</div>");
                                        echo("</div>");
                                    echo("</div>");
                                echo("</div>");
                                $valorTotal = $valorTotal + $valor;
                            endforeach;

                            echo("<div class='valor-total'> Valor Total: <div class='valor'> $valorTotal R$</div>");
                            echo("</div>");
                            ?>
                            
                        <?php
                        }
                        ?>
                    
                <?php if(isLoggedIn() && count($_SESSION['itens']) > 0):?>
                <form action="" method="post">
                    <input type="submit" name="enviar" value="Finalizar Compra">
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>  

    <div class="modal2 ">
        <div class="container ">
            <div class="header ">
                <div class="content ">
                    <div class="left "></div>
                    <div class="center ">Login / Register</div>
                    <div class="right ">
                        <img onclick="fechar2() " src="IMG/MODAL/close.png ">
                    </div>
                </div>
            </div>
            <div class="escolha">
                <div class="btn" id="btn-log" onclick="log() ">Login</div>
                <div class="btn" id="btn-reg"  onclick="reg() ">Register</div>
            </div>
            <div class="modal2-contents">
                <form action="register.php" method="POST" id="register-form">
                    <input type="text" name="nome" id="" placeholder="Nome:"  autocomplete="off">
                    <input type="email" name="email" id="" placeholder="Email:"  autocomplete="off">
                    <input type="password" name="senha" id="" placeholder="Senha:" autocomplete="off">
                    <input type="submit" name="enviar" value="Enviar">
                </form>
                <form action="login.php" method="POST" id="login-form">
                    <input type="email" name="email" id="" placeholder="Email:"  autocomplete="off">
                    <input type="password" name="senha" id="" placeholder="Senha:" autocomplete="off">
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </div>
        </div>
    </div>  

    <div class="modal3 ">
        <div class="container ">
            <div class="header ">
                <div class="content ">
                    <div class="left "></div>
                    <div class="center ">Adicionar Produto</div>
                    <div class="right ">
                        <img onclick="fechar3() " src="IMG/MODAL/close.png ">
                    </div>
                </div>
            </div>
            <div class="content-main">
                <form   method="POST">
                    <input type="text" name="nome" id="" placeholder="Nome:"  autocomplete="off">
                    <input type="text" name="categoria" id="" placeholder="Categoria:"  autocomplete="off">
                    <input type="number" name="preco" id="" placeholder="Preço:" autocomplete="off" step="0.01">
                    <input type="text" name="imagem" id="" placeholder="Imagem:" autocomplete="off">
                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">Made by Cristian / Filipe  © 2019</div>
    </footer>
</body>

</html>
