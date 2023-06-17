<?php 
include '../includes/config.php';

$bullet = $_POST['ftxtn'];
$update_p_id = $_POST['update_p_id'];
$rtl_inhouse = $_POST['rtl_inhouse'];
$qty_total = $_POST['qty_total'];
$prd_name = $_POST['prd_name'];
$select_brand = $_POST['select_brand'];
$itm_from = $_POST['itm_from'];
$use_for = $_POST['use_for'];
$ingredients = $_POST['ingredients'];
$itm_volume = $_POST['itm_volume'];
$prd_discription = $_POST['prd_discription'];
$prd_price = $_POST['prd_price'];

$sql = "UPDATE `product` SET `product_name`='$prd_name',`product_category`='$rtl_inhouse',`product_price`='$prd_price',`product_brand`='$select_brand',`product_from`='$itm_from',`product_use_for`='$use_for',`product_ingredients`='$ingredients',`product_volume`='$itm_volume',`about_product`='$bullet',`product_discription`='$prd_discription',`product_total`='$qty_total' WHERE `id`='$update_p_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
	echo "1";
} else {
	echo "0";
}


?>