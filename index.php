<?php
/**
 * Index file
 * Description: Set global url variables. Act as a makeshift
 * BOOTSTRAP File
 */
session_start();

if($_SERVER['HTTP_HOST'] == "localhost"){
	
// Set site urls for local based development
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/adminbackend2');
	$_SESSION['SITE_URL']= SITE_URL;
	
	define('SITE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/adminbackend2');
	$_SESSION['SITE_PATH'] = SITE_PATH ;
}
else{ 
// Set site url for production on web
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] );
	$_SESSION['SITE_URL']= SITE_URL;
	
	define('SITE_PATH', $_SERVER['DOCUMENT_ROOT']);
	$_SESSION['SITE_PATH'] = SITE_PATH ;
}


/**
 * redirect to default admin application or call login
 **/
if(!isset($_SESSION['logged_in_user']))
{
	//The user is not logged in so redirect them to the login page
	//redirect to the login page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/utilities/login.php';
	header('Location: '. $redirectPage);
}
else 
{
	//the user is logged in 
	//redirect to the administrator main page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/adminview.php';
	header('Location: '. $redirectPage);
}

?>
