<?php
	
	//neste caso como Route.php está dentro do diretório app, segue:
	//para ver os namespaces ir em composer.json
	namespace app;

	use MF\Init\Bootstrap;

	class Route extends Bootstrap {

		//define quais rotas a aplicação possui
		protected function initRoutes() {

			$routes['home'] = array(

				'route' => '/',
				'controller' => 'IndexController',
				'action' => 'index'
			);

			$routes['sobre_nos'] = array(

				'route' => '/sobre_nos',
				'controller' => 'IndexController',
				'action' => 'sobreNos'
			);

			$this->setRoutes($routes);
		}
	}
?>	