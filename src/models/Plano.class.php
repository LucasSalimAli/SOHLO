<?php
    class Plano {
        public function __construct(private int $id_plano = 0,
                                    private string $nome = "",
                                    private string $descricao = "",
                                    private float $preco = 0,
                                    
                                    //relacionamento
                                    private array $clientes = []){}

        //region Getters
        public function getId_plano(){
            return $this->id_plano;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->preco;
        }
        //endregion

        //region Setters
        public function setId_plano($new_value){
            $this->id_plano = $new_value;
        }

        public function setNome($new_value){
            $this->nome = $new_value;
        }

        public function setDescricao($new_value){
            $this->descricao = $new_value;
        }

        public function setPreco($new_value){
            $this->preco = $new_value;
        }
        //endregion
    }
?>