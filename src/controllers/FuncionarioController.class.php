<?php
require_once "src/models/Conection.class.php";
require_once "src/models/Usuario.class.php";
require_once "src/models/Endereco.class.php";
require_once "src/models/Telefone.class.php";
require_once "src/models/Funcionario.class.php";
require_once "src/models/FuncionarioDAO.class.php";
require_once "src/models/Perfil.class.php";
require_once "src/models/PerfilDAO.class.php";
    class FuncionarioController{

        public function listarFuncionarios(){
            $perfilDAO = new PerfilDAO();
            $perfis = $perfilDAO->listarTodosPerfis();

            $funcionarioDAO = new FuncionarioDAO();
            $funcionarios = $funcionarioDAO->listarTodosFuncionarios();

            require_once "src/views/pages/logistic/employees.php";
        }

        public function inserirFuncionarios(){
            $msg = array("","","","","","","","","","","","","","");
            
            $perfilDAO = new PerfilDAO();
            $return = $perfilDAO->listarTodosPerfis();

            if ($_POST)
                {
                    $erro = false;

                    //region erros
                    if (empty($_POST["nome"])){
                        $erro = true;
                        $msg[0] = "Preencha seu Nome Completo";
                    }

                    if (empty($_POST["cpf"])){
                        $erro = true;
                        $msg[1] = "Preencha seu CPF";
                    }

                    if (empty($_POST["email"])){
                        $erro = true;
                        $msg[2] = "Informe o seu melhor e-mail";
                    }

                    if (empty($_POST["telefone"])){
                        $erro = true;
                        $msg[3] = "Informe o seu Telefone";
                    }

                    if (empty($_POST["senha"])){
                        $erro = true;
                        $msg[4] = "Digite uma Senha";
                    }

                    if (empty($_POST["confirma_senha"])){
                        $erro = true;
                        $msg[5] = "Digite uma Senha";
                    }

                    if (!$erro) {
                        if ($_POST["senha"] != $_POST["confirma_senha"]) {
                            $msg[5] = "As senhas não são iguais";
                            $erro = true;
                        }
                    }

                    if (empty($_POST["cep"])){
                        $erro = true;
                        $msg[6] = "Preencha seu CEP";
                    }

                    if (empty($_POST["numero"])){
                        $erro = true;
                        $msg[7] = "Preencha o Número de sua residência";
                    }

                    if (empty($_POST["rua"])){
                        $erro = true;
                        $msg[8] = "Preencha o nome da sua Rua";
                    }

                    if (empty($_POST["bairro"])){
                        $erro = true;
                        $msg[9] = "Preencha o nome do seu Bairro";
                    }

                    if (empty($_POST["cidade"])){
                        $erro = true;
                        $msg[10] = "Preencha o nome da sua Cidade";
                    }

                    if (empty($_POST["cargo"])){
                        $erro = true;
                        $msg[11] = "Preencha o Cargo do Funcionario";
                    }

                    if (!isset($_POST["perfil"])){
                        $erro = true;
                        $msg[12] = "Escolha um Perfil" ;
                    }

                    if (!$erro){

                        $pefilDAO = new PerfilDAO();
                        $perfil = $pefilDAO->buscarPerfilPorId($_POST["perfil"]);
                        
                        $funcionarioNovo = new Funcionario(
                           $_POST["cargo"],
                           $perfil,
                           0,
                           $_POST["nome"],
                           "",
                           $_POST["cpf"],
                           "",
                           $_POST["email"],
                           password_hash($_POST["senha"], PASSWORD_DEFAULT),
                           0,
                           "SP",
                           $_POST["cidade"],
                           $_POST["cep"],
                           $_POST["bairro"],
                           $_POST["rua"],
                           $_POST["numero"],
                           $_POST["complemento"],
                           "",
                           0,
                           $_POST["telefone"],
                           "Celular"
                        );

                        $funcionarioDAO = new FuncionarioDAO();
                        $return = $funcionarioDAO->cadastrarFuncionario($funcionarioNovo);

                       
                        echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=listarFuncionarios';
                        </script>";
                        
                    }
                    
                }
        }

        public function editarFuncionario(){
            if($_POST){
                $perfilDAO = new PerfilDAO();
                $perfil = $perfilDAO->buscarPerfilPorId($_POST['perfil']);
                $funcionarioEditado = new Funcionario(
                    $_POST["cargo"],
                    $perfil,
                    (int) $_POST["id"]
                );

                $funcionarioDAO = new FuncionarioDAO();
                $return = $funcionarioDAO->editarFuncionario($funcionarioEditado);
                echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=listarFuncionarios';
                        </script>";
            }
        }

        public function excluirFuncionario(){
            if($_POST){
                
                $funcionarioExcluido = new Funcionario(
                    id_usuario: (int) $_POST["id"]
                );

                $funcionarioDAO = new FuncionarioDAO();
                $return = $funcionarioDAO->excluirFuncionario($funcionarioExcluido);
                echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=listarFuncionarios';
                        </script>";
            }
        }

        public function minhaConta(){
            require_once "src/views/pages/commom/account.php";
        }

        public function alterarDadosCadastrais(){

         session_start();
         
            if($_POST){
                $funcionarioEditado = new Funcionario(
                    id_usuario: $_POST["id"],
                    nome: $_POST["nome"],
                    documento: $_POST["cpf"],
                    email: $_POST["email"],
                    numero_telefone: $_POST["telefone"],
                    cep: $_POST["cep"],
                    numero_endereco: $_POST["numero"],
                    rua: $_POST["rua"],
                    complemento: $_POST["complemento"],
                    bairro: $_POST["bairro"],
                    cidade: $_POST["cidade"]
                );

                $funcionarioDAO = new FuncionarioDAO();
                $return = $funcionarioDAO->editarPropriosDados($funcionarioEditado);
                        $_SESSION["nome"] = $_POST["nome"];
                        $_SESSION["telefone"] = $_POST["telefone"];
                        $_SESSION["documento"] = $_POST["cpf"];
                        $_SESSION["rua"] = $_POST["rua"];
                        $_SESSION["cidade"] = $_POST["cidade"];
                        $_SESSION["numero"] = $_POST["numero"];
                        $_SESSION["cep"] = $_POST["cep"];
                        $_SESSION["bairro"] = $_POST["bairro"];
                        $_SESSION["complemento"] = $_POST["complemento"];
                        
                        
                
            //    echo "<pre>";
            //    var_dump($funcionarioEditado);
            //    echo "</pre>";

                if($_SESSION["email"] !== $_POST["email"]){
                    echo "<script>
                            alert('Email Alterado. Efetuando LogOut');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=logOut';
                        </script>";
                }
                else{
                    echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
                }
            }
            else{
                    echo "<script>
                            alert('Alteração Vazia, tente novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
                }
        }

        public function alterarSenha(){
            if($_POST){

                    $funcionarioTeste = new Funcionario(id_usuario: $_POST["id"]);
                    $funcionarioDAO = new FuncionarioDAO();
                    $return = $funcionarioDAO->verificarSenha($funcionarioTeste);
                }

                if (is_array($return) && count($return) > 0) {
                    if (password_verify($_POST["senha_antiga"], $return[0]->senha)){
                        
                        if ($_POST["senha_nova"] == $_POST["confirma_senha_nova"]){
                            $funcionarioTeste = new Funcionario(id_usuario: (int)$_POST["id"], senha: password_hash($_POST["senha_nova"], PASSWORD_DEFAULT));
                            $funcionarioDAO = new FuncionarioDAO();
                            $return = $funcionarioDAO->alterarSenha($funcionarioTeste);

                            echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=logOut';
                            </script>";
                        }
                        else{
                            echo "<script>
                            alert('Senhas Não Conferem. Tente Novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
                        }
                    }
                    else{
                         echo "<script>
                            alert('Senha Atual Não Confere. Tente Novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
                    }   
            }
        }

    }
?>