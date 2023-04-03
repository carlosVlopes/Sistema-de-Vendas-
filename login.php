<?php
    include("conexao.php");
    require_once 'functions/Verificar.php';
    
    if(isset($_POST['btnLogin'])){
        $nome_usuario = ltrim(trim($_POST['nome_usuario']));
        $senha = ltrim(trim($_POST['senha']));

        $objVerificar = new Verificar();
        $resultado = $objVerificar->Verificacao($nome_usuario,$senha);

        if($resultado == -1){
            $msgError = "Preencha o campo de Usuário!";
        }
        elseif($resultado == -2){
            $msgError = "Preencha o campo de Senha!";
        }
        else{
            // limpar string para evitar falhas de verificação
            $nome_usuario = $mysqli->real_escape_string($_POST['nome_usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            // pegar os dados da tabela Usuários
            $sql_code = "SELECT * FROM usuarios WHERE usuario = '$nome_usuario' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ");

            // verificar quantidades de registros na tabela
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario'] = $usuario['usuario'];

                header('Location: tela_inicial.php');

            }
            else{
                $msgError = 'Falha ao Logar! Usuário ou Senha incorretos';
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_Login.css">
    <title>Login</title>
</head>
<body>
    <div class="main_login">
        <div class="left_login" >
            <h1>Cantinho Gelado</h1>
            <img src="image/sorvete.png" alt="Sorveteria" class="sorveteria" width="290px">
        </div>
        <div class="right_login">
            <form action="login.php" method="post" class="card_login">
                <h2>Login</h2>
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="nome_usuario" placeholder="Usuário" value="<?= isset($nome_usuario) ? $nome_usuario : '' ?>">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" value="<?= isset($senha) ? $senha : '' ?>">
                    </div>
                    <button class="btnLogin" name="btnLogin">Login</button>
                    <span><?= isset($msgError) ? $msgError : '' ?></span>
            </form>
        </div>
    </div>
</body>
</html>