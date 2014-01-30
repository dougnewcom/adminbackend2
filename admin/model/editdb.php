<?php
/**
 * Contain functions to get data for main admin page
*/
require($_SESSION['SITE_PATH'] .'/admin/utilities/connect.php');

class Model_EditDb extends Db_Connect
{

	function __construct()
	{
		parent::__construct();
	}

	function getInfo()
	{
		try
		{
			//get md5 equivalent of password entered
				
			//setup mysql query
			$stmt = $this->conn->prepare('SELECT * FROM lots');

			//execute select query
			$stmt->execute();
				
			//get results and save to userInfo variable
			$lotInfo = $stmt->fetchAll(PDO:: FETCH_ASSOC);
				
			return $lotInfo;
		}
		catch(Exception $e)
		{
			echo 'ERROR: ' . $e->getMessage();
		}
		
	}

}