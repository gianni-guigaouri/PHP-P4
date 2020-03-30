<?php

class UsersManagerPDO 
{
	protected $db;

	public function __construct() 
	{
		$this->db = DBFactory::getMySqlConnexionWithPDO();
	}

	public function add(Users $users) 
	{
		$request = $this->db->prepare('INSERT INTO users(pseudo, mail, password, role, confirmKey) VALUES(:pseudo, :mail, :password, :role, :confirmKey)');

		$request->bindValue(':pseudo', $users->pseudo());
		$request->bindValue(':mail', $users->mail());
		$request->bindValue(':password', $users->password());
		$request->bindValue(':role', $users->role());
		$request->bindValue(':confirmKey', (int) $users->confirmKey(), PDO::PARAM_INT);

		$request->execute();
	}


	public function update(Users $users) 
	{
		$request = $this->db->prepare('UPDATE users SET confirm = :confirm
		 WHERE confirmKey = :confirmKey');
		$request->bindValue(':confirm', $users->confirm());
		$request->bindValue(':confirmKey', $users->confirmKey(), PDO::PARAM_INT);

		$request->execute();

	}


	public function getUserMail($mail) 
	{
		$request = $this->db->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail');
		$request->bindValue(':mail', $mail);
		$request->execute();
		$userExist = $request->fetchColumn();

		return $userExist;
	}



	public function getUserLogin($mail) 
	{
		$request = $this->db->prepare('SELECT id, password, role, pseudo FROM users WHERE mail = :mail');
		$request->bindValue(':mail', $mail);
		$request->execute();
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
		$userExist = $request->fetch();

		return $userExist;
	}



		public function getValidation($confirmKey) 
	{
		$request = $this->db->prepare('SELECT COUNT(*) FROM users WHERE confirmKey = :confirmKey');

		$request->bindValue(':confirmKey', (int) $confirmKey, PDO::PARAM_INT);
		$request->execute();
		$validate = $request->fetchColumn();

		return $validate;
	}


		public function get($confirmKey) 
	{
		$request = $this->db->prepare('SELECT confirm FROM users WHERE confirmKey = :confirmKey');

		$request->bindValue(':confirmKey', (int) $confirmKey, PDO::PARAM_INT);
		$request->execute();
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
		$userExist = $request->fetch();

		return $userExist;
	}
}