<?php
session_start();

require_once('views/View.php');

class ControllerArticle
{
	protected $db;
	protected $id;
	protected $author;
	protected $message;
	protected $content;
	protected $idComment;
	private $_view;

	public function __construct($url)
	{
		// setter for get and post data 
		$this->setId($_GET['id']);
		
		if(isset($_GET['idComment']))
		{
			$this->setIdComment($_GET['idComment']);
		}

		if(isset($_POST['author']))
		{
			$this->setAuthor(htmlspecialchars($_POST['author']));
		}
		if(isset($_POST['content']))
		{
			$this->setContent(htmlspecialchars($_POST['content']));
		}

		$this->articlePage();
	}


	public function articlePage()
	{	
		//init the manager class for connect with the BDD
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);

		$news = $manager->getUnique((int) $this->id()); // get the single news with the id 
		$countC = $commentsManager->count($this->id());


		if($this->id() !== null)
		{	
			if($this->author() !== null) 
			{	
				if(isset($_POST['token']))
				{	
					if($_POST['token'] == $_SESSION['token'])
					{	
						// create new objet comments
						$comments = new Comments(
							[
								'author' => $this->author(),
								'postId' => (int) $this->id(),
								'content' => $this->content(),
								'state' => 'Ok'
							]
						);
						// check if is valid
						if($comments->isValid())
						{
							$commentsManager->add($comments);
							$this->message = 'Votre commentaire à été ajouté';
						}
						else
						{
							$this->message = 'Votre message est invalide'; 
						}	
					}
					else
					{
						$this->message = 'Impossible d\'ajouter votre commentaire.';
					}
				}
				else
				{
					$this->message = 'Impossible d\'ajouter votre commentaire.';
				}
			}	

			else
			{	// check if there is a idcomment for reported the select comment 
				if($this->idComment() !== null)
				{	
					$comments = new Comments(
					[
						'state' => 'reported',
						'id' => $this->idComment()
					]);
					$commentsManager->signal($comments);
					$this->message = 'Le commentaire a bien été signaler';
				}	
			}
				
			$message = $this->message;		
			$this->_view = new View('Article');
			$this->_view->generate(array('news' => $news,
			'commentsManager' => $commentsManager,
			'countC' => $countC, 'message' => $message));
		}
		else
		{
			$this->_view = new View('accueil');
			$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
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


	public function setMessage($message) 
	{
		$this->message = $message;
	}


	public function setContent($content) 
	{
		$this->content = $content;
	}


	public function id(){return $this->id;}
	public function idComment(){return $this->idComment;}
	public function author(){return $this->author;}
	public function message(){return $this->message;}
	public function content(){return $this->content;}

}