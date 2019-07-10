
<?php
    session_start();
    require "function.php";
    require "conecta.php";
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
                    <?php ?>

                    
                    <?php if (isLoggedIn()): ?>
                        <div class="top">Olá <?php echo $_SESSION['nome']; ?> <a id="logout" href="logout.php">Deslogar</a></div>
                    <?php else: ?>
                        <div class="top">Olá User</div>

                    <?php endif; ?>
                <!-- <div class="bot ">LPW Project - IFSul - Cristian, Filipe</div>-->
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
        <div class="title">Produtos Destaques</div>
        <div class="content ">
            <!-- Produtos -->
            <?php 
                include("conecta.php");
                include("consulta.php");
            ?>
        </div>
    </main>
    <div  class="modal ""> 
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
                <?php

                    
                        if(!isset($_SESSION['itens'])){
                            $_SESSION['itens'] = array();
                        }

                        if(isset($_GET['add']) && $_GET['add'] == 'carrinho'){
                            /*Adiciona ao carrinho*/
                            $idProduto=$_GET['id'];
                            if(!isset($_SESSION['itens'][$idProduto])){
                                $_SESSION['itens'][$idProduto] =1;
                            }else{
                                $_SESSION['itens'][$idProduto] +=1;
                            }
                        }
                        if(count($_SESSION['itens']) == 0 ){
                            echo "Carrinho vazio<br><a href='index.php'>Adicionar itens</a>";
                        }else{
                            var_dump($_SESSION['itens']);
                            /**Exibindo o carrinho*/
                            foreach($_SESSION['itens'] as $idproduto => $quantidade){
                                $query=$link->prepare('select * from produto where id=?');
                                $query->bindParam(1,$idProduto);
                                $query->execute();
                                $produto = $query->fetchAll();
                                echo("<div class='produto-carrinho'>");
                                echo $produto[0]["nome"]."<br>";
                                echo("</div>");
                                
                            }
                        }
                    
                ?>
                <form action="" method="post">
                    <input type="submit" name="enviar" value="Finalizar Compra">
                </form>
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
                    <input type="submit" name="enviar" value="Registrar">
                </form>
                <form action="login.php" method="POST" id="login-form">
                    <input type="email" name="email" id="" placeholder="Email:"  autocomplete="off">
                    <input type="password" name="senha" id="" placeholder="Senha:" autocomplete="off">
                    <input type="submit" name="enviar" value="Logar">
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
                <form  action="produtos.php" method="POST">
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