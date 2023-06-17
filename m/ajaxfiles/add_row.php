<?php 
include '../includes/config.php';
if ($_POST['action'] == 'add_row') {
	$id = $_POST['id'];
  $row_no = $_POST['newIdno'];
	$sql = "INSERT INTO `services`(`booking_id`,`row_count`,`services_name`, `staff_name`, `time`, `qty`, `price`, `disc`, `total`, `is_delete`) VALUES ('$id','$row_no','','','','','','','','')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
    	echo "1";
    } else {
    	echo "0";
    }
} else if ($_POST['action'] == 'add_row_product') {
  $id = $_POST['id'];
  $row_no = $_POST['newIdno'];
  $sql = "INSERT INTO `product_billing`(`booking_id`, `row_count`) VALUES ('$id','$row_no')";
  $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "1";
    } else {
      echo "0";
    }
} else if ($_POST['action'] == 'delete') {
   $id = $_POST['id'];
   $row_id = $_POST['row_id'];
   $first_character = substr($row_id, 0, 1);
   if ($first_character == 's') {
     $sql = "DELETE FROM `services` WHERE `booking_id`='$id' AND `row_count`='$row_id'";
   } else if ($first_character == 'p') {
     $sql = "DELETE FROM `product_billing` WHERE `booking_id`='$id' AND `row_count`='$row_id'";
   }
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	echo "1";
   } else {
   	echo "0";
   }
} else if ($_POST['action'] == 'fetch_data') {
	$sql = "SELECT * FROM `service_pricing` WHERE 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$output = "";
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= "<option>{$row['p_services_name']} ({$row['p_service_price']}/-)</option>";
		}
		echo $output;
	} else {
		echo "<p>No data found</p>";
	}
} else if ($_POST['action'] == 'update_row_service') {
  error_reporting(E_ALL ^ E_NOTICE);
  $service  = $_POST['service'];
  $price    = $_POST['price'];
  $qty      = $_POST['qty'];
  $stotal   = $_POST['stotal'];
  $staff    = $_POST['staff'];
  $timing   = $_POST['timing'];
  $disc     = $_POST['disc'];
  $row_id   = $_POST['row_id'];
  $id       = $_POST['id'];
  $first_character = substr($row_id, 0, 1);
  if ($first_character == 's') {
    $sql = "UPDATE `services` SET `services_name`='$service',`staff_name`='$staff',`time`='$timing',`qty`='$qty',`price`='$price',`disc`='$disc',`total`='$stotal',`is_delete`='[value-11]' WHERE `booking_id`='$id' AND `row_count`='$row_id'";
  } else if ($first_character == 'p') {
    $sql = "UPDATE `product_billing` SET `product_name`='$service',`product_price`='$price',`product_qty`='$qty',`product_disc`='$disc',`product_total`='$stotal',`sold_by`='$staff' WHERE `booking_id`='$id' AND `row_count`='$row_id'";
  }
  
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "1";
  } else {
    echo "0";
  }
}


?>