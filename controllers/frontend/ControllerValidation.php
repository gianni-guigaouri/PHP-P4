<?php
session_start();

require_once('views/View.php');


class ControllerValidation
{
	protected $db;
	private $_view;

	public function __construct($url)
	{
		$this->validationPage();
	}


	public function validationPage()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$users = new UsersManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);

		if(isset($_GET['id']))
		{
			if($users->getValidation($_GET['id']) > 0)
			{		
				$test = $users->get($_GET['id']);
				if($test->confirm() == 1)
				{
					$this->_view = new View('accueil');
					$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));		
				}

				else
				{
					$updateUser = new Users(
						['confirm' => 1, 
						 'confirmKey' => $_GET['id']]);
					$users->update($updateUser);
					$_SESSION['users'] = $_GET['id'];
					$this->_view = new View('validation');
					$this->_view->generate(array());	
				}
			}
			else
			{
				$this->_view = new View('Accueil');
				$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));			
			}	
		}
		else
		{
			$this->_view = new View('Accueil');
			$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));	
		}
	}
}	