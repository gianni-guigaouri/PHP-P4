<?php

class View
{
	private $_file;
	private $_t;
	private $_titleJumbo;


	public function __construct($action)
	{
		ucfirst($action);
		$this->_file = 'views/view'.$action.'.php';		
	}


	public function generate($data)
	{
		$content = $this->generateFile($this->_file, $data);
		
		$view = $this->generateFile('views/template.php', array('t' => $this->_t,'content' => $content, 'titleJumbo' => $this->_titleJumbo));

		echo $view;		
	}

	//generated a view file
	private function generateFile($file, $data)
	{
		if(file_exists($file))
		{
			extract($data);

			ob_start();

			require $file;

			return ob_get_clean();
		}
		else
		{
			throw new Exception('Fichier '.$file. ' Introuvable');
		}
	}
}