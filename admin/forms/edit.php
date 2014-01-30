<?php
session_start();
/**
 * Author: Douglas Davidson 
 * Created: January 27, 2014
 * edit.php 
 * description : Create form to display edit form and point to the relevant processing pages 
 */

require($_SESSION['SITE_PATH'].'/admin/utilities/formhelper.php');

/**
 * 
 * @author Douglas
 *
 */
class editForm extends formHelper
{

	/**
	 * Description: Function that builds HTML for the contact form
	 *
	 * @return string
	 */
	function displayForm() {
			
		
	}
}

