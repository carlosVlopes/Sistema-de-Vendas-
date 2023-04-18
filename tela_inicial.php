<?php

    require_once 'DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();

    if(isset($_GET['close']) && $_GET['close'] == '1'){
        UtilDAO::Deslogar();
    }


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tela_Inicial.css">
    <title>Cantinho Gelado</title>
</head>
<body>
    <div class="main">
        <div class="header">
            <h1>Cantinho Gelado</h1>
            <span>Sistema de Vendas</span>
        </div>

        <div class="cards">
            <section class="card">
                <img src="image/dinheiro.png" alt="">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Simili</span>
                <a href="vendas.php">
                    <button>Vendas</button>
                </a>
            </section>
            <section class="card">
                <img src="image/caixa.png" alt="">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Simili</span>
                <a href="cadastrar_vendas.php">
                    <button>Cadastrar vendas</button>
                </a>
            </section>
            <section class="card">
                <img src="image/avatar.png" alt="">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Simili</span>
                <a href="novo_usuario.php">
                    <button>Cadastrar novo usuário</button>
                </a>
            </section>
        </div>
        <button class="btnSair">
            <a href='tela_inicial.php?close=1'>Sair</a>
        </button>

    </div>

</body>
</html>