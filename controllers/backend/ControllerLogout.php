<?php
session_start();

require_once('views/View.php');


class ControllerLogout
{
	protected $db;
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) > 1)
			throw new Exception('Page introuvable');
		else
			$this->logout();
	}


	public function logout()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);
	
		if(isset($_SESSION['users']))
		{	
			$_SESSION = array();
			session_destroy();
			$this->_view = new View('Accueil');
			$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
		}
		else
		{
			$this->_view = new View('Accueil');
			$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
		}	
	}
}	
