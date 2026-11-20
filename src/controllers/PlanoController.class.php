<?php

require_once "src/models/Conection.class.php";
require_once "src/models/Plano.class.php";
require_once "src/models/PlanoDAO.class.php";
require_once "src/controllers/AutenticacaoController.class.php";


class PlanoController
{

    public function listarPlanos()
    {
        $planoDAO = new PlanoDAO();
        $return = $planoDAO->listarTodosPlanos();
        require_once "src/views/pages/logistic/plans.php";
    }

    public function inserirPlano()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Cadastrar-Planos")) {
            $msg = array("", "", "");

            if ($_POST) {
                $erro = false;

                if (empty($_POST["name"])) {
                    $erro = true;
                    $msg[0] = "Preencha o nome do Plano";
                }

                if (empty($_POST["description"])) {
                    $erro = true;
                    $msg[1] = "Preencha a Descrição do Plano";
                }

                if (empty($_POST["price"])) {
                    $erro = true;
                    $msg[2] = "Preencha o Preço do Plano";
                }

                if (!$erro) {
                    $planoNovo = new Plano(0, $_POST["name"], $_POST["description"], $_POST["price"]);
                    $planoDAO = new PlanoDAO();
                    $return = $planoDAO->cadastrarPlano($planoNovo);
                    echo "<script>
                    alert('$return');
                    window.location.href = 'index.php?controller=PlanoController&method=listarPlanos';
                    </script>";
                }
            }
        }
    }

    public function editarPlano()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Editar-Planos")) {
            $planoEditado = new Plano(
                $_POST["id"],
                $_POST["name"],
                $_POST["description"],
                $_POST["price"]
            );

            $planoDAO = new PlanoDAO();
            $return = $planoDAO->editarPlano($planoEditado);
            echo "<script>
                    alert('$return');
                    window.location.href = 'index.php?controller=PlanoController&method=listarPlanos';
                    </script>";
        }
    }

    public function excluirPlano()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Excluir-Planos")) {
            $planoExcluido = new Plano(
                $_POST["id"],
            );

            $planoDAO = new PlanoDAO();
            $return = $planoDAO->excluirPlano($planoExcluido);
            echo "<script>
                    alert('$return');
                    window.location.href = 'index.php?controller=PlanoController&method=listarPlanos';
                    </script>";
        }
    }
}
?>