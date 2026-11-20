<?php
require_once "src/models/Conection.class.php";
require_once "src/models/Usuario.class.php";
require_once "src/models/Endereco.class.php";
require_once "src/models/Telefone.class.php";
require_once "src/models/Cliente.class.php";
require_once "src/models/ClienteDAO.class.php";
require_once "src/models/PlanoDAO.class.php";
    class ClienteController {
        public function listarTodosOsClientes(){
            $clienteDAO = new ClienteDAO();
            $clientes = $clienteDAO->listarTodosOsClientes();

            $planoDAO = new PlanoDAO();
            $return = $planoDAO->listarTodosPlanos();
            require_once "src/views/pages/logistic/customer.php";
        }
        public function inserirClientePf($origem){

        $msg = array("","","","","","","","","","","","","","");
            
            $planoDAO = new PlanoDAO();
            $return = $planoDAO->listarTodosPlanos();

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

                    if (!isset($_POST["tipo_plano"])){
                        $erro = true;
                        $msg[11] = "Escolha um Plano" ;
                    }

                    if(empty($_FILES["foto"]["name"])){
                        $nomeFoto = "img_std_user.svg";
                        $isStd = true;
                    }
                    else{
                        $isStd = false;
                        $caminhoTemp = $_FILES["foto"]["tmp_name"];

                        // Descobre o tipo real lendo o arquivo no servidor
                        $tipoMimeReal = mime_content_type($caminhoTemp);
                        $mimesPermitidos = ['image/jpeg', 'image/png'];

                        if (!in_array($tipoMimeReal, $mimesPermitidos)) {
                            $msg[12] = "O arquivo enviado não é um formato de imagem válido (Apenas JPG e PNG)";
                            $erro = true;
                        }
                        else
                        {
                            $ext = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

                            // Cria o prefixo com Data e Hora atual (Ex: 2026-06-06_14-30-22)
                            $dataHora = date('Y-m-d_H-i-s');

                            // Adiciona um número aleatório de 4 dígitos
                            $numeroAleatorio = rand(1000, 9999);
                            // Usando data, hora e número aleatório:
                            $nomeFoto = "img_{$dataHora}_{$numeroAleatorio}." . $ext;
                        }
                    }

                    //endregion

                    if (!$erro){

                        $planoDAO = new PlanoDAO();
                        $plano = $planoDAO->buscarPlanoPorId($_POST["tipo_plano"]);
                        
                        $clienteNovo = new Cliente(
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
                            "Celular",
                            "",
                            [$plano]
                        );

                        $clienteDAO = new ClienteDAO();

                        
                        
                        if (!$plano || !isset($plano->id_plano)) {
                            echo "<script>alert('Plano não encontrado!');</script>";
                            return;
                        }

                        $return = $clienteDAO->cadastrarCliente($clienteNovo, (int) $plano->id_plano
                        );

                        if($isStd === false){
                        $folder = "src/uploads/images/users/";
					    $caminhoFinal = $folder . $nomeFoto;
                        move_uploaded_file($caminhoTemp, $caminhoFinal);}
            
                        if($origem == "admin"){
                            echo "<script>
                                alert('$return');
                                window.location.href = 'index.php?controller=ClienteController&method=listarTodosOsCLientes';
                            </script>";
                        }
                        else{
                        echo "<script>
                                alert('$return');
                                window.location.href = 'index.php?controller=AutenticacaoController&method=login';
                            </script>";
                        }
                            
                    }
                    
                }
            require_once "src/views/pages/brand/signupA.php";
        }

        public function excluirClientes(){
            if($_POST){
                
                $ClienteExcluido = new Cliente(
                    id_usuario: (int) $_POST["id"]
                );

                $ClienteDAO = new ClienteDAO();
                $return = $ClienteDAO->excluirCliente($ClienteExcluido);
                echo "<script>
                            alert('$return');
                            window.location.href = 'index.php?controller=ClienteController&method=listarTodosOsClientes';
                        </script>";
            }
        }


        public function inserirClientePj($origem){
            $msg = array("","","","","","","","","","","","","","");

            if ($_POST)
                {
                //     $erro = false;

                //     //region erros
                //     if (empty($_POST["nome"])){
                //         $erro = true;
                //         $msg[0] = "Preencha seu Nome Completo";
                //     }

                //     if (empty($_POST["nome_fantasia"])){
                //         $erro = true;
                //         $msg[1] = "Preencha seu Nome Fantasia";
                //     }

                //     if (empty($_POST["cnpj"])){
                //         $erro = true;
                //         $msg[2] = "Preencha seu CNPJ";
                //     }

                //     if (empty($_POST["email"])){
                //         $erro = true;
                //         $msg[3] = "Informe o seu melhor e-mail";
                //     }

                //     if (empty($_POST["telefone"])){
                //         $erro = true;
                //         $msg[4] = "Informe o seu melhor Telefone";
                //     }

                //     if (empty($_POST["senha"])){
                //         $erro = true;
                //         $msg[5] = "Digite uma Senha";
                //     }

                //     if (empty($_POST["confirma_senha"])){
                //         $erro = true;
                //         $msg[6] = "Digite uma Senha";
                //     }

                //     if (!$erro) {
                //         if ($_POST["senha"] != $_POST["confirma_senha"]) {
                //             $msg[6] = "As senhas não são iguais";
                //             $erro = true;
                //         }
                //     }

                //     if (empty($_POST["cep"])){
                //         $erro = true;
                //         $msg[7] = "Preencha seu CEP";
                //     }

                //     if (empty($_POST["numero"])){
                //         $erro = true;
                //         $msg[8] = "Preencha o Número de sua residência";
                //     }

                //     if (empty($_POST["rua"])){
                //         $erro = true;
                //         $msg[9] = "Preencha o nome da sua Rua";
                //     }

                //     if (empty($_POST["bairro"])){
                //         $erro = true;
                //         $msg[10] = "Preencha o nome do seu Bairro";
                //     }

                //     if (empty($_POST["cidade"])){
                //         $erro = true;
                //         $msg[11] = "Preencha o nome da sua Cidade";
                //     }

                //    if (empty($_POST["descricao"])){
                //         $erro = true;
                //         $msg[12] = "Preencha uma breve Descrição da Sua Empresa";
                //     }

                //     // if (!isset($_POST["frequencia_coleta"])){
                //     //     $erro = true;
                //     //     $msg[12] = "Escolha uma frequência para a Coleta";
                //     // }

                //     //endregion

                //     if (!$erro){
                
                //         $clienteNovo = new Cliente(
                //             0,
                //             $_POST["nome"],
                //             $_POST["nome_fantasia"],
                //             $_POST["cnpj"],
                //             "",
                //             $_POST["email"],
                //             password_hash($_POST["senha"], PASSWORD_DEFAULT),
                //             0,
                //             "SP",
                //             $_POST["cidade"],
                //             $_POST["cep"],
                //             $_POST["bairro"],
                //             $_POST["rua"],
                //             $_POST["numero"],
                //             $_POST["complemento"],
                //             "",
                //             0,
                //             $_POST["telefone"],
                //             "Celular",
                //             $_POST["descricao"],
                //             []
                //         );

                //         $clienteDAO = new ClienteDAO();

                //         $return = $clienteDAO->cadastrarCliente(
                //             $clienteNovo,
                //             0
                //         );

                //         if($origem == "admin"){
                //             echo "<script>
                //                 alert('$return');
                //                 window.location.href = 'index.php?controller=ClienteController&method=listarTodosOsCLientes';
                //             </script>";
                //         }
                //         else{
                //         echo "<script>
                //                 alert('$return');
                //                 window.location.href = 'index.php?controller=pagesController&method=initLogin';
                //             </script>";
                //         }
                            
                //     }
                    
            }
            require_once "src/views/pages/brand/signupB.html";
        }

    }
?>