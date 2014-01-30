<?php
/**
 * Author: Douglas Davidson 
 * Name: Admin View Helper
 * Description : Class that contains functions to assist in building admin edit page
 */

require($_SESSION['SITE_PATH'].'/admin/utilities/smartURL.php');

class adminViewHelper
{
	/**
	 * generateEditLink
	 * Description : will generate a dynamic link to edit an entry in the database
	 * 
	 * @return string
	 */
	public function generateEditLink($rowDetails)
	{
		$rootUrl = $_SESSION['SITE_URL'];
		$editPage = $rootUrl . '/admin/forms/edit.php';
		//set up the base URl
		$smartUrl = new SmartUrl($editPage);
		//add a parameter for each column in the lot db
		foreach($rowDetails as $column => $value)
		{
			//add parameters for each edit type
			$smartUrl->addParameters($column , $value);
		}
		
		//return the generated edit link
		return $smartUrl->render();
	}
	
	
}