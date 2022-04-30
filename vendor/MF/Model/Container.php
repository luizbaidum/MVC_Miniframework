<?php

    namespace MF\Model;

    use app\Connection;

    class Container {

        //static function permite usar um método sem precisar instanciar um objeto da Classe
        public static function getModel($model) {

            //objetivo: retornar o modelo instanciado, com a conexão ao BD já estabelecida

            //instancia modelo em questão
            $class = "\\app\\Models\\".ucfirst($model);

            //conexão com BD
            $conn = Connection::getDb();

            return new $class($conn);
        }
    }
?>