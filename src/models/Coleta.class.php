<?php
    class Coleta {
        public function __construct(private int $id_coleta = 0,
                                    private int $usuario_id = 0,
                                    private string $dia_coleta = "",
                                    private string $status_coleta = "",
                                    private ?Cliente $cliente = null
                                    ){}


        //region Getters 
        public function getId_coleta(){
            return $this->id_coleta;
        }

        public function getUsuario_id(){
            return $this->usuario_id;
        }

        public function getDia_coleta(){
            return $this->dia_coleta;
        }

        public function getStatus_coleta(){
            return $this->status_coleta;
        }

        public function getCliente(){
            return $this->cliente;
        }
        //endregion

        //region Setters
        public function setId_coleta($new_value){
            $this->id_coleta = $new_value;
        }

        public function setUsuario_id($new_value){
            $this->usuario_id = $new_value;
        }

        public function setDia_coleta($new_value){
            $this->dia_coleta = $new_value;
        }

        public function setStatus_coleta($new_value){
            $this->status_coleta = $new_value;
        }

        public function setCliente(Cliente $new_value){
            $this->cliente = $new_value;
        }
        //endregion
    }
?>