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
	
	/**
	 * getInfo
	 * description : will get all data from the lots table
	 * @return multitype:
	 */
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
	
	
	/**
	 * updateInfo
	 * description : will get all data from the lots table
	 * @return multitype:
	 */
	function updateInfo($updateDetails)
	{
		try
		{
			//setup mysql query
			$stmt = $this->conn->prepare('UPDATE lots
										  SET lot_size = :lot_size, 
										  	  lot_availability = :lot_availability,
									  		  lot_price = :lot_price
										  WHERE row_id = :row_id ');
	
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