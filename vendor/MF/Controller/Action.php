<?php

    namespace MF\Controller;

    class Action {

        protected $view;

        public function __construct() {
            //stdClass() = classe nativa para criar objetos padrões.
            $this->view = new \stdClass();
        }

        //função que renderiza o arquivo LAYOUT em Views
		protected function render($view, $layout) {
            //parâmetro como atributo do objeto
            $this->view->page = $view;
            
            //verificar se o arquivo layout requisitado existe
            if(file_exists("../app/Views/".$layout.".phtml")) {

                require_once "../app/Views/".$layout.".phtml";
            } else {

                $this->content();
            }    
		}

        //função que insere dados em layout para exibição
        protected function content() {
            //lógica para que o sistema encontre o arquivo Views em questão de forma dinâmica
			//navega pelos diretórios de forma dinâmica
			$classeAtual =  get_class($this);

			$classeAtual = str_replace('app\\Controllers\\', '', $classeAtual);

			$classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

			//arquivo em Views a ser exibido
			require_once "../app/Views/".$classeAtual."/".$this->view->page.".phtml";
        }

    }
?>