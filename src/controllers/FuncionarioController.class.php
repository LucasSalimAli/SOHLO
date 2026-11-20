<?php
require_once "src/models/Conection.class.php";
require_once "src/models/Usuario.class.php";
require_once "src/models/Endereco.class.php";
require_once "src/models/Telefone.class.php";
require_once "src/models/Funcionario.class.php";
require_once "src/models/FuncionarioDAO.class.php";
require_once "src/models/Perfil.class.php";
require_once "src/models/PerfilDAO.class.php";
class FuncionarioController
{

    public function listarFuncionarios()
    {
        $perfilDAO = new PerfilDAO();
        $perfis = $perfilDAO->listarTodosPerfis();

        $funcionarioDAO = new FuncionarioDAO();
        $funcionarios = $funcionarioDAO->listarTodosFuncionarios();
        require_once "src/views/pages/logistic/employees.php";
    }

    public function inserirFuncionarios()

    // DISGRAÇA PQP QUE INFERNO DE COISA DAO DE MERDA N VAI
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Cadastrar-Funcionarios")) {
            $msg = array("", "", "", "", "", "", "", "", "", "", "", "", "", "");

            $perfilDAO = new PerfilDAO();
            $return = $perfilDAO->listarTodosPerfis();

            if ($_POST) {
                $erro = false;

                //region erros
                if (empty($_POST["nome"])) {
                    $erro = true;
                    $msg[0] = "Preencha seu Nome Completo";
                }

                if (empty($_POST["cpf"])) {
                    $erro = true;
                    $msg[1] = "Preencha seu CPF";
                }

                if (empty($_POST["email"])) {
                    $erro = true;
                    $msg[2] = "Informe o seu melhor e-mail";
                }

                if (empty($_POST["telefone"])) {
                    $erro = true;
                    $msg[3] = "Informe o seu Telefone";
                }

                if (empty($_POST["senha"])) {
                    $erro = true;
                    $msg[4] = "Digite uma Senha";
                }

                if (empty($_POST["confirma_senha"])) {
                    $erro = true;
                    $msg[5] = "Digite uma Senha";
                }

                if (!$erro) {
                    if ($_POST["senha"] != $_POST["confirma_senha"]) {
                        $msg[5] = "As senhas não são iguais";
                        $erro = true;
                    }
                }

                if (empty($_POST["cep"])) {
                    $erro = true;
                    $msg[6] = "Preencha seu CEP";
                }

                if (empty($_POST["numero"])) {
                    $erro = true;
                    $msg[7] = "Preencha o Número de sua residência";
                }

                if (empty($_POST["rua"])) {
                    $erro = true;
                    $msg[8] = "Preencha o nome da sua Rua";
                }

                if (empty($_POST["bairro"])) {
                    $erro = true;
                    $msg[9] = "Preencha o nome do seu Bairro";
                }

                if (empty($_POST["cidade"])) {
                    $erro = true;
                    $msg[10] = "Preencha o nome da sua Cidade";
                }

                if (empty($_POST["cargo"])) {
                    $erro = true;
                    $msg[11] = "Preencha o Cargo do Funcionario";
                }

                if (!isset($_POST["perfil"])) {
                    $erro = true;
                    $msg[12] = "Escolha um Perfil";
                }

                if (empty($_FILES["foto"]["name"])) {
                    $nomeFoto = "img_std_user.svg";
                    $isStd = true;
                } else {
                    $isStd = false;
                    $caminhoTemp = $_FILES["foto"]["tmp_name"];

                    // Descobre o tipo real lendo o arquivo no servidor
                    $tipoMimeReal = mime_content_type($caminhoTemp);
                    $mimesPermitidos = ['image/jpeg', 'image/png'];

                    if (!in_array($tipoMimeReal, $mimesPermitidos)) {
                        $msg[13] = "O arquivo enviado não é um formato de imagem válido (Apenas JPG e PNG)";
                        $erro = true;
                    } else {
                        $ext = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

                        // Cria o prefixo com Data e Hora atual (Ex: 2026-06-06_14-30-22)
                        $dataHora = date('Y-m-d_H-i-s');

                        // Adiciona um número aleatório de 4 dígitos
                        $numeroAleatorio = rand(1000, 9999);
                        // Usando data, hora e número aleatório:
                        $nomeFoto = "img_{$dataHora}_{$numeroAleatorio}." . $ext;
                    }
                }

                if (!$erro) {

                    $pefilDAO = new PerfilDAO();
                    $perfil = $pefilDAO->buscarPerfilPorId($_POST["perfil"]);

                    $funcionarioNovo = new Funcionario(
                        $_POST["cargo"],
                        $perfil,
                        0,
                        $_POST["nome"],
                        "",
                        $_POST["cpf"],
                        $nomeFoto,
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

                    if ($isStd === false) {
                        $folder = "src/uploads/images/users/";
                        $caminhoFinal = $folder . $nomeFoto;
                        move_uploaded_file($caminhoTemp, $caminhoFinal);
                    }

                    echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=listarFuncionarios';
                        </script>";

                }
            }

        }
    }

    public function editarFuncionario()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Editar-Funcionarios")) {
            if ($_POST) {
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
    }

    public function excluirFuncionario()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Excluir-Funcionarios")) {
            if ($_POST) {

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
    }

    public function minhaConta()
    {
        session_start();
        $funcionarioDAO = new FuncionarioDAO();
        $meusDados = $funcionarioDAO->buscarMeusDados((int) $_SESSION["id"]);
        require_once "src/views/pages/commom/account.php";
    }

    public function alterarDadosCadastrais()
    {

        session_start();

        if ($_POST) {
            $funcionarioEditado = new Funcionario(
                id_usuario: (int) $_POST["id"],
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




            //    echo "<pre>";
            //    var_dump($funcionarioEditado);
            //    echo "</pre>";

            if ($_SESSION["email"] !== $_POST["email"]) {
                echo "<script>
                            alert('Email Alterado. Efetuando LogOut');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=logOut';
                        </script>";
            } else {
                echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
            }
        } else {
            echo "<script>
                            alert('Alteração Vazia, tente novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
        }
    }

    public function alterarSenha()
    {
        if ($_POST) {

            $funcionarioTeste = new Funcionario(id_usuario: $_POST["id"]);
            $funcionarioDAO = new FuncionarioDAO();
            $return = $funcionarioDAO->verificarSenha($funcionarioTeste);
        }

        if (is_array($return) && count($return) > 0) {
            if (password_verify($_POST["senha_antiga"], $return[0]->senha)) {

                if ($_POST["senha_nova"] == $_POST["confirma_senha_nova"]) {
                    $funcionarioTeste = new Funcionario(id_usuario: (int) $_POST["id"], senha: password_hash($_POST["senha_nova"], PASSWORD_DEFAULT));
                    $funcionarioDAO = new FuncionarioDAO();
                    $return = $funcionarioDAO->alterarSenha($funcionarioTeste);

                    echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=AutenticacaoController&method=logOut';
                            </script>";
                } else {
                    echo "<script>
                            alert('Senhas Não Conferem. Tente Novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
                }
            } else {
                echo "<script>
                            alert('Senha Atual Não Confere. Tente Novamente');
                            window.location.href = 'index.php?controller=FuncionarioController&method=minhaConta';
                        </script>";
            }
        }
    }

}
?>