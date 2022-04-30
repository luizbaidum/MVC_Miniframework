<?php

    namespace MF\Model;

    //contém os trechos de código que eram identicos nos Models principais Produto.php e Info.php
    abstract class Model {

        //recebe a conexão ao DB do connection.php
        protected $db;

        public function __construct(\PDO $db) {

            $this->db = $db;
        }

    }
?>