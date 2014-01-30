<?php
session_start();
/**
 * EditPage View 
 */

require($_SESSION['SITE_PATH'] .'/admin/forms/editform.php');
require($_SESSION['SITE_PATH'] .'/admin/model/editdb.php');

//create Login form object
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