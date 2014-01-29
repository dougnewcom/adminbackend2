<?php
/**
 * Index file
 * Description: Set global url variables. Act as a makeshift
 * BOOTSTRAP File
 */
session_start();

if($_SERVER['HTTP_HOST'] == "localhost"){
	
// Set site urls for local based development
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/adminbackend');
	$_SESSION['SITE_URL']= SITE_URL;
	
	define('SITE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/adminbackend');
	$_SESSION['SITE_PATH'] = SITE_PATH ;
}
else{ 
// Set site url for production on web
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);
	$_SESSION['SITE_URL']= SITE_URL;
	
	define('SITE_PATH', $_SERVER['DOCUMENT_ROOT']);
	$_SESSION['SITE_PATH'] = SITE_PATH ;
}

echo '<h2>Administrator Backend</h2>';
echo '<a href="admin/utilities/login.php">Click here to login </a>';

?>
