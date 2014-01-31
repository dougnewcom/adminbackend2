<?php
session_start();

require($_SESSION['SITE_PATH'].'/admin/model/editdb.php');

/**
 * Will update database values based on entry
*/

//save all form fields from post variable as key => pairs
$postFields = $_POST['form'][0];

// call escapePostedData to Sanitize each posted field escape and save to an array
$escapedPostField = escapePostedData($postFields);

//Check for errors : call checkEmptyField that checks all submitted fields if they are empty
checkErrors($escapedPostField);

if($_SESSION['status'] == 'failed')
{
	$_SESSION['message'] = "Please Make Corrections on the form";
	$_SESSION['status'] = null;

	//go back to the form after processing data
	$callingPage = $_SERVER['HTTP_REFERER'];
	header('Location: '. $callingPage);
}else{

	//create an instance of the edit model 
	$editModel = new Model_EditDb();
	
	//perform update on the database
	$updateStatus = $editModel->updateInfo($escapedPostField);
	
	//redirect to the administration main page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/adminview.php';
	header('Location: '. $redirectPage);

	if($updateStatus)
	{
		//the row was succesfully updated
		$updatedRow = $escapedPostField['row_id'];
		$_SESSION['updatedRow'] = $updatedRow;

		//redirect to the administration main page
		$redirectPage = $_SESSION['SITE_URL'].'/admin/adminview.php';
		header('Location: '. $redirectPage);
	}else
	{
		//the update failed
		$message = 'The Update Process Failed for row #'. $escapedPostField['row_id'] .' Please Try again';
		$_SESSION['updateMessage'] = $message;

		//go back to the form
		$redirectPage = $_SESSION['SITE_URL'].'/admin/adminview.php';
		header('Location: '. $redirectPage);
	}
}

/**
 * function: setPostedData
 * description: Will escape all entries saved in the Post variable and save them to an array with keys as the form element's name.
 */
function escapePostedData($postData)
{
	//set filters for each fieldtype
	$filters = array
	(
			"lot_size" => array
			(
					"filter"=>	"FILTER_SANITIZE_SPECIAL_CHARS"
			),
			"lot_availability" => array
			(
					"filter"=>	"FILTER_SANITIZE_SPECIAL_CHARS"
			),
			"lot_price" => array
			(
					"filter"=>	"FILTER_SANITIZE_SPECIAL_CHARS"
			),
			"row_id" => array
			(
					"filter"=>	"FILTER_SANITIZE_SPECIAL_CHARS"
			)
	);

	$escapedData = filter_var_array($postData, $filters);

	return $escapedData;
}


/**
 * Function : checkEmptyField
 * Objective : Check for Empty Field Errors
 * Description : This Function will validate all mandatory fields and ensure content was entered
 *               if a mandatory field was not submitted then an error flag is set that will show the requisite error.
 * @param array $checkField
 */
function checkErrors($checkField = array())
{
	/*check Username Errors*/
	//check if Username is Empty
	if(!preg_match('/^[0-9]+(\.[0-9]+)?$/',$checkField['lot_size']))
	{
		$_SESSION['status'] = 'failed';
		$_SESSION['lot_sizeMessage'] = "Please enter a positive number or decimal for size";
	}
	
	/*check password Erors*/
	if(!preg_match('/^[0-9]+(\.[0-9]+)?$/',$checkField['lot_price']))
	{
		$_SESSION['status'] = 'failed';
		$_SESSION['lot_priceMessage'] = "Please enter a positive number or decimal for price";
	}
}