<?php

/*SmartUrl class will make it simple to build URLs in an object oriented way*/

// $smartUrl = new SmartUrl('http://localhost/oop/');
// // $smartUrl->addParameters('id','1234');
// $smartUrl->addParameters('dest','www.google.com');
// $smartUrl->addParameters('username','obliviondoug');

// echo $smartUrl->render();

class SmartUrl{

	//private file to be accessed via the render function
	private $m_file;
	private $m_baseUrl;
	private $urlParameters = array();

	function __construct($baseUrl){
		$this->m_baseUrl =$baseUrl;
	}

	public function render(){
			
		$url = ' ';
			
		//get the url set on instantiation of the SmartUrl Class
		$baseUrl = $this->m_baseUrl;
			
		//begin building the URL String
		$url .= $baseUrl;
		$index = 0;
			
		/* make allowances for URL's with more than one URL parameter by adding an ampersand per URL Parameter */
		if(count($this->urlParameters) > 0)
		{
			$url .= '?';
			foreach($this->urlParameters as $key => $value)
			{
				//add the ampersand after each parameter except the last
				if($index >= 1)
				{
					$url .= '&';
				}
				//Add the Key/Value parameters to the url eg.
				$url .= $key.'='.$value;

				//increment the index after each Parameter found in the array
				$index++;
			}
		}
			
		// return the $url string
		return $url;
	}

	public function addParameters($parameterName, $parameterValue){
		$this->urlParameters[$parameterName] = $parameterValue;
	}
}





?>