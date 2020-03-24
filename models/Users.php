<?php

class Users 
{
	protected $id,
			  $pseudo,
			  $mail,
			  $password,
			  $role,
			  $confirmKey,
			  $confirm;

	public function __construct($value = []) 
	{
		if(!empty($value))
		{
			$this->hydrate($value);
		}
	}


	public function hydrate($data) 
	{
		foreach ($data as $attribut => $value) 
		{
			$methode = 'set'.ucfirst($attribut);
			if(is_callable([$this, $methode]))
			{
				$this->$methode($value);
			}
		}
	}


	public function setId($id) 
	{
		$this->id = (int) $id;
	}

	public function setPseudo($pseudo) 
	{	
		$this->pseudo = $pseudo;
	}

	public function setMail($mail) 
	{
		$this->mail = $mail;
	}	
	
	public function setPassword($password) 
	{
		$this->password = $password;

	}	

	public function setRole($role) 
	{
		$this->role = $role;
	}	
	

	public function setConfirmKey($confirmKey) 
	{
		$this->confirmKey = (int) $confirmKey;
	}	

	public function setConfirm($confirm) 
	{
		$this->confirm = (int) $confirm;
	}

// getters

	public function errors() {return $this->errors;}
	public function id() {return $this->id;}
	public function pseudo() {return $this->pseudo;}
	public function mail() {return $this->mail;}
	public function password() {return $this->password;}
	public function role() {return $this->role;}
	public function confirmKey() {return $this->confirmKey;}
	public function confirm() {return $this->confirm;}

}