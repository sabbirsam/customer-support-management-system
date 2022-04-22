<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}


if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_page_img'){
	$save = $crud->save_page_img();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == "save_customer"){
	$save = $crud->save_customer();
	if($save)
		echo $save;
}
if($action == "delete_customer"){
	$delete = $crud->delete_customer();
	if($delete)
		echo $delete;
}
if($action == "save_staff"){
	$save = $crud->save_staff();
	if($save)
		echo $save;
}
if($action == "save_supplier"){
	$save = $crud->save_supplier();
	if($save)
		echo $save;
}
if($action == "delete_staff"){
	$delete = $crud->delete_staff();
	if($delete)
		echo $delete;
}
if($action == "delete_supplier"){
	$delete = $crud->delete_supplier();
	if($delete)
		echo $delete;
}
if($action == "save_department"){
	$save = $crud->save_department();
	if($save)
		echo $save;
}
if($action == "save_product"){
	$save = $crud->save_product();
	if($save)
		echo $save;
}
if($action == "delete_department"){
	$delete = $crud->delete_department();
	if($delete)
		echo $delete;
}
if($action == "delete_product"){
	$delete = $crud->delete_product();
	if($delete)
		echo $delete;
}
if($action == "save_ticket"){
	$save = $crud->save_ticket();
	if($save)
		echo $save;
}
if($action == "delete_ticket"){
	$delsete = $crud->delete_ticket();
	if($delsete)
		echo $delsete;
}

if($action == "update_ticket"){
	$save = $crud->update_ticket();
	if($save)
		echo $save;
}
if($action == "save_comment"){
	$save = $crud->save_comment();
	if($save)
		echo $save;
}
if($action == "delete_comment"){
	$delsete = $crud->delete_comment();
	if($delsete)
		echo $delsete;
}

if($action == 'mail_send'){
	$mail_send = $crud->mail_send();
	if($mail_send)
		echo $mail_send;
}
if($action == 'ticket_datewise_pdf'){
	$ticket_datewise_pdf = $crud->ticket_datewise_pdf();
	if($ticket_datewise_pdf)
		echo $ticket_datewise_pdf;
}

if($action == 'update_supplier'){
	$update_supplier = $crud->update_supplier();
	if($update_supplier)
		echo $update_supplier;
}

ob_end_flush();
?>
