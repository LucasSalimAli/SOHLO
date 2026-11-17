<?php
    class UsuarioDAO extends Conection {

    public function __construct($db = null) {
        parent::__construct($db);
    }

    public function verificarCliente($usuario){
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
                ON enderecos.id_endereco = usuarios.id_usuario
            
            INNER JOIN telefones 
                ON telefones.id_telefone = usuarios.id_usuario
                
            WHERE usuarios.email = ?";
        try{
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(1, $usuario->getEmail());

            $this->db = null;

            $return = $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
?>