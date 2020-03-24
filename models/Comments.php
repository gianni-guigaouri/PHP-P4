<?php

class Comments 
{


	protected $id,
			  $postId,
			  $author,
			  $content,
			  $state,
			  $addDate,
			  $editDate;


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

	public function isValid() 
	{
		return !(empty($this->author) || empty($this->content) || empty($this->postId));
	}


// setter

	public function setId($id) 
	{
		$this->id = (int) $id;
	}

	public function setPostId($postId) 
	{
		$this->postId = (int) $postId;
	}

	
	public function setAuthor($author) 
	{

		$this->author = $author;

	}


	public function setContent($content) 
	{

		$this->content = $content;

	}

	
	public function setState($state) 
	{

		$this->state = $state;

	}


	public function setAddDate(dateTime $addDate) 
	{
		$this->addDate = $addDate;
	}


// getters

	public function errors() {return $this->errors;}
	public function id() {return $this->id;}
	public function postId() {return $this->postId;}
	public function author() {return $this->author;}
	public function content() {return $this->content;}
	public function state() {return $this->state;}
	public function addDate() {return $this->addDate;}
	public function editDate() {return $this->editDate;}

}