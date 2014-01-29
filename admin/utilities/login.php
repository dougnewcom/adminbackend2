<?php
session_start();
/**
 * LoginPage View 
 */

require($_SESSION['SITE_PATH'] .'/admin/forms/loginform.php');
require($_SESSION['SITE_PATH'] .'/admin/model/userdb.php');

//create Login form object
$loginForm = new LoginForm();


/**
 * Header
 */

/**
 * Body
 */
echo "<h4>Login</h4>";
echo $loginForm->displayForm();

/**
 * Footer
 */