<?php

    namespace app;

    class Connection {
        //qualquer script poderá acessar o BD com este método
        public static function getDb() {

            try {
                //conexão com o banco de dados
                $conn = new \PDO(

                    "mysql:host=localhost;dbname=mvc;charset=utf8",
                    "root",
                    "" ); 

                    return $conn;

            } catch(\PDOException $e) {

                //.. tratar de alguma forma ..//
                echo 'testando se erro';
            }
        }
    }

?>