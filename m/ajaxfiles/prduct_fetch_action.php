<?php  
include '../includes/config.php';

if ($_POST['action'] == 'get_brand') {
	$sql = "SELECT `s_no`, `brand_name`, `brand_logo`, `brand_status`, `brand_delete`, `brand_added_date_time` FROM `brand` WHERE `brand_delete`='0'";
	$result = mysqli_query($conn ,$sql);
	$output = "";
	if (mysqli_num_rows($result) > 0) {
		$sn = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$status = '';
			$color = '';
			if ($row['brand_status'] == '0') {
				$status = 'Active';
				$color = 'btn-success';
			} else {
				$status = 'Deactive';
				$color = 'btn-danger';
			}
			$output .= "<tr>
	                      <td>{$sn}</td>
	                      <td><input class='border-0 brnd_name_edit' type='text' name='brand_name' readonly value='{$row['brand_name']}' data-id='{$row['s_no']}'></td>
	                      <td><button class='w-100 d-block btn btn-sm {$color} brnd_active' data-active='{$row['brand_status']}' data-id='{$row['s_no']}'>{$status}</button></td>
	                      <td><button class='w-100 d-block btn btn-sm btn-warning brnd_edit'><i class='bi bi-pencil-square'></i></button></td>
	                      <td><button class='w-100 d-block btn btn-sm btn-danger brnd_delete' data-delete='{$row['s_no']}'><i class='bi bi-trash'></i></button></td>
	                    </tr>";
	                    $sn ++;
		}
		echo $output;
	} else {
		echo "<p>No Records Found </p>";
	}
	
} else if ($_POST['action'] == 'delete_brand') {
	$id = $_POST['id'];
	$set = '1';
	$sql = "UPDATE `brand` SET `brand_delete`='$set' WHERE `s_no`='$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "1";
	} else {
		echo "0";
	}
} else if ($_POST['action'] == 'active_brand') {
	$id = $_POST['id'];
	$status = $_POST['status'];
	$new_status = '';
	if ($status == '1') {
		$new_status = '0';
	} else {
		$new_status = '1';
	}
	$sql = "UPDATE `brand` SET `brand_status`='$new_status' WHERE `s_no`='$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "1";
	} else {
		echo "0";
	}
} else if ($_POST['action'] == 'edit_brand') {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$sql = "UPDATE `brand` SET `brand_name`='$name' WHERE `s_no`='$id'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "1";
	} else {
		echo "0";
	}
} else if ($_POST['action'] == 'get_product') {
	$sql = "SELECT `s_no`, `brand_name`, `brand_logo`, `brand_status`, `brand_delete`, `brand_added_date_time` FROM `brand` WHERE `brand_delete`='0'";
	$result = mysqli_query($conn ,$sql);
	$output = "";
	if (mysqli_num_rows($result) > 0) {
		$output = "<option selected disabled></option>";
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= "<option>{$row['brand_name']}</option>";
		}
		echo $output;
	} else {
		echo "<p>No Records Found </p>";
	}
}



?>