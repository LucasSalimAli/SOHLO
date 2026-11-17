<?php
class PerfilDAO extends Conection
{

    public function __construct($db = null)
    {
        parent::__construct($db);
    }

    public function listarTodasPermissoes()
    {

        $sql = "SELECT id_permissao, nome, descricao
            FROM permissoes";

        try {

            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $this->db = null;

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {

            $this->db = null;
            error_log($e->getMessage());
            return "Erro ao carregar Permissões";

        }
    }

    public function listarTodosPerfis()
    {
        $sql = "SELECT
                perfis.id_perfil,
                perfis.nome,
                perfis.descricao,
                permissoes.id_permissao,
                permissoes.nome AS permissao
                        FROM perfis 

                        INNER JOIN perfis_permissoes 
                            ON perfis.id_perfil = perfis_permissoes.perfil_id

                        INNER JOIN permissoes 
                            ON perfis_permissoes.permissao_id = permissoes.id_permissao

                        WHERE perfis.deletado_em IS NULL
                        ORDER BY perfis.id_perfil";


        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

            $perfis = [];

            foreach ($resultados as $linha) {

                $id = $linha->id_perfil;

                // Se o perfil ainda não existe no array, cria.
                if (!isset($perfis[$id])) {

                    $perfis[$id] = new Perfil(
                        $linha->id_perfil,
                        $linha->nome,
                        $linha->descricao,
                        []
                    );
                }

                // Adiciona a permissão ao array do perfil.
                $perfis[$id]->setPermissoes([
                    'id_permissao' => $linha->id_permissao,
                    'nome' => $linha->permissao
                ]);
            }

            return array_values($perfis);

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return "Erro ao puxar os perfis";
        }
    }

    public function cadastrarPerfil($perfil)
    {
        $sql = "INSERT INTO perfis (nome, descricao) values (?,?)";

        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getDescricao());

            $stmt->execute();

            $perfil_id = $this->db->lastInsertId();

            $sql = "INSERT INTO perfis_permissoes (perfil_id, permissao_id) VALUES (?,?)";

            $stmt = $this->db->prepare($sql);
            foreach ($perfil->getPermissoes() as $permissao) {
                $stmt->bindValue(1, $perfil_id);
                $stmt->bindValue(2, $permissao);

                $stmt->execute();
            }

            $this->db->commit();
            $this->db = null;
            return "Perfil Cadastrado com Sucesso!";

        } catch (PDOException $e) {
            $this->db->rollBack();
            $this->db = null;

            return "Erro ao cadastrar Perfil";
        }
    }


    public function buscarPerfilPorId($perfil)
    {
        $sql = "SELECT
                perfis.id_perfil,
                perfis.nome,
                perfis.descricao,
                permissoes.id_permissao,
                permissoes.nome AS permissao
            FROM perfis

            INNER JOIN perfis_permissoes
                ON perfis.id_perfil = perfis_permissoes.perfil_id

            INNER JOIN permissoes
                ON perfis_permissoes.permissao_id = permissoes.id_permissao

            WHERE perfis.id_perfil = ?
                AND perfis.deletado_em IS NULL";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $perfil);

            $stmt->execute();

            $this->db = null;

            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if (empty($result)) {
                return null;
            }

            $ctrl = $result[0];

            $perfil = new Perfil(
                $ctrl->id_perfil,
                $ctrl->nome,
                $ctrl->descricao,
                []
            );

            foreach ($result as $permissao) {
                $perfil->setPermissoes([
                    'id_permissao' => $permissao->id_permissao,
                    'nome' => $permissao->permissao
                ]);
            }

            return $perfil;
        } catch (PDOException $e) {
            $this->db = null;
            return "Erro ao selecionar Perfil";
        }
    }

    public function editarPerfil($perfil)
    {
         $sql = "UPDATE perfis
                SET nome = ?, 
                    descricao = ?
                WHERE id_perfil = ?";

        try {
            $this->db->beginTransaction();


            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $perfil->getNome());
            $stmt->bindValue(2, $perfil->getDescricao());
            $stmt->bindValue(3, $perfil->getIdPerfil());

            $stmt->execute();

           
            $sql = "DELETE FROM perfis_permissoes
                WHERE perfil_id = ?";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $perfil->getIdPerfil());

            $stmt->execute();

        
            $sql = "INSERT INTO perfis_permissoes
                (perfil_id, permissao_id)
                VALUES (?, ?)";

            $stmt = $this->db->prepare($sql);

            foreach ($perfil->getPermissoes() as $permissao) {
                $stmt->bindValue(1, $perfil->getIdPerfil());
                $stmt->bindValue(2, $permissao);

                $stmt->execute();
            }

            $this->db->commit();
            $this->db = null;

            return "Perfil atualizado com sucesso!";

        } catch (PDOException $e) {

            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            $this->db = null;

            return "Erro ao atualizar perfil.";
        }
    }

    public function excluirPerfil($perfil){
        $sql = "UPDATE perfis
                    SET deletado_em = ?
                    WHERE id_perfil = ?";
        
        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, date("Y-m-d H:i:s"));
            $stmt->bindValue(2, $perfil->getIdPerfil());

            $stmt->execute();

            $this->db = null;

            return "Perfil Inativado com Sucesso!";
        }
        catch(PDOException $e){
            $this->db = null;
            return "Erro ao Inativar";
        }
    }
}


?>