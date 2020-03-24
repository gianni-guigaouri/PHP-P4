<?php
session_start();

require_once('views/View.php');

class ControllerModerator
{
	protected $db;
	protected $IdComment;
	protected $action;
	protected $mode;
	protected $message;


	private $_view;

	public function __construct($url)
	{
			
		if(isset($_GET['idComment']))
		{
			$this->setIdComment($_GET['idComment']);
		}
				

		if(isset($_GET['action']))
		{
			$this->setAction($_GET['action']);
		}

		if(isset($_GET['mode']))
		{
			$this->setMode($_GET['mode']);
		}			

		$this->moderatorPage();
	}


	public function moderatorPage()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);
		$users = new UsersManagerPDO($this->db);
			
		if($this->action() != null)
		{	
			
			if($this->action() == 'comments')
			{
				if($this->mode() == 'validate')
				{	
					$comments = new Comments(
					[
						'state' => 'valid',
						'id' => $this->idComment()
					]);
					$this->message = 'Le commentaire a bien été accepté';
					$commentsManager->update($comments);
					$message = $this->message;
					$this->_view = new View('Moderator');
					$this->_view->generate(array(
					'manager' => $manager, 'commentsManager' => $commentsManager,
					'message' => $message));
				}
				elseif($this->mode() == 'delete')
				{
					$comments = $commentsManager->delete((int) $this->idComment());
					$this->message = 'Le commentaire a bien été supprimée !';
					$message = $this->message;
					$this->_view = new View('Moderator');
					$this->_view->generate(array(
					'manager' => $manager, 'commentsManager' => $commentsManager,
					'message' => $message));							
				}	
			}	
		}

		else
		{	
			if(isset($_SESSION['users']))
			{
				if($_SESSION['users'] =='moderator')
				{	
					$this->_view = new View('Moderator');
					$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));	
				}
				else
				{
					$this->_view = new View('Accueil');
					$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
				}
			}

			else
			{
				$this->_view = new View('Login');
				$this->_view->generate(array());	
			}				
		}	
	}


	public function setIdComment($idComment) 
	{
		$this->idComment = (int) $idComment;
	}


	public function setAction($action) 
	{
		$this->action = $action;
	}

	public function setMode($mode) 
	{
		$this->mode = $mode;
	}	


	public function idComment(){return $this->idComment;}
	public function action(){return $this->action;}
	public function mode(){return $this->mode;}
}
