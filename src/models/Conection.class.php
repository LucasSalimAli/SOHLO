<?php
    abstract class Conection {
        public function __construct(protected $db = null)
        {
            $parametros = "mysql:host=localhost;dbname=sohlo;charset=utf8mb4";

            try
            {
                $this->db = new PDO($parametros, "root", "");
            }
            catch(PDOException $e)
            {
                // echo $e->getMessage();
                die("Erro de Conexão --- Tente Novamente Mais Tarde");
            }

        }    
    }
?>