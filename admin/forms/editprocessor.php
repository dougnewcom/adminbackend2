<?php
session_start();

require($_SESSION['SITE_PATH'].'/admin/model/editdb.php');

/**
 * Will update database values based on entry
*/

//save all form fields from post variable as key => pairs
$postFields = $_POST['form'][0];

var_dump($postFields); exit;

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

	//create an instance of the usermodel and check the db if their exists a user matching username and password submitted
	$userModel = new Model_UserDb();
	$username = $escapedPostField['username'];
	$password = $escapedPostField['password'];

	//check if user authenticates successfully
	$userAuthentication = $userModel->loginUser($username, $password);

	if($userAuthentication)
	{
		//the user authenticates succesfully
		$userLoggedIn = $userAuthentication['firstname'];
		$_SESSION['logged_in_user'] = $userLoggedIn;

		//redirect to the administration main page
		$redirectPage = $_SESSION['SITE_URL'].'/admin/adminview.php';
		header('Location: '. $redirectPage);
	}else
	{
		//the user authentication failed
		$message = 'Username or Password was incorrect. Please try again';
		$_SESSION['message'] = $message;

		//go back to the form
		$callingPage = $_SERVER['HTTP_REFERER'];
		header('Location: '. $callingPage);
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
			"username" => array
			(
					"filter"=>	"FILTER_SANITIZE_SPECIAL_CHARS"
			),
			"password" => array
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
	if(strlen(trim($checkField['username'])) == 0)
	{
		$_SESSION['status'] = 'failed';
		$_SESSION['usernameMessage'] = "Please fill in your username";
	}

	/*check password Erors*/
	if(strlen(trim($checkField['password'])) == 0)
	{
		$_SESSION['status'] = 'failed';
		$_SESSION['passwordMessage'] = "Please fill in your Password";
	}
}