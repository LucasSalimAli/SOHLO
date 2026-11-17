<?php
class PlanoDAO extends Conection
{
    public function __construct($db = null)
    {
        parent::__construct($db);

    }

    public function cadastrarPlano($plano)
    {
        $sql = "INSERT INTO planos (nome, descricao, preco) VALUES(?,?,?)";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $plano->getNome());
            $stmt->bindValue(2, $plano->getDescricao());
            $stmt->bindValue(3, $plano->getPreco());

            $stmt->execute();

            $this->db = null;
            return "Plano Cadastrado com Sucesso";
        } catch (PDOException $e) {
            var_dump($e);
            $this->db = null;
            return "Erro ao cadastrar plano";
        }
    }

    public function listarTodosPlanos()
    {
        $sql = "SELECT id_plano, nome, descricao, preco FROM planos WHERE deletado_em IS NULL";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $this->db = null;
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->db = null;
            //echo $e->getMessage();
            return "Problema ao buscar os Planos";
        }
    }

    public function buscarPlanoPorId($plano_id)
    {
        $sql = "SELECT id_plano, nome, descricao, preco FROM planos WHERE id_plano = ?";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $plano_id);
            $stmt->execute();

            $this->db = null;
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->db = null;
            //echo $e->getMessage();
            return $e->getMessage();
        }
    }

    public function editarPlano($plano)
    {
        $sql = "UPDATE planos
                    SET nome = ?,
                        descricao = ?,
                        preco = ?
                    WHERE id_plano = ?";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $plano->getNome());
            $stmt->bindValue(2, $plano->getDescricao());
            $stmt->bindValue(3, $plano->getPreco());
            $stmt->bindValue(4, $plano->getId_Plano());

            $stmt->execute();

            $this->db = null;

            return "Dados Atualizado com Sucesso";
        } catch (PDOException $e) {
            $this->db = null;

            return "Erro ao Atualizar Dados";
        }
    }

    public function excluirPlano($plano){
        $sql = "UPDATE planos
                    SET deletado_em = ?
                    WHERE id_plano = ?";
        
        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, date("Y-m-d H:i:s"));
            $stmt->bindValue(2, $plano->getId_Plano());

            $stmt->execute();

            $this->db = null;

            return "Plano Inativado com Sucesso!";
        }
        catch(PDOException $e){
            $this->db = null;

            return "Erro ao Inativar";
        }
    }
}

?>