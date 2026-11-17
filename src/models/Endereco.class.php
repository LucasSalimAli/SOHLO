<?php
    class Endereco {
        public function __construct(private int $id_endereco = 0,
                                    private int $id_usuario = 0,
                                    private string $estado = "",
                                    private string $cidade = "",
                                    private string $cep = "",
                                    private string $bairro = "",
                                    private string $rua = "",
                                    private string $numero = "",
                                    private string $complemento = "",
                                    private string $ponto_referencia = "",

                                    //relacionamento
                                    private ?Usuario $usuario = null
        ){}

         //region Getters
            public function getId_endereco(){
                return $this->id_endereco;
            }
            public function getId_usuario(){
                return $this->id_usuario;
            }

            public function getEstado(){
                return $this->estado;
            }

            public function getCidade(){
                return $this->cidade;
            }

            public function getCep(){
                return $this->cep;
            }

            public function getBairro(){
                return $this->bairro;
            }

            public function getRua(){
                return $this->rua;
            }

            public function getNumero(){
                return $this->numero;
            }

            public function getComplemento(){
                return $this->complemento;
            }

            public function getPonto_referencia(){
                return $this->ponto_referencia;
            }

            public function getUsuario(){
                return $this->usuario;
            }
        //endregion

        //region Setters
            public function setId_endereco($new_value){
                $this->id_endereco = $new_value;
            }

            public function setId_usuario($new_value){
                $this->id_usuario = $new_value;
            }

             public function setEstado($new_value){
                $this->estado = $new_value;
            }

             public function setCidade($new_value){
                $this->cidade = $new_value;
            }

             public function setCep($new_value){
                $this->cep = $new_value;
            }

             public function setBairro($new_value){
                $this->bairro = $new_value;
            }

             public function setRua($new_value){
                $this->rua = $new_value;
            }

             public function setNumero($new_value){
                $this->numero = $new_value;
            }

             public function setComplemento($new_value){
                $this->complemento = $new_value;
            }
             public function setPonto_referencia($new_value){
                $this->ponto_referencia = $new_value;
            }

            public function setUsuario(Usuario $new_value){
                $this->usuario = $new_value;
            }
        //endregion
    }
?>