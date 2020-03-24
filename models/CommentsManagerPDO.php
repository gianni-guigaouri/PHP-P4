<?php

class CommentsManagerPDO 
{

	protected $db;

	public function __construct(PDO $db) 
	{
		$this->db = $db;
	}

	public function add(Comments $comments) 
	{
		$request = $this->db->prepare('INSERT INTO comments(postId, author, content, state, addDate) VALUES(:postId, :author, :content, :state, NOW())');

		$request->bindValue(':postId', $comments->postId());
		$request->bindValue(':author', $comments->author());
		$request->bindValue(':content', $comments->content());
		$request->bindValue(':state', $comments->state());

		$request->execute();
	}


	public function delete($id) 
	{
		$this->db->exec('DELETE FROM comments WHERE id = '.(int) $id);
	}


	public function update(Comments $comments) 
	{
		$request = $this->db->prepare('UPDATE comments SET state = :state
		 WHERE id = :id');

		$request->bindValue(':state', $comments->state());
		$request->bindValue(':id', $comments->id(), PDO::PARAM_INT);

		$request->execute();

	}


		public function signal(Comments $comments) 
	{
		$request = $this->db->prepare('UPDATE comments SET state = :state WHERE id = :id');

		$request->bindValue(':state', $comments->state());
		$request->bindValue(':id', $comments->id(), PDO::PARAM_INT);

		$request->execute();

	}


	public function count($postId) 
	{
		$request = $this->db->prepare('SELECT COUNT(*) FROM comments WHERE postId = :postId');
		$request->bindValue(':postId', (int) $postId, PDO::PARAM_INT);
		$request->execute();
		$countComments = $request->fetchColumn();
		return $countComments;
	}



	public function countReported() 
	{
		$request = $this->db->query('SELECT COUNT(*) FROM comments WHERE state = "reported"');
		$countComments = $request->fetchColumn();
		return $countComments;
	}



	public function getList($postId) 
	{
		$request = $this->db->prepare('SELECT id, author, content, state, addDate FROM comments WHERE postId = :postId ORDER BY id DESC');
		$request->bindValue(':postId', (int) $postId, PDO::PARAM_INT);
		$request->execute();

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comments');
		$listComments = $request->fetchall();

		foreach ($listComments as $comment)
		{
			$comment->setAddDate(new DateTime($comment->addDate()));
		}

		return $listComments;
	}



		public function getListReported() 
	{
		$request = $this->db->query('SELECT id, author, content, state, addDate FROM comments WHERE state = "reported" ORDER BY id DESC');

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comments');
		$listComments = $request->fetchall();

		foreach ($listComments as $comment)
		{
			$comment->setAddDate(new DateTime($comment->addDate()));
		}

		return $listComments;
	}
}