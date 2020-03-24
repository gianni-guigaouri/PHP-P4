<?php

class News 
{

	protected $id,
			  $author,
			  $title,
			  $content,
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

	public function isNew() 
	{
		return empty($this->id);
	}

	public function isValid() 
	{
		return !(empty($this->author) || empty($this->title) || empty($this->content));
	}


	public function setId($id) 
	{
		$this->id = (int) $id;
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
		$this->content = $content;
	}


	public function setAddDate(dateTime $addDate) 
	{
		$this->addDate = $addDate;
	}


	public function setEditDate(DateTime $editDate)
	{
		$this->editDate = $editDate;
	}

// getters

	public function errors() {return $this->errors;}
	public function id() {return $this->id;}
	public function author() {return $this->author;}
	public function title() {return $this->title;}
	public function content() {return $this->content;}
	public function addDate() {return $this->addDate;}
	public function editDate() {return $this->editDate;}

}