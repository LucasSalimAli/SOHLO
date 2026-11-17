<?php
class Cliente extends Usuario {
    public function __construct(
                                //herança
                                int $id_usuario = 0,
                                string $nome = '',
                                string $nome_social = '',
                                string $documento = '',
                                string $foto = '',
                                string $email = '',
                                string $senha = '',
                                int $id_endereco = 0,
                                string $estado = '',
                                string $cidade = '',
                                string $cep = '',
                                string $bairro = '',
                                string $rua = '',
                                string $numero_endereco = '',
                                string $complemento = '',
                                string $ponto_referencia = '',
                                int $id_telefone = 0,
                                string $numero_telefone = '',
                                string $tipo_tel = "",
                                
                                private string $descricao = "",
                                private array $planos = []) 
    {
        parent::__construct( $id_usuario, $nome, $nome_social, $documento, $foto, $email, $senha, $id_endereco, $estado, $cidade, $cep, $bairro, $rua, $numero_endereco, $complemento, $ponto_referencia, $id_telefone, $numero_telefone, $tipo_tel);
    }

    //region Getters
        public function getDescricao(){
            return $this->descricao;
        }

        // public function getColeta(){
        //     return $this->coletas;
        // }

        public function getPlanos(){
            return $this->planos;
        }
    //endregion

    //region Setters
        public function setDescrição($new_value){
            $this->descricao = $new_value;
        }

        // public function setColeta($new_value){
        //     $this->coleta[] = $new_value;
        // }

        public function setPlanos($new_value){
            $this->planos[] = $new_value;
        }
    //endregion 
}
?>