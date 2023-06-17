<?php  
include '../includes/config.php';

$brand_name  =  $_POST['brand_name'];
$img       = $_FILES['brand_image']['name'];
$file_size = $_FILES['brand_image']['size'];
date_default_timezone_set("Asia/Calcutta"); 
$date = date("j-n-Y");
$time = date("g:i a");
$dt   = $date.'&'.$time;
if ($img !== '' && $brand_name !== '') {
	$temp_name = $_FILES['brand_image']['tmp_name'];
	$img_ext   = pathinfo( strtolower($img), PATHINFO_EXTENSION);
	$validExt  = array('png','jpg','jpeg','webp');
	if (in_array($img_ext, $validExt)) {
		$new_img     = rand();
		$time        = time();
		$new_imgname = 'gliss'.$new_img.substr($time, -2);
		$name_new    = $new_imgname.'.'.$img_ext;
		//../assets/img/loreal.jpg
		$path = '../../assets/img/brand/' . $name_new;
		if (move_uploaded_file($_FILES['brand_image']['tmp_name'], $path)) {
			$full_path_image = $name_new;
			$sql = "INSERT INTO `brand`(`brand_name`, `brand_logo`, `brand_status`, `brand_delete`, `brand_added_date_time`) VALUES ('$brand_name','$full_path_image','','','$dt')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "1";
			} else {
				echo "2";
			}
		} else {
			echo "3";
		}
	}
} else {
	echo "0";
}


?>