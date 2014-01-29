<?php
// php connection class 
  class Db_Connect  {	  public $conn;
	  function __construct()	  {
		try{
			$this->conn = new PDO('mysql:host=localhost;dbname=frantom_dev', 'root', '');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo 'connected to db';
			}
		catch(PDOExcepton $e)
		{			//echo 'not connected to db';			echo 'ERROR: ' . $e->getMessage();		}	  }}