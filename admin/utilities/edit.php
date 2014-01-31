<?php
session_start();
/**
 * EditPage View 
 */

//check if user is logged in
if(!isset($_SESSION['logged_in_user']))
{
	//if the user is not logged in then do not load the current page and redirect to the login page
	!isset($_SESSION['SITE_URL']) 
	? $redirectPage = '../../index.php'
	: $redirectPage = $_SESSION['SITE_URL'].'/admin/utilities/login.php'; 
	
	header('Location: '. $redirectPage);
}
else
{
	//the user is logged in
	//continue loading the current page
}

require($_SESSION['SITE_PATH'] .'/admin/forms/editform.php');
require($_SESSION['SITE_PATH'] .'/admin/model/editdb.php');

//create Edit form object
$editForm = new EditForm();


/**
 * Header
 */

/**
 * Body
 */
echo "<h2>Edit</h2>";
echo $editForm->displayForm();

/**
 * Footer
 */