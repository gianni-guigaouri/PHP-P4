<?php

session_start();

require_once('views/View.php');

class ControllerAccueil
{
	private $_view;

	public function __construct($url)
	{
		$this->articles();
	}


	public function articles()
	{	//init the manager class for connect with the BDD
		
		$manager = new NewsManagerPDO();
		$commentsManager = new CommentsManagerPDO();

		// generate view with an array for get the variable in the view
		$this->_view = new View('Accueil');
		$this->_view->generate(array('manager' => $manager,'commentsManager' => $commentsManager));
	}
}