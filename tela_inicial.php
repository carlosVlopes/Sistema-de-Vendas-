<?php

    include('protect.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telainicial.css">
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
                <button>Vendas</button>
            </section>
            <section class="card">
                <img src="image/caixa.png" alt="">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Simili</span>
                <button>Cadastrar Vendas</button>
            </section>
            <section class="card">
                <img src="image/avatar.png" alt="">
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Simili</span>
                <button>Criar novo Usuário</button>
            </section>
        </div>
        <button class="btnSair">
            <a href='logout.php'>Sair</a>
        </button>



    </div>


    
</body>
</html>