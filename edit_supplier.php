<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM supplier where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_supplier.php';
?>