<?php

require_once('views/View.php');

class Router
{

	private $_ctrl;
	private $_view;
	


	public function routeRequests()
	{
		try
		{	// automatic load of class
			spl_autoload_register(function($class)
			{
				require_once('models/'.$class.'.php');
			});

			$url = [];

			// Controller depend of the action of user
			if(isset($_GET['url']))
			{
				$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = "Controller".$controller;
		
				if($controllerFile = "controllers/backend/".$controllerClass.".php")
				{	// method to verify if the controller is on backend or frontend folder
					if(file_exists($controllerFile))
					{
						require_once($controllerFile);
						$this->_ctrl = new $controllerClass($url);
					}
				
					elseif($controllerFile = "controllers/frontend/".$controllerClass.".php")
					{	
						if(file_exists($controllerFile))
						{
							require_once($controllerFile);
							$this->_ctrl = new $controllerClass($url);
						}
						else
						{
							throw new Exception('Page introuvable.');
						}
					}	
				}
			}
			else
			{
				require_once('controllers/frontend/ControllerAccueil.php');
				$this->_ctrl = new ControllerAccueil($url);
			}
		}

		// errors manage
		catch(Exception $e)
		{
			$errorMsg = $e->getMessage();
			if ($errorMsg == 'Identifiant ou mot de passe incorrect')
			{
				$this->_view = new View('Login');
				$this->_view->generate(array('errorMsg' => $errorMsg));	
			}
			else
			{	
			$this->_view = new View('Error');
			$this->_view->generate(array('errorMsg' => $errorMsg));
			}
		}
	}
}