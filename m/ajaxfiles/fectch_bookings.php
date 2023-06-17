<?php 
include '../includes/config.php';
if ($_POST['action'] == 'bookings') {
	$sql = "SELECT * FROM `appointment_data` ORDER BY s_no DESC";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$output  =  "";
// $date = date("j-n-Y");
// $time = date("g:i a");
		$i = '1';
		while ($row = mysqli_fetch_assoc($result)) {
			$status = "";
			if ($row['status'] == 1) {
				$status = "<div class='upcoming comman_status up_yellow'>Upcoming</div>";
			} else if ($row['status'] == 2) {
				$status = "<div class='completed comman_status up_green'>Completed</div>";
			} else if ($row['status'] == 3) {
				$status = "<div class='cancelled comman_status up_red'>Cancelled</div>";
			}
			$schedule = "";
			if ($row['scheduling'] == 0) {
				$schedule = "<button class='btn btn-dark btn-sm p-0 w-100 not_confirmed' data-bs-toggle='tooltip' title='Click to Confirm'>Not Confirmed</button>";
			} else if ($row['scheduling'] == 1) {
				$schedule = "<button class='btn btn-success btn-sm p-0 w-100 not_confirmed'>Confirmed</button>";
			}
			if ($row['date'] == date("j-n-Y")) {
				
			}

			$output  .=  "<tr>
	                        <td class='text-center'>{$i}</td>
	                        <td>{}</td>
	                        <td>{$row['name']}</td>
	                        <td>{$row['gender']}</td>
	                        <td>{$row['contact']}</td>
	                        <td>{$row['email']}</td>
	                        <td>{$row['service_type']}</td>
	                        <td>{$row['preferred_date']}</td>
	                        <td><div class='d-flex justify-content-between'><input type='text' name='' value='{$row['preferred_time']}' class='time' readonly><button class='btn btn-sm'><i class='bi bi-pencil-square'></i></button></div></td>
	                        <td>{$status}</td>
	                        <td>{$schedule}</td>
	                        <td><a href='client-folio.php?booking-id={$row['bill_id']}' class='btn btn-primary btn-sm p-0 w-100 not_confirmed'>Action</a></td>
                        </tr>";
                        $i++;

                        
		}
		echo $output;
	} else {
		echo "No bookings are available";
	}
} else {
	echo "Something went wrong !";
}
// SELECT `s_no`, `date`, `time`, `name`, `gender`, `contact`, `email`, `service_type`, `preferred_date`, `preferred_time`, `status`, `scheduling`, `assign_to` FROM `appointment_data` WHERE 1

?>