
<?php
class ClienteDAO extends Conection {

    public function __construct($db = null) {
        parent::__construct($db);
    }
    public function cadastrarCliente(Cliente $cliente, int $plano_id) {

        try {

            $this->db->beginTransaction();

            // 1. CADASTRA USUARIO
            $sql = "INSERT INTO usuarios
                    (nome, documento, foto, email, senha)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getDocumento());
            $stmt->bindValue(3, $cliente->getFoto());
            $stmt->bindValue(4, $cliente->getEmail());
            $stmt->bindValue(5, $cliente->getSenha());

            $stmt->execute();

            $id_usuario = $this->db->lastInsertId();


           // 2. CADASTRA ASSINANTE
            $sql = "INSERT INTO assinantes (usuario_id, descricao)
                    VALUES (?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $id_usuario);
            $stmt->bindValue(2, $cliente->getDescricao());

            $stmt->execute();

            // 3. CADASTRA ENDERECO
            $sql = "INSERT INTO enderecos
                    (usuario_id, estado, cidade, cep, bairro, rua,
                     numero, complemento, ponto_referencia)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $id_usuario);
            $stmt->bindValue(2, $cliente->getEndereco()->getEstado());
            $stmt->bindValue(3, $cliente->getEndereco()->getCidade());
            $stmt->bindValue(4, $cliente->getEndereco()->getCep());
            $stmt->bindValue(5, $cliente->getEndereco()->getBairro());
            $stmt->bindValue(6, $cliente->getEndereco()->getRua());
            $stmt->bindValue(7, $cliente->getEndereco()->getNumero());
            $stmt->bindValue(8, $cliente->getEndereco()->getComplemento());
            $stmt->bindValue(9, $cliente->getEndereco()->getPonto_referencia());

            $stmt->execute();

            // 4. CADASTRA ASSINATURA
            $sql = "INSERT INTO assinaturas (plano_id, titular_id)
                    VALUES (?, ?)";

                $stmt = $this->db->prepare($sql);

                $stmt->bindValue(1, $plano_id);
                $stmt->bindValue(2, $id_usuario);

                $stmt->execute();


            // 5. CADASTRA TELEFONES
            $sql = "INSERT INTO telefones
                    (usuario_id, numero, tipo)
                    VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($sql);

            foreach ($cliente->getTelefones() as $telefone) {

                $stmt->bindValue(1, $id_usuario);
                $stmt->bindValue(2, $telefone->getNumero());
                $stmt->bindValue(3, $telefone->getTipoTel());

                $stmt->execute();
            }

            $this->db->commit();

            return "Cliente cadastrado com sucesso!";

        } catch (PDOException $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            
            $this->db = null;
            return "Não foi possível cadastrar o cliente. Verifique os dados e tente novamente.";
        }
    }
    public function listarTodosOsClientes() {

        $sql = "SELECT
                usuarios.id_usuario,
                usuarios.nome,
                usuarios.documento,
                usuarios.email,
                usuarios.foto,
                DATE_FORMAT(usuarios.criado_em, '%d/%m/%Y %H:%i') AS criado_em,
                planos.id_plano,
                planos.nome AS nome_plano,
                planos.descricao AS descricao_plano,
                planos.preco,
                telefones.numero AS telefone_numero,
                enderecos.cep,
                enderecos.numero AS endereco_numero,
                enderecos.rua,
                enderecos.complemento,
                enderecos.bairro,
                enderecos.cidade,
                enderecos.estado
            FROM usuarios

            INNER JOIN assinantes
                ON assinantes.usuario_id = usuarios.id_usuario

            INNER JOIN assinaturas
                ON assinaturas.titular_id = assinantes.usuario_id

            INNER JOIN planos 
                ON planos.id_plano = assinaturas.plano_id
            
            INNER JOIN enderecos 
                ON enderecos.id_endereco = usuarios.id_usuario
            
            INNER JOIN telefones 
                ON telefones.id_telefone = usuarios.id_usuario
                
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
    public function excluirCliente($cliente){
        $sql = "UPDATE usuarios
                    SET deletado_em = ?
                    WHERE id_usuario = ?";
        
        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, date("Y-m-d H:i:s"));
            $stmt->bindValue(2, $cliente->getId_usuario());

            $stmt->execute();

            $this->db = null;

            return "Cliente Inativado com Sucesso!";
        }
        catch(PDOException $e){
            $this->db = null;

            return "Erro ao Inativar";
        }
    }

    public function verificarCliente($cliente){
         $sql = "SELECT
                usuarios.id_usuario,
                usuarios.nome,
                usuarios.documento,
                usuarios.email,
                usuarios.senha,
                DATE_FORMAT(usuarios.criado_em, '%d/%m/%Y %H:%i') AS criado_em,
                planos.id_plano,
                planos.nome AS nome_plano,
                planos.descricao AS descricao_plano,
                planos.preco,
                telefones.numero AS telefone_numero,
                enderecos.cep,
                enderecos.numero AS endereco_numero,
                enderecos.rua,
                enderecos.complemento,
                enderecos.bairro,
                enderecos.cidade,
                enderecos.estado
            FROM usuarios

            INNER JOIN assinantes
                ON assinantes.usuario_id = usuarios.id_usuario

            INNER JOIN assinaturas
                ON assinaturas.titular_id = assinantes.usuario_id

            INNER JOIN planos 
                ON planos.id_plano = assinaturas.plano_id
            
            INNER JOIN enderecos 
                ON enderecos.usuario_id = usuarios.id_usuario

            INNER JOIN telefones 
                ON telefones.usuario_id = usuarios.id_usuario
                
            WHERE usuarios.email = ? 
                AND usuarios.deletado_em IS NULL";

        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1,$cliente->getEmail());

            $stmt->execute();

            $this->db = null;

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            $this->db = null;
            return "Erro ao Acessar o Banco de Dados";
        }
    }
}
?>
 