<?php

    require_once 'DAO/UsuarioDAO.php';

    if(isset($_POST['btnSalvar'])){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $rsenha = $_POST['rsenha'];

        $dao = new UsuarioDAO();
        $ret = $dao->CadastrarNovoUsuario($nome,$senha,$rsenha);
        if($ret == -1){
            $msg = 'Preencha o campo nome!';
        }
        elseif($ret == -2){
            $msg = 'Preencha o campo senha!';
        }
        elseif($ret == -3){
            $msg = 'Preencha o campo repita sua senha!';
        }
        elseif($ret == -4){
            $msg = 'As senhas deverão ser iguais!';
        }
        elseif($ret == -5){
            $msg = 'A senha deve conter no minímo 6 caracteres!';
        }
        elseif($ret == -6){
            $msg = 'Esse nome de usuário já existe, coloque outro nome!';
        }
        elseif($ret == 1){
            $msg = 'Usuário Cadastrado com sucesso!';
        }
        else{
            $msg = 'Ocorreu algum erro na operação!';
        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/novo_usuario.css">
    <title>Vendas</title>
</head>
<body>
    <div class="main">
        <form action="novo_usuario.php" method="post">
            <label>Cadastrar Novo Usúario</label>
            <br>
            <?= isset($msg) ? $msg : '' ?>
            <br>
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Escreva seu nome aqui!" value="<?= isset($nome) ? $nome : ''?>">
            <br>
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Escreva sua senha aqui!" value="<?= isset($senha) ? $senha : ''?>">
            <br>
            <label>Repita sua senha: </label>
            <input type="password" name="rsenha" placeholder="Repita sua senha!" value="<?= isset($rsenha) ? $rsenha : ''?>">
            <br>
            <button name="btnSalvar">SALVAR</button>
        </form>
    </div>
</body>
</html>