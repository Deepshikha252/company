<?php  
include '../includes/config.php';
$img       = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
date_default_timezone_set("Asia/Calcutta"); 
$date = date("j-n-Y");
$time = date("g:i a");
$dt   = $date.'&'.$time;
if ($img !== '') {
	$temp_name = $_FILES['file']['tmp_name'];
	$img_ext   = pathinfo( strtolower($img), PATHINFO_EXTENSION);
	$validExt  = array('png','jpg','jpeg','webp');
	if (in_array($img_ext, $validExt)) {
		$new_img     = rand();
		$time        = time();
		$new_imgname = 'gliss'.$new_img.substr($time, -2);
		$name_new    = $new_imgname.'.'.$img_ext;
		//../assets/img/loreal.jpg
		$path = '../../assets/img/product/' . $name_new;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
			$full_path_image = $name_new;
			$sql = "INSERT INTO `product`(`product_img`) VALUES ('$full_path_image')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$sql_f = "SELECT `id` FROM `product` WHERE `product_img`='$full_path_image'";
				$result_f = mysqli_query($conn, $sql_f);
				if (mysqli_num_rows($result_f) > 0) {
					$row = mysqli_fetch_assoc($result_f);
					echo $row['id'];
				}
			} else {
				echo "2e";
			}
		} else {
			echo "3e";
		}
	}
} else {
	echo "0e";
}


?>