<?php
/**
 * Author: Douglas Davidson
 * Created: January 27, 2014
 * Description : Form Helper Class
 */

/**
 * 
 * @author Douglas
 * Class: formHelper
 * Description: contains function to build General forms in the administration Section 
 */

class formHelper
{
		/**
		 * Description : Returns Rows for a table including two columns for information in the left and right columns
		 * @param String $titles
		 * @param String $formElement
		 * @return string
		 */
		function displayRow($titles, $formElement, $variableName = '')
		{
			//get errorkey name
			$sessionVariableName = $variableName . 'Message';	
			
			//check if an error exist for the current row
			if(isset($_SESSION[$sessionVariableName]))
			{
				$error = $_SESSION[$sessionVariableName];
				$validationMessage = '<div style="font-size: 8pt; color:red;">' . $error . '</div>';
					
				//unset session variable after showing the error for the field
				$_SESSION[$sessionVariableName] = null;		
			}
			else{
				$validationMessage = '';
			}
			$message = '<tr><td style="vertical-align:top; padding-right:15px;">' . $titles . '</td><td>' . $formElement . $validationMessage . '</td></tr>';
			
			return  $message; 
		}
		
		/**
		 * Description: The display message function will show any errors that exist in the form when submitted
		 * @return string
		 */
		function displayMessage(){
			//get and delete any previous error messages from message session variable
			if(isset($_SESSION['message'])) 
			{
				$message = $_SESSION['message'] ;
			}else $message = null;
			
			$_SESSION['message'] = '';
			if(strlen($message) > 0)
			{
				//build message
				$buildMessage = '<tr><td colspan="2" style="background-color : lemonchiffon; border: 1px dashed orange; ">' . $message . '</td></tr>';
				return $buildMessage;
			}
		
			return '';
		}
		
		
}//end of form class helper
