<?php
   
   require_once 'DAO/UsuarioDAO.php';
    
    if(isset($_POST['btnLogin'])){
        $nome_usuario = trim($_POST['nome_usuario']);
        $senha = trim($_POST['senha']);

        $dao = new UsuarioDAO();
        $ret = $dao->ValidarLogin($nome_usuario,$senha);

        if($ret == -1){
            $msgError = "Preencha o campo de Usuário!";
        }
        elseif($ret == -2){
            $msgError = "Preencha o campo de Senha!";
        }
        else{
            
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