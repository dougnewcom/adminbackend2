<?php
/**
 * Contain functions to perform user administrative actions
 */
require($_SESSION['SITE_PATH'] .'/admin/utilities/connect.php');

class Model_UserDb extends Db_Connect
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function loginUser($username,$password)
	{
		try 
		{
			//get md5 equivalent of password entered
			
			//setup mysql query 
			$stmt = $this->conn->prepare('SELECT * FROM users 
										  WHERE username = :username
										  AND   password = :password');
			
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);
			
			//execute select query
			$stmt->execute();
			
			//get results and save to userInfo variable
			$userInfo = $stmt->fetchAll(PDO:: FETCH_ASSOC);
			
			return $userInfo[0];
		}
		catch(Exception $e)
		{
			echo 'ERROR: ' . $e->getMessage(); 
		}
		
	}	
} 