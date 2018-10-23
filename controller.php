<?php

//include_once("model/Model.php");

class Controller {  
     public $model;
     public $title;  
  
     public function __construct()    
     {    
        //$this->model = new Model(); 
     }   
     
     public function invoke()  
     {

     	function getCurrentUri()
    	{
	        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
	        $uri = '/' . trim($uri, '/');
	        return $uri;
    	}

     	$base_url = getCurrentUri();
		
     	if ($base_url === '/') {
    		// Home page
    		$title = "Template Page";
			include("view/header.php");

			include("view/home.php");

		}else if (preg_match('/^\/services$/i', $base_url)) {
    		// Hand off to another router to handle /grouping/* URIs
			$title = "Services | Template Page";
			include("view/header.php");

			include("view/services.php");
				

		}else if (preg_match('/^\/categories$/i', $base_url)) {
			$title = "Categories | Template Page";
			include("view/header.php");

			include("view/categories.php");

		}else if (preg_match('/^\/contact$/i', $base_url)) {
			$title = "Contact | Template Page";
			include("view/header.php");

			include("view/contact.php");

		}else if (preg_match('/^\/about$/i', $base_url)) {
			$title = "About | Template Page";
			include("view/header.php");

			include("view/about.php");

		}else{
			// Handle that 404
			$title = "404 Error | Template Page";
			include("view/header.php");

			include("view/404.php");
		}		

        include("view/footer.php");
	} 
}

?>
