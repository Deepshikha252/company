<?php  
include '../includes/config.php';
if ($_POST['action'] == 'check_confirm') {
	$id = $_POST['id'];
	$sql = "UPDATE `subscription_payment` SET `send_mail`='1' WHERE s_no ='$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "1";
	} else {
		echo "0";
	}
}

?>