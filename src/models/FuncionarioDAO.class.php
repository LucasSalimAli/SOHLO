<?php
class FuncionarioDAO extends Conection
{
    public function __construct($db = null)
    {
        parent::__construct($db);
    }

    public function cadastrarFuncionario($funcionario)
    {
        try {

            $this->db->beginTransaction();

            // 1. CADASTRA USUARIO
            $sql = "INSERT INTO usuarios
                    (nome, documento, foto, email, senha)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getNome());
            $stmt->bindValue(2, $funcionario->getDocumento());
            $stmt->bindValue(3, $funcionario->getFoto());
            $stmt->bindValue(4, $funcionario->getEmail());
            $stmt->bindValue(5, $funcionario->getSenha());

            $stmt->execute();

            $id_usuario = $this->db->lastInsertId();


            // 2. CADASTRA FUNCIONARIO
            $sql = "INSERT INTO funcionarios (usuario_id, perfil_id, cargo)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $id_usuario);
            $stmt->bindValue(2, $funcionario->getPerfil()->getIdPerfil());
            $stmt->bindValue(3, $funcionario->getCargo());

            $stmt->execute();

            // 3. CADASTRA ENDERECO
            $sql = "INSERT INTO enderecos
                    (usuario_id, estado, cidade, cep, bairro, rua,
                     numero, complemento, ponto_referencia)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $id_usuario);
            $stmt->bindValue(2, $funcionario->getEndereco()->getEstado());
            $stmt->bindValue(3, $funcionario->getEndereco()->getCidade());
            $stmt->bindValue(4, $funcionario->getEndereco()->getCep());
            $stmt->bindValue(5, $funcionario->getEndereco()->getBairro());
            $stmt->bindValue(6, $funcionario->getEndereco()->getRua());
            $stmt->bindValue(7, $funcionario->getEndereco()->getNumero());
            $stmt->bindValue(8, $funcionario->getEndereco()->getComplemento());
            $stmt->bindValue(9, $funcionario->getEndereco()->getPonto_referencia());

            $stmt->execute();


            // 4. CADASTRA TELEFONES
            $sql = "INSERT INTO telefones
                    (usuario_id, numero, tipo)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            foreach ($funcionario->getTelefones() as $telefone) {

                $stmt->bindValue(1, $id_usuario);
                $stmt->bindValue(2, $telefone->getNumero());
                $stmt->bindValue(3, $telefone->getTipoTel());

                $stmt->execute();
            }

            $this->db->commit();

