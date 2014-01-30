<?php
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
class EditForm extends formHelper
{

	/**
	 * Description: Function that builds HTML for the contact form
	 *
	 * @return string
	 */
	function displayForm() {
			
		//display form to edit dbinformation
		 
		$html = '';
			
		//build out form
		$html .= '<form method="post" action="'. $_SESSION['SITE_URL'] .'/admin/forms/editprocessor.php">';
			
		//table
		$html .= '<table style=" background: lemonchiffon; padding:10px;  border: 1px dashed #999999;">';
		$html .= $this->displayMessage();
		
		$html .= $this->displayRow('', '<input type="hidden" name="form[0][row_id]" value="' . $_GET['row_id'] . '"/>');
		$html .= $this->displayRow('Lot #', '<span> ' . $_GET['lot_no'] . '</span>');
		$html .= $this->displayRow('lot_size', '<input type="text" name="form[0][lot_size]" value="' . $_GET['lot_size'] . '"/>', 'lot_size');
		
		//check if current row is set to unavailable / available
		if($_GET['lot_availability'] == 0) 
		{
			//set the current state of the row
			$currentState = array('0', 'available');
			//set the selectable states for the row
			$selectableState = array('1', 'sold');
		}elseif($_GET['lot_availability'] == 1){
			
			//set the current state of the row
			$currentState = array('1', 'sold');
			//set the selectable states for the row
			$selectableState = array('0', 'available');
		}
		
		$html .= $this->displayRow('lot_availability',
								   '<select name="form[0][lot_availablity]">'.
								   '<option value="'. $currentState[0] . '">'. $currentState[1] . '</option>'.
								   '<option value="'. $selectableState[0] . '">'. $selectableState[1] . '</option>');
			
		
		$html .= $this->displayRow('Lot Type', '<span> ' . $_GET['lot_type'] . '</span>');
		$html .= $this->displayRow('lot_price', '<input type="text" name="form[0][lot_price]" value="' . $_GET['lot_price'] . '"/>', 'lot_price');
		
		$html .= $this->displayRow('', '<span><input type="Submit" value="Submit Changes"/></span> <span><input type="button" value="Cancel" onclick="document.location.href=\''. $_SESSION['SITE_URL'].'/admin/adminview.php' .'\'"/></span>');
		$html .= '</table>';
		$html .= '</form>';
		
		return $html;
	}
}

