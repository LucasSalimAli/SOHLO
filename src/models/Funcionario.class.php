<?php
class Funcionario extends Usuario
{
    public function __construct(private string $cargo = "",
                                private ?Perfil $perfil = null,

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
                                string $tipo_tel = "") 
    {
        parent::__construct( $id_usuario, $nome, $nome_social, $documento, $foto, $email, $senha, $id_endereco, $estado, $cidade, $cep, $bairro, $rua, $numero_endereco, $complemento, $ponto_referencia, $id_telefone, $numero_telefone, $tipo_tel);
    }

    //region Getters
        public function getCargo(){
            return $this->cargo;
        }

        public function getPerfil(){
            return $this->perfil;
        }
    //endregion

    //region Setters
        public function setCargo($new_value){
            $this->cargo = $new_value;
        }

        public function setPerfil(Perfil $new_value){
            $this->perfil = $new_value;
        }
    //endregion 
}
?>