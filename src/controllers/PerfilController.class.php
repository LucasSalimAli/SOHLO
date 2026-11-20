<?php
require_once "src/models/Conection.class.php";
require_once "src/models/Perfil.class.php";
require_once "src/models/PerfilDAO.class.php";
require_once "src/controllers/AutenticacaoController.class.php";


class PerfilController
{
    public function listarTodosOsPerfis()
    {
        $perfilDAO = new PerfilDAO();
        $permissoes = $perfilDAO->listarTodasPermissoes();
        $perfilDAO2 = new PerfilDAO();
        $perfis = $perfilDAO2->listarTodosPerfis();
        require_once "src/views/pages/logistic/permissions.php";
    }

    public function inserirPerfil()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Cadastrar-Perfis")) {

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

                if (!$erro) {
                    $perfilNovo = new Perfil(0, $_POST["name"], $_POST["description"], $_POST["permissoes"] ?? []);
                    $perfiDAO = new PerfilDAO($perfilNovo);
                    $return = $perfiDAO->cadastrarPerfil($perfilNovo);

                    echo "<script>
                    alert('$return');
                    window.location.href = 'index.php?controller=PerfilController&method=listarTodosOsPerfis';
                    </script>";
                }

            }
        }
    }

    public function editarPerfil()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Editar-Perfis")) {
        if ($_POST) {

            $perfil = new Perfil(
                (int) $_POST["id"],
                $_POST["name"],
                $_POST["description"],
                $_POST["permissoes"] ?? []
            );

            $perfilDAO = new PerfilDAO();

            $return = $perfilDAO->editarPerfil($perfil);


            echo "<script>
            alert('$return');
            window.location.href = 'index.php?controller=PerfilController&method=listarTodosOsPerfis';
        </script>";
        }}
    }

    public function excluirPerfil()
    {
        session_start();
        require_once "src/controllers/AutenticacaoController.class.php";
        if (AutenticacaoController::autenticarPermissoes("Excluir-Perfis")) {
        if ($_POST) {

            $perfil = new Perfil(
                (int) $_POST["id"],
            );

            $perfilDAO = new PerfilDAO();

            $return = $perfilDAO->excluirPerfil($perfil);

            echo "<script>
            alert('$return');
            window.location.href = 'index.php?controller=PerfilController&method=listarTodosOsPerfis';
        </script>";
        }}
    }
}

?>