<?php
session_start();

//check if user is logged in
if(!isset($_SESSION['logged_in_user']))
{
	//if the user is not logged in then do not load the current page and redirect to the login page
	$redirectPage = $_SESSION['SITE_URL'].'/admin/utilities/login.php';
	header('Location: '. $redirectPage);
}
else
{
	//the user is logged in 
	//continue loading the current page	
}

require($_SESSION['SITE_PATH']. '/admin/utilities/adminviewhelper.php');
require($_SESSION['SITE_PATH']. '/admin/model/editdb.php');


echo "Welcome " . $_SESSION['logged_in_user'];
echo "<h1>Admin Backend</h1>";
echo '<p><a href="'.$_SESSION['SITE_URL'].'/admin/utilities/logout.php">Logout</a>';

$adminViewHelper = new adminViewHelper();
$editDbObject = new Model_EditDb();
$info = $editDbObject->getInfo();
?>
<html>
<head><title>Admin Backend</title></head>
<table>
	<thead>
		<th>Lot #</th>
		<th>Lot Size</th>
		<th>Lot Availability</th>
		<th>Lot Type</th>
		<th>lot_price</th>
		<th>Optional Information</th>
		<th>Click to Edit</th>
	</thead>
	<tbody style="text-align:center">
		<?php 
		foreach($info as $rowDetail)
		{
			echo '<tr>';
			echo '<td>'. $rowDetail['lot_no'].'</td>'; 
			echo '<td>'. $rowDetail['lot_size'].'</td>';
			echo '<td>'. $rowDetail['lot_availability'].'</td>';
			echo '<td>'. $rowDetail['lot_type'].'</td>';
			echo '<td>'. $rowDetail['lot_price'].'</td>';
			echo '<td>'. $rowDetail['lot_otherinfo'].'</td>';
			echo '<td><a href="'. $adminViewHelper->generateEditLink($rowDetail) .'" target = _blank> Edit</a></td>' ;
			echo '</tr>';
		}
		?>
	</tbody>
</table>
</html>