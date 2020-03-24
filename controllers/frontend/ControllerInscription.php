<?php
session_start();

require_once('views/View.php');


class ControllerInscription
{
	protected $db;
	private $_view;

	public function __construct($url)
	{
		$this->inscriptionPage();
	}


	public function inscriptionPage()
	{	
		$this->db = DBFactory::getMySqlConnexionWithPDO();
		$manager = new NewsManagerPDO($this->db);
		$users = new UsersManagerPDO($this->db);
		$commentsManager = new CommentsManagerPDO($this->db);

		if(isset($_SESSION['users']))
		{	
			$this->_view = new View('Accueil');
			$this->_view->generate(array('manager' => $manager, 'commentsManager' => $commentsManager));	
		}

		elseif(isset($_POST['send']))
		{	
			if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2']))
			{
				// if all input is not empty take the post value for put in variable
				$pseudo = htmlspecialchars($_POST['pseudo']); 
				$mail = htmlspecialchars($_POST['email']);
				$mail2 = htmlspecialchars($_POST['email2']);
				$password = htmlspecialchars($_POST['pwd']));
				$password2 = htmlspecialchars($_POST['pwd2']));
				$pseudolength = strlen($pseudo);

		
				if($password == $password2)
				{
					$pass_hache = password_hash($password, PASSWORD_DEFAULT);
				
					if($pseudolength <= 255)
					{
						if(filter_var($mail, FILTER_VALIDATE_EMAIL))
						{	
							if($mail == $mail2) // compare if both mail are egal
							{
								if(!$users->getUserMail($mail) > 0) // check if the mail don't exist in BDD
								{
									$lengthKey = 10;
									$key = "";
									for($i = 1; $i < $lengthKey; $i++) // if both mail are egal
									{								// generate random number for confirm key	
										$key .= mt_rand(0,9);
									}
									$newUser = new Users(['pseudo' => $pseudo,
														 'mail' => $mail,
														 'password' => $pass_hache,
														 'role' => 'utilisateur',
														 'confirmKey' => $key]);
									$users->add($newUser);
									$success = 'success';
									
									// create mail method to send confirm mail for finish the register
									$header ="MIME-version: 1.0\r\n";
									$header .='From:"jean-forteroche.com"<support@Jean-forteroche.com>'."\n"; 
									$header .='Content-Type:text/html; charset="uft-8"'."\n";
									$header .='Content-Transfer-Encoding: 8bit';  	

									$message ='
									<html>
									   <body>
									   		<div align="center">
									   		Bonjour '. $pseudo .',<br /> 
									   		Merci de confirmer votre adresse mail.<br />
									   		<a href="http://localhost/validation-'.$key.'">Cliquez sur ce lien</a>
									   		</div>
									   	</body>
									</html>';	
									mail($mail, 'Inscription au blog de Jean Forteroche', $message, $header);	
								}											

								else
								{
									$errorMsg = 'Cet email est déjà utilisé, veuillez en choisir un autre ou vous connecter !';
								}
							}
							else
							{
								$errorMsg = 'Vos email ne correspondent pas !';
							}
						}
						else
						{
							$errorMsg = 'Votre email n\'est pas valide !'; 
						}	
					}
					else
					{
						$errorMsg = 'Votre pseudo ne doit pas depasser 255 caractères !';
					}
				}
				else
				{
					$errorMsg = 'Vos mots de passe ne correspondent pas';
				}		
			}	

			else
			{
			$errorMsg = 'Tous les champs doivent etre complétés !';
			}

			if(isset($success))
			{	
				$this->_view = new View('Inscription');
				$this->_view->generate(array('success' => $success));
			}
			elseif(isset($errorMsg))
			{
				$this->_view = new View('Inscription');
				$this->_view->generate(array('errorMsg' => $errorMsg));				
			}	
		}
		
		else
		{	
			$this->_view = new View('Inscription');
			$this->_view->generate(array());
		}
	}
}	