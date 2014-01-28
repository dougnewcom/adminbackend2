<?php
/**
 * Author: Douglas Davidson 
 * Created: January 27, 2014
 * edit.php 
 * description : Create form to display edit form and point to the relevant processing pages 
 */

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
			
		$html = '';
			
		//build out form
		$html .= '<form method="post" action="'.__ROOT__.'/phpapplications/processorderpage.php">';
			
		//table
		$html .= '<table style=" background: lemonchiffon; padding:10px;  border: 1px dashed #999999;">';
		$html .= $this->displayMessage();
		$html .= $this->displayRow('First Name', '<input type="text" name="form[0][firstname]" value="' . (isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '') . '"/>', 'firstname');
		$html .= $this->displayRow('Last Name', '<input type="text" name="form[0][lastname]" value="' . (isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '') . '"/>', 'lastname');
		$html .= $this->displayRow('Address', '<input type="text" name="form[0][address]" value="' . (isset($_SESSION['address']) ? $_SESSION['address'] : '') . '"/>', 'address');
		$html .= $this->displayRow('Age', '<input type="text" name="form[0][age]" value="' . (isset($_SESSION['age']) ? $_SESSION['age'] : '') . '"/>', 'age');
		$html .= $this->displayRow('', '<input type="Submit" value="Submit Docs"');
		$html .= '</table>';
		$html .= '</form>';
	
		return $html;
	}
}

