<?php 
include '../includes/config.php';
if ($_POST['action'] == 'login') {
	if ($_POST['username'] !== '' && $_POST['password'] !== '') {
		$username = mysqli_real_escape_string($conn, $_POST['username']); 
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$sql = "SELECT `login_id`, `login_username`, `login_password`, `status` FROM `login_credentials` WHERE login_username = '$username' AND login_password = '$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			session_start();
			$row = mysqli_fetch_assoc($result);
			$_SESSION['admin']    = $row['login_username'];
			$_SESSION['admin_id'] = $row['login_id'];
			echo "1";
		} else {
			echo "2";
		}
	} else {

	}
}





?>