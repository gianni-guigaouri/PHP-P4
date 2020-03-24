<?php
session_start();

require_once('views/View.php');

class ControllerAdmin
{
	protected $db;
	protected $id;
	protected $IdComment;
	protected $author;
	protected $title;
	protected $content;
	protected $action;
	protected $mode;
	protected $message;


	private $_view;

	public function __construct($url)
	{
			
		if(isset($_GET['id']))
		{
		$this->setId($_GET['id']);
		}
		if(isset($_POST['id']))
		{
		$this->setId($_POST['id']);
		}

		if(isset($_GET['idComment']))
		{
			$this->setIdComment($_GET['idComment']);
		}
		if(isset($_POST['author']))
		{
			$this->setAuthor(htmlspecialchars($_POST['author']));
		}
		if(isset($_POST['title']))
		{
			$this->setTitle(htmlspecialchars($_POST['title']));
		}			

		if(isset($_POST['content']))
		{
			$this->setContent($_POST['content']);
		}

		if(isset($_GET['action']))
		{
			$this->setAction($_GET['action']);
		}

		if(isset($_GET['mode']))
		{
			$this->setMode($_GET['mode']);
		}			

		$this->adminPage();
	}


	public function adminPage()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);
		$users = new UsersManagerPDO($this->db);
			
			if($this->action() != null)
			{					
				if($this->action() == 'edit')
				{	
					$news = $manager->getUnique((int) $this->id());
					$this->_view = new View('Admin');
					$this->_view->generate(array(
					'manager' => $manager, 'commentsManager' => $commentsManager,
					'news' => $news));	
				}

				if($this->action() == 'delete')
				{
					$news = $manager->delete((int) $this->id());
					$this->message = 'La news a bien été supprimée !';
					$message = $this->message;
					$this->_view = new View('Admin');
					$this->_view->generate(array(
				'manager' => $manager, 'commentsManager' => $commentsManager,
				'message' => $message));
				}	

				if($this->action() == 'comments')
				{
					if(isset($_GET['token']))
					{	
						if($_GET['token'] == $_SESSION['token'])
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
								$this->_view = new View('Admin');
								$this->_view->generate(array(
								'manager' => $manager, 'commentsManager' => $commentsManager,
								'message' => $message));
							}
							if($this->mode() == 'delete')
							{
								$comments = $commentsManager->delete((int) $this->idComment());
								$this->message = 'Le commentaire a bien été supprimée !';
								$message = $this->message;
								$this->_view = new View('Admin');
								$this->_view->generate(array(
								'manager' => $manager, 'commentsManager' => $commentsManager,
								'message' => $message));							
							}
						}
					}		
				}	

			}


		elseif ($this->author() != null)
		{
			
			if(isset($_POST['token']))
			{	
				if($_POST['token'] == $_SESSION['token'])
				{
					$news = new News(
					[
							'author' => $this->author(),
							'title' => $this->title(),
							'content' => $this->content()
						]
					);
					
					if($this->id() != null)

					{
					$news->setId($this->id());
					}

					if($news->isValid())
					{
						$manager->save($news);
					
						$this->message = $news->isNew() ? 
						'La news a bien été ajoutée !' : 
						'La news a bien été modifiée !';
					}
					$message = $this->message;
					$this->_view = new View('admin');
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

				if($_SESSION['users'] == 'admin')
				{	
					$message = $this->message;
					$this->_view = new View('Admin');
					$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager,
						'message' => $message));	
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

	public function setId($id) 
	{
		$this->id = (int) $id;
	}

	public function setIdComment($idComment) 
	{
		$this->idComment = (int) $idComment;
	}


	public function setAuthor($author) 
	{
		$this->author = $author;
	}


	public function setTitle($title) 
	{
		$this->title = $title;

	}


	public function setContent($content) 
	{
		if (!is_string($content) || empty($content))
		{
			$this->message = 'Veuillez saisir un article.';
		}
		else
		{
			$this->content = $content;
		}
	}	


	public function setAction($action) 
	{
		$this->action = $action;
	}

	public function setMode($mode) 
	{
		$this->mode = $mode;
	}	


	public function id(){return $this->id;}
	public function idComment(){return $this->idComment;}
	public function author(){return $this->author;}
	public function title(){return $this->title;}
	public function content(){return $this->content;}
	public function action(){return $this->action;}
	public function mode(){return $this->mode;}
}
