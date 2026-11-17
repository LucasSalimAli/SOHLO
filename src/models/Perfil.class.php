<?php
    class Perfil {
        public function __construct(private int $id_perfil = 0,
                                    private string $nome = "",
                                    private string $descricao = "",
                                    private array $permissoes = [],

                                    //relacionamento
                                    private array $funcionarios = []
                                    
        ){}

        //region Getters

            public function getIdPerfil(){
                return $this->id_perfil;
            }
            public function getNome(){
                return $this->nome;
            }

            public function getDescricao(){
                return $this->descricao;
            }

            public function getFuncionarios(){
                return $this->funcionarios;
            }

            public function getPermissoes(){
                return $this->permissoes;
            }
        //endregion

        //region Setters
            public function setIdPerfil($new_value){
                $this->id_perfil = $new_value;
            }
            public function setNome($new_value){
                $this->nome = $new_value;
            }

            public function setDescrição($new_value){
                $this->descricao = $new_value;
            }

            public function setFuncionarios(Funcionario $new_value){
                $this->funcionarios[] = $new_value;
            }

            public function setPermissoes($new_value){
                $this->permissoes[] = $new_value;
            }
        //endregion
    }
?>
