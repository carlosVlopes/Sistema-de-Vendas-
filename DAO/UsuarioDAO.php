<?php

    require_once 'DAO/Conexao.php';
    require_once 'DAO/UtilDAO.php';

    class UsuarioDAO extends Conexao{

        public function ValidarLogin($nome, $senha){
            if($nome == ''){
                return -1;
            }
            elseif($senha == ''){
                return -2;
            }
            else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'select id_usuario,
                                nome_usuario
                                from tb_usuarios
                                where nome_usuario = ?
                                and senha_usuario = ?';
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$nome);
                $sql->bindValue(2,$senha);
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $user = $sql->fetchAll();
                if(count($user) == 0){
                    return -3;
                }else{
                    $cod = $user[0]['id_usuario'];
                    $nome = $user[0]['nome_usuario'];
                    UtilDAO::CriarSessao($cod,$nome);
                    header('location: tela_inicial.php');
                    exit;
                }
            }
        }

        public function VerificarNome($nome){
            if(trim($nome) == ''){
                return -1;
            }
            else{
                $conexao = parent::retornarConexao();
                $comando_sql = 'select count(nome_usuario) as contar from tb_usuarios
                                where nome_usuario = ?';
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$nome);
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $contar = $sql->fetchAll();
                return $contar[0]['contar'];
            }
        }


        public function CadastrarNovoUsuario($nome,$senha,$rsenha){
            if($nome == ''){
                return -1;
            }
            elseif($senha == ''){
                return -2;
            }
            elseif($rsenha == ''){
                return -3;
            }
            elseif($senha != $rsenha){
                return -4;
            }
            elseif(strlen($senha) < 6){
                return -5;
            }
            elseif($this->VerificarNome($nome) != 0){
                return -6;
            }
            else{
                $conexao = parent::retornarConexao();
                $comando_sql = "insert into tb_usuarios(nome_usuario,senha_usuario)
                                values (?, ?)";
                $sql = new PDOStatement();
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1,$nome);
                $sql->bindValue(2,$senha);
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                try {
                    $sql->execute();
                    return 1;
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    return 0;
                }
            }
        }


    }










?>