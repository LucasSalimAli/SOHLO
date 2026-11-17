<?php
require_once "src/models/Conection.class.php";
require_once "src/models/Usuario.class.php";
require_once "src/models/Endereco.class.php";
require_once "src/models/Telefone.class.php";
require_once "src/models/Cliente.class.php";
require_once "src/models/ClienteDAO.class.php";
require_once "src/models/Funcionario.class.php";
require_once "src/models/FuncionarioDAO.class.php";
require_once "src/models/Perfil.class.php";
require_once "src/models/PerfilDAO.class.php";


class AutenticacaoController
{
    public function login()
    {

        $msg = array("", "");

        if ($_POST) {
            $erro = false;

            if (empty($_POST["credencial"])) {
                $erro = true;
                $msg[0] = "Digite uma credencial";
            }

            if (empty($_POST["senha"])) {
                $erro = true;
                $msg[1] = "Digite uma senha";
            }

            if (!$erro) {
                $clienteTeste = new Cliente(email: $_POST["credencial"], senha: $_POST["senha"]);
                $clienteDAO = new ClienteDAO();
                $return = $clienteDAO->verificarCliente($clienteTeste);
                $tipo = "Cliente";

                if (!is_array($return) || !count($return) > 0) {
                    $funcionarioTeste = new Funcionario(email: $_POST["credencial"], senha: $_POST["senha"]);
                    $funcionarioDAO = new FuncionarioDAO();
                    $return = $funcionarioDAO->verificarFuncionario($funcionarioTeste);
                    $tipo = "Funcionario";
                }

                if (is_array($return) && count($return) > 0) {
                    if (password_verify($_POST["senha"], $return[0]->senha)) {

                        //usuario identificado
                        //guardar dados
                        session_start();
                        $_SESSION["id"] = $return[0]->id_usuario;
                        $_SESSION["nome"] = $return[0]->nome;
                        $_SESSION["email"] = $return[0]->email;
                        $_SESSION["telefone"] = $return[0]->telefone_numero;
                        $_SESSION["documento"] = $return[0]->documento;
                        $_SESSION["rua"] = $return[0]->rua;
                        $_SESSION["cidade"] = $return[0]->cidade;
                        $_SESSION["numero"] = $return[0]->endereco_numero;
                        $_SESSION["estado"] = $return[0]->estado;
                        $_SESSION["cep"] = $return[0]->cep;
                        $_SESSION["bairro"] = $return[0]->bairro;
                        $_SESSION["estado"] = $return[0]->estado;
                        $_SESSION["complemento"] = $return[0]->complemento;
                        $_SESSION["criado"] = $return[0]->criado_em;

                        if($tipo === "Funcionario"){
                            $perilDAO = new PerfilDAO();
                            $perfil = $perilDAO->buscarPerfilPorId($return[0]->id_perfil);

                            $_SESSION["perfil_id"] = $perfil->getIdPerfil();
                            $_SESSION["perfil"] = $perfil->getNome();
                            $_SESSION["permissoes"] = $perfil->getPermissoes();

                            $_SESSION["cargo"] = $return[0]->cargo;
                        }

                        if($tipo === "Cliente"){
                            require_once "src/views/pages/ooo.html";
                        }
                        else{
                            header("Location: index.php?controller=ClienteController&method=listarTodosOsClientes");
                        } 
                    }
                    else{
                         echo "<script>
                            alert('Email ou Senha Incorretos');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=login';
                        </script>";
                    }

                }
                else {
                    echo "<script>
                            alert('Usuario Não Identificado');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=login';
                        </script>";
                }

            }
        }
        require_once "src/views/pages/brand/login.html";
    }

    public function logOut(){
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
        die(); 
    }

    public static function autenticarPermissoes($permissao_nome){
        if($_SESSION["perfil_id"] == 1){
            return true;
        }
        else if (in_array($permissao_nome, array_column($_SESSION["permissoes"], "nome"), true)){
            return true;
        }
        else{
            return false;
        }
    }
}
?>