            return "Funcionario cadastrado com sucesso!";

        } catch (PDOException $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            $this->db = null;
            return "Não foi possível cadastrar o funcionario. Verifique os dados e tente novamente.";
        }
    }

    public function listarTodosFuncionarios()
    {
        $sql = "SELECT
                    usuarios.id_usuario,
                    usuarios.nome,
                    usuarios.documento,
                    usuarios.email,
                    DATE_FORMAT(usuarios.criado_em, '%d/%m/%Y %H:%i') AS criado_em,
                    telefones.numero AS telefone_numero,
                    enderecos.cep,
                    enderecos.numero AS endereco_numero,
                    enderecos.rua,
                    enderecos.complemento,
                    enderecos.bairro,
                    enderecos.cidade,
                    enderecos.estado,
                    funcionarios.cargo,
                    perfis.id_perfil,
                    perfis.nome AS perfil_nome,
                    perfis.descricao AS perfil_descricao
                FROM usuarios

                INNER JOIN funcionarios
                    ON funcionarios.usuario_id = usuarios.id_usuario

                INNER JOIN perfis
                    ON perfis.id_perfil = funcionarios.perfil_id

                INNER JOIN enderecos
                    ON enderecos.usuario_id = usuarios.id_usuario

                INNER JOIN telefones
                    ON telefones.usuario_id = usuarios.id_usuario
                    
                WHERE usuarios.deletado_em IS NULL";

        try {

            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            $this->db = null;
            return "Erro ao buscar clientes";
        }

    }

    public function editarFuncionario($funcionario)
    {
        $sql = "UPDATE funcionarios
                    SET cargo = ?,
                        perfil_id = ?
                    WHERE usuario_id = ?";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getCargo());
            $stmt->bindValue(2, $funcionario->getPerfil()->getIdPerfil());
            $stmt->bindValue(3, $funcionario->getId_usuario());

            $stmt->execute();

            $this->db = null;

            return "Dados Atualizado com Sucesso";
        } catch (PDOException $e) {
            $this->db = null;

            return "Erro ao Atualizar Dados";
        }
    }

    public function excluirFuncionario($funcionario)
    {
        $sql = "UPDATE usuarios
                    SET deletado_em = ?
                    WHERE id_usuario = ?";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, date("Y-m-d H:i:s"));
            $stmt->bindValue(2, $funcionario->getId_usuario());

            $stmt->execute();

            $this->db = null;

            return "Funcionario Inativado com Sucesso!";
        } catch (PDOException $e) {
            $this->db = null;

            return "Erro ao Inativar";
        }
    }

    public function verificarFuncionario($funcionario)
    {
        $sql = "SELECT
                    usuarios.id_usuario,
                    usuarios.nome,
                    usuarios.documento,
                    usuarios.email,
                    usuarios.senha,
                    DATE_FORMAT(usuarios.criado_em, '%d/%m/%Y %H:%i') AS criado_em,
                    telefones.numero AS telefone_numero,
                    enderecos.cep,
                    enderecos.numero AS endereco_numero,
                    enderecos.rua,
                    enderecos.complemento,
                    enderecos.bairro,
                    enderecos.cidade,
                    enderecos.estado,
                    funcionarios.cargo,
                    perfis.id_perfil,
                    perfis.nome AS perfil_nome,
                    perfis.id_perfil,
                    perfis.descricao AS perfil_descricao
                FROM usuarios

                INNER JOIN funcionarios
                    ON funcionarios.usuario_id = usuarios.id_usuario

                INNER JOIN perfis
                    ON perfis.id_perfil = funcionarios.perfil_id

                INNER JOIN enderecos
                    ON enderecos.usuario_id = usuarios.id_usuario

                INNER JOIN telefones
                    ON telefones.usuario_id = usuarios.id_usuario
                    
                WHERE usuarios.email = ?
                        AND usuarios.deletado_em IS NULL";


        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getEmail());

            $stmt->execute();

            $this->db = null;

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->db = null;
            return "Erro ao Acessar o Banco de Dados";
        }
    }

    public function editarPropriosDados($funcionario){
        $sql = "UPDATE usuarios 
                    SET nome = ?,
                    documento = ?,
                    email = ?
                    WHERE id_usuario = ?";

        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getNome());
            $stmt->bindValue(2, $funcionario->getDocumento());
            $stmt->bindValue(3, $funcionario->getEmail());
            $stmt->bindValue(4, $funcionario->getId_usuario());

            $stmt->execute();

            $sql = "UPDATE telefones
                        SET numero = ?
                        WHERE usuario_id = ?";

            $stmt = $this->db->prepare($sql);

            foreach($funcionario->getTelefones() as $telefone){
                $stmt->bindValue(1,$telefone->getNumero());
                $stmt->bindValue(2, $funcionario->getId_usuario());
                $stmt->execute();
            }
        
            $sql = "UPDATE enderecos
                        SET cep = ?,
                        numero = ?,
                        rua = ?,
                        complemento = ?,
                        bairro = ?,
                        cidade = ?
                        WHERE usuario_id = ?";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getEndereco()->getCep());
            $stmt->bindValue(2, $funcionario->getEndereco()->getNumero());
            $stmt->bindValue(3, $funcionario->getEndereco()->getRua());
            $stmt->bindValue(4, $funcionario->getEndereco()->getComplemento());
            $stmt->bindValue(5, $funcionario->getEndereco()->getBairro());
            $stmt->bindValue(6, $funcionario->getEndereco()->getCidade());
            $stmt->bindValue(7, $funcionario->getEndereco()->getId_usuario());

            $stmt->execute();

            $this->db->commit();
            $this->db = null;

            return "Dados Atualizados com Sucesso";
        }
        catch(PDOException $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }

            $this->db = null;
            return "Erro ao atualizar dados.";
        }
    }

    public function verificarSenha($funcionario){
        $sql = "SELECT senha FROM usuarios WHERE id_usuario = ?";

        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getId_usuario());

            $stmt->execute();

            $this->db = null;

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            $this->db = null;
            return "Erro ao Alterar Senha";
        }
    }

    public function alterarSenha($funcionario){
        $sql = "UPDATE usuarios
                    SET senha = ?
                     WHERE id_usuario = ?";

        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $funcionario->getSenha());
            $stmt->bindValue(2, $funcionario->getId_usuario());

            $stmt->execute();

            $this->db = null;

            return "Senha Alterada com Sucesso. Efetuando LogOut!";
        }
        catch(PDOException $e){
            $this->db = null;
            return "Erro ao Alterar Senha";
        }
    }

}

?>