<?php

class NewsManagerPDO  extends NewsManager 
{

	protected $db;

	public function __construct() 
	{
		$this->db = DBFactory::getMySqlConnexionWithPDO();
	}	


	protected function add(News $news) 
	{
		$request = $this->db->prepare('INSERT INTO news(userId, author, title, content, addDate, editDate) VALUES(:userId, :author, :title, :content, NOW(), NOW())');

		$request->bindValue(':userId', $news->userId(), PDO::PARAM_INT);
		$request->bindValue(':author', $news->author());
		$request->bindValue(':title', $news->title());
		$request->bindValue(':content', $news->content());

		$request->execute();
	}


	public function delete($id) 
	{
		$this->db->exec('DELETE FROM news WHERE id = '.(int) $id);
	}


	public function update(News $news) 
	{
		$request = $this->db->prepare('UPDATE news SET author = :author, title = :title, content = :content,
			editDate = NOW() WHERE id = :id');

		$request->bindValue(':author', $news->author());
		$request->bindValue(':title', $news->title());
		$request->bindValue(':content', $news->content());
		$request->bindValue(':id', $news->id(), PDO::PARAM_INT);

		$request->execute();

	}


	public function count() 
	{
		return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
	}


	public function getList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, author, title, content, addDate, editDate FROM news ORDER BY id ASC';

		if($start != -1 || $limit != -1)
		{
			$sql .= ' LIMIT ' .(int) $limit.' OFFSET '.(int) $start; 
		}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
		$listNews = $request->fetchAll();

		foreach ($listNews as $news)
		{
			$news->setAddDate(new DateTime($news->addDate()));
			$news->setEditDate(new DateTime($news->editDate()));
		}
		$request->closeCursor();

		return $listNews;
	}
	
	public function getUnique($id) 
	{
		$request = $this->db->prepare('SELECT id, author, title, content, addDate, editDate FROM news WHERE id = :id');

		$request->bindValue(':id', (int) $id, PDO::PARAM_INT);
		$request->execute();

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

		$news = $request->fetch();

		$news->setAddDate(new DateTime($news->addDate()));
		$news->setEditDate(new DateTime($news->editDate()));

		return $news;
	}

}