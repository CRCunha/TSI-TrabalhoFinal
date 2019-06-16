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
    <link rel="stylesheet " href="CSS/NORMALIZE/NORMALIZE.css ">
    <link rel="stylesheet " href="CSS/HEADER/header.css ">
    <link rel="stylesheet " href="CSS/MAIN/main.css ">
    <link rel="stylesheet " href="CSS/MAIN/quadros.css ">
    <link rel="stylesheet " href="CSS/MODAL/modal.css ">
    <link rel="stylesheet " href="CSS/MODAL/modal2.css ">
    <script src="JS/modal.js " type="text/JavaScript "></script>
    <!--FONTES-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap " rel="stylesheet ">

    <!--FAV ICON-->
    <link rel="shortcut icon " href=" " />
</head>

<body>
    <header>
        <div class="infos ">
            <div class="container ">
                <div class="l-side ">
                    <div class="top ">Welcome User</div>
                    <div class="bot ">Welcome to LPW project - IFSul - Pelotas</div>
                </div>
                <div class="r-side ">
                    <div class="info " onclick="abrir2() ">Login / Register</div>
                    <div class="avatar ">
                        <div class="img "></div>
                    </div>
                    <div class="carrinho ">
                        <img src="IMG/HEADER/carrinho.png " onclick="abrir() ">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="title">Produtos</div>
        <div class="content ">
            <!-- Produtos -->
            <?php 
                include("quadros.php");
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
        </div>
    </div>  
</body>

</html>