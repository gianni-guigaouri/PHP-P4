<?php
session_start();

require_once('views/View.php');


class ControllerLogin
{
	protected $db;
	private $_view;

	public function __construct($url)
	{
		$this->loginPage();
	}


	public function loginPage()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);
		$users = new UsersManagerPDO($this->db);

		if(isset($_SESSION['users']))
		{
			if($_SESSION['users'] == 'moderator')
			{	
				$this->_view = new View('Moderator');
				$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
			}
			elseif($_SESSION['users'] == 'admin')
			{
				$this->_view = new View('Admin');
				$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));	
			}	
		}

		elseif (isset($_POST['email']) AND isset($_POST['pwd']))
		{ 
			if($users->getUserLogin(htmlspecialchars($_POST['email'])))
			{	
				$user = $users->getUserLogin(htmlspecialchars($_POST['email']));

				$pass = password_verify($_POST['pwd'], $user->password());

					if(!$pass)
					{	
						throw new Exception('Identifiant ou mot de passe incorrect');	
					}		
					else
					{	
						$_SESSION['token'] = md5(time()*rand(175, 658));

						if($user->role() == 'moderator')
						{
							$_SESSION['users'] = 'moderator';
							$this->_view = new View('Moderator');
							$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
						}
						
						elseif($user->role() == 'admin')
						{
							$_SESSION['users'] = 'admin';
							$this->_view = new View('Admin');
							$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));
						}
						elseif($user->role() == 'utilisateur')
						{
							$_SESSION['users'] = 'utilisateur';
							$this->_view = new View('Accueil');
							$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));	
						}
					}
			}

			else
			{
				$errorMsg = 'Cette adresse mail n\'est pas enregistrée. Merci de vous inscrire ou de saisir une adresse valide.';
				$this->_view = new View('Login');
				$this->_view->generate(array('errorMsg' => $errorMsg));
			}
		}

		else
		{
			$this->_view = new View('Login');
			$this->_view->generate(array());
		}
	}
}	