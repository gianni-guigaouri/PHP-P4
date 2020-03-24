<?php

class DBFactory
{
	public static function getMySqlConnexionWithPDO()
	{
		$db = new PDO('mysql:host=localhost;dbname=POO_PERSO', 'root', 'root');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}