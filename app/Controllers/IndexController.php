<?php 
	
	//neste caso como IndexController.php está dentro do diretório Controllers, segue:
	//para ver os namespaces ir em composer.json
	namespace app\Controllers;

	//recursos do miniframework
	use MF\Controller\Action;
	use MF\Model\Container;
	//models
	use app\Models\Produto;
	use app\Models\Info;

	//a classe leva o mesmo nome do arquivo
	class IndexController extends Action {

		//esses métodos (funções) representam as actions lá na function initRoutes() em Route.php
		public function index() {

			//retornado: conexão com DB e Model em questão
			$produto = Container::getModel('Produto');

			$produtos = $produto->getProdutos();

			$this->view->dados = $produtos;

			//carregamento e renderização da página p/ o usuário
			$this->render('index', 'layout1');	
		}

		public function sobreNos() {

			//retornado: conexão com DB e Model em questão
			$info = Container::getModel('Info');

			$infos = $info->getInfo();

			$this->view->dados = $infos;

			//carregamento e renderização da página p/ o usuário
			$this->render('sobreNos', 'layout2');
		}
	}
?>