<?php

    class Telefone {
        public function __construct(private int $id_telefone = 0,
                                    private int $usuario_id = 0,
                                    private string $numero = "",
                                    private string $tipo_tel = "",

                                    //relacionamento
                                    private ?Usuario $usuario = null)
{}

         //region Getters
            public function getId_Telefone(){
                return $this->id_telefone;
            }

            public function getUsuario_id(){
                return $this->usuario_id;
            }

            public function getNumero(){
                return $this->numero;
            }

            public function getTipoTel(){
                return $this->tipo_tel;
            }

             public function getUsuario(){
                return $this->usuario;
            }

        //endregion

        //region Setters
            public function setId_Telefone($new_value){
                $this->id_telefone = $new_value;
            }

             public function setUsuario_id($new_value){
                $this->usuario_id = $new_value;
            }

             public function setNumero($new_value){
                $this->numero = $new_value;
            }

            public function setTipoTel($new_value){
                $this->tipo_tel = $new_value;
            }

            public function setUsuario(Usuario $new_value){
                $this->usuario = $new_value;
            }
        //endregion
    }
?>