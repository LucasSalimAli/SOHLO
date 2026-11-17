<?php
    abstract class Usuario {

        private ?Endereco $endereco = null;
        private array $telefones = [];


        public function __construct(protected int $id_usuario = 0,
                                    protected string $nome = "",
                                    protected string $nome_social = "", // nome fantasia para pjs
                                    protected string $documento = "",
                                    protected string $foto = "",
                                    protected string $email = "",
                                    protected string $senha = "",

                                    //composicao endereco
                                    int $id_endereco = 0,
                                    string $estado = "",
                                    string $cidade = "",
                                    string $cep = "",
                                    string $bairro = "",
                                    string $rua = "",
                                    string $numero_endereco = "",
                                    string $complemento = "",
                                    string $ponto_referencia = "",

                                    //composicao telefones
                                    int $id_telefone = 0,
                                    string $numero_telefone = "",
                                    string $tipo_tel = ""

        ){
            $this->endereco = new Endereco($id_endereco, $this->id_usuario, $estado, $cidade, $cep, $bairro, $rua, $numero_endereco, $complemento, $ponto_referencia, $this);

            $this->telefones[] = new Telefone($id_telefone, $this->id_usuario, $numero_telefone, $tipo_tel, $this);
        }

        //region Getters
            public function getId_usuario(){
                return $this->id_usuario;
            }

            public function getNome(){
                return $this->nome;
            }

            public function getNome_social(){
                return $this->nome_social;
            }

            public function getDocumento(){
                return $this->documento;
            }

            public function getFoto(){
                return $this->foto;
            }

            public function getEmail(){
                return $this->email;
            }

            public function getSenha(){
                return $this->senha;
            }

            public function getEndereco(){
                return $this->endereco;
            }

            public function getTelefones(){
                return $this->telefones;
            }
        //endregion

        //region Setters
            public function setId_usuario($new_value){
                $this->id_usuario = $new_value;
            }

             public function setNome($new_value){
                $this->nome = $new_value;
            }

             public function setNome_social($new_value){
                $this->nome_social = $new_value;
            }

             public function setDocumento($new_value){
                $this->documento = $new_value;
            }

             public function setFoto($new_value){
                $this->foto = $new_value;
            }

             public function setEmail($new_value){
                $this->email = $new_value;
            }

             public function setSenha($new_value){
                $this->senha = $new_value;
            }

            public function setEndereco($id_endereco, $estado, $cidade, $cep, $bairro, $rua, $numero, $complemento, $ponto_referencia){
                 $this->endereco = new Endereco($id_endereco, $this->id_usuario, $estado, $cidade, 
                                                $cep, $bairro, $rua, $numero, $complemento,
                                                $ponto_referencia, $this);
            }

            public function setTelefones($id_telefone, $numero_telefone, $tipo_tel){
               $this->telefones[] = new Telefone($id_telefone, $this->id_usuario, $numero_telefone, $tipo_tel, $this);
            }
        //endregion
    }
?>