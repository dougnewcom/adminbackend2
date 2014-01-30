<?php
session_start();
/**
 * Author: Douglas Davidson 
 * Description: Logout the user
 */

//Logout the current user
if(isset($_SESSION['logged_in_user']))
{
	//logout the user 
	unset($_SESSION['logged_in_user']);
	
	//redirect to the login page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/utilities/login.php';
	header('Location: '. $redirectPage);
}
else
{
	//redirect to the login page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/utilities/login.php';
	header('Location: '. $redirectPage);
}