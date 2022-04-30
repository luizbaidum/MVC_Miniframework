<?php

    namespace MF\Init;

    //classe abstrata = não pode ser instanciada, apenas herdada.
    abstract class Bootstrap {
        
        private $routes;

		abstract protected function initRoutes();

		//método construtor disparado no arquivo index.php
		public function __construct() {

			$this->initRoutes();
			$this->run($this->getUrl());
		}

		//manipulação do atributo $routes
		public function getRoutes() {

			return $this->routes;
		}

		//manipulação do atributo $routes
		public function setRoutes(array $routes) {

			$this->routes = $routes;
		}
						//a definição de $url tá lá em cima no constructor
        protected function run($url) {

			foreach ($this->getRoutes() as $key => $route) {

				//identifica qual url digitada pelo usuário e o leva para o local correspondente
				if($url == $route['route']) {

					$class = "app\\Controllers\\" . ucfirst($route['controller']);

					//instancia a classe $class acima
					//seria como: new app/Controllers/IndexController
					//porém aqui está dinâmico
					$controller = new $class;

					$action = $route['action'];

					$controller->$action();
				}
			}
		}

		//retorna a URL que o usuário está acessando
		protected function getUrl() {
			//$_SERVER é uma global e é um array
			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		}
    }
?>