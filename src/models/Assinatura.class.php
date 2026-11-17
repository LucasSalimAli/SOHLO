<?php
    class Assinatura {
        public function __construct(private int $id_assinatura = 0,
                                    private int $plano_id = 0,
                                    private int $titular_id = 0,
                                    private string $forma_pagamento = "",
                                    private ?Cliente $cliente = null,
                                    private ?Plano $plano = null)
    {}

        //region Getters
        public function getId_assinatura(){
            return $this->id_assinatura;
        }

        public function getPlano_id(){
            return $this->plano_id;
        }

        public function getTitular_id(){
            return $this->titular_id;
        }

        public function getForma_pagamento(){
            return $this->forma_pagamento;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function getPlanos(){
            return $this->plano;
        }
        //endregion

        //region Setters
        public function setId_assinatura($new_value){
            $this->id_assinatura = $new_value;
        }

        public function setPlano_id($new_value){
            $this->plano_id = $new_value;
        }

        public function setTitular_id($new_value){
            $this->titular_id = $new_value;
        }

        public function setForma_pagamento($new_value){
            $this->forma_pagamento = $new_value;
        }

        public function setCliente(Cliente $new_value){
            $this->cliente = $new_value;
        }

        public function setPlano(Plano $new_value){
            $this->plano = $new_value;
        }
        //endregion
    }
?>