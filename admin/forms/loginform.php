<?php
/**
 * Login Form for 
 * Administrator page
 */
require($_SESSION['SITE_PATH'].'/admin/utilities/formhelper.php');

class LoginForm extends formHelper
{
	
	/**
	 * Build Login form for administrator page
	 * @return string
	 */
	function displayForm()
	{

		$html = '';
			
		//build out form
		$html .= '<form method="post" action="'. $_SESSION['SITE_URL'] .'/admin/forms/loginprocessor.php">';
			
		//table
		$html .= '<table style=" background: lemonchiffon; padding:10px;  border: 1px dashed #999999;">';
		$html .= $this->displayMessage();
		$html .= $this->displayRow('Username', '<input type="text" name="form[0][username]" value="' . (isset($_SESSION['username']) ? $_SESSION['username'] : '') . '"/>', 'username');
		$html .= $this->displayRow('Password', '<input type="text" name="form[0][password]" value="' . (isset($_SESSION['password']) ? $_SESSION['password'] : '') . '"/>', 'password');
		$html .= $this->displayRow('', '<input type="Submit" value="Login"');
		$html .= '</table>';
		$html .= '</form>';
		
		return $html;
	}
	
}  