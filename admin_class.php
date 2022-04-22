<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		if($type ==1)
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM users where username = '".$username."' and password = '".md5($password)."' ");

			if(mysqli_num_rows($qry)==1)
				{
					$_SESSION['email']=$username;
					mysqli_query($this->db,"UPDATE users SET status = 1 WHERE username = '".$username."'");
					
				}
				
		elseif($type ==2)
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff where email = '".$username."' and password = '".md5($password)."' ");
		
			if(mysqli_num_rows($qry)==1)
				{
					$_SESSION['email']=$username;
					mysqli_query($this->db,"UPDATE staff SET status = 1 WHERE username = '".$username."'");
					
				}

		elseif($type ==3)
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM customers where email = '".$username."' and password = '".md5($password)."' ");
				if(mysqli_num_rows($qry)==1)
				{
					$_SESSION['email']=$username;
					mysqli_query($this->db,"UPDATE customers SET status = 1 WHERE username = '".$username."'");
				
				}
		// supplier 
		elseif($type ==4)
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM supplier where email = '".$username."' and password = '".md5($password)."' ");
				if(mysqli_num_rows($qry)==1)
				{
					$_SESSION['email']=$username;
					mysqli_query($this->db,"UPDATE supplier SET status = 1 WHERE username = '".$username."'");
				
				}


			if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			$_SESSION['login_type'] = $type;
				return 1;
		}else{
			return 3;
		}
	}


	

	function signup_customer(){

		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			print_r($k);
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM customers where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO customers set $data");
		}else{
			$save = $this->db->query("UPDATE customers set $data where id = $id");
		}

		if($save)
			return 1;
			
	}
	
	// function signup_customer(){

	// 	extract($_POST);

	// 	extract($_POST);
	// 	$data = "";
	// 	foreach($_POST as $k => $v){
	// 		print_r($k);
	// 	}

	// 	$id = $_POST['sid'];
	// 	$firstname = $_POST['signup-firstname'];
	// 	$lastname = $_POST['signup-lastname'];
	// 	$middlename = $_POST['signup-middlename'];
	// 	$contact = $_POST['signup-contact'];
	// 	$address = $_POST['signup-address'];
	// 	$email = $_POST['signup-email'];
	// 	$password = $_POST['signup-password'];
		
	// 	$date = date("Y-m-d");
	// 	$status = '1';
	// 	// $date = date("h:i:sa");
		
	// 	include("db_connect.php");

	// 	$save =  mysqli_query($conn,"INSERT INTO `customers`(`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`, `status`) 
	// 	VALUES ('$id','$firstname','$lastname','$middlename','$contact','$address','$email','$password','$date','$status')");  // work

	// 	if($save){
	// 		return 1;
	// 	}
	// 	if(!$save){
	// 		return 2;
	// 	}
			
	// }



	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function save_user(){
		extract($_POST);
		$ue = $_SESSION['login_type'] == 1 ? 'username' : 'email';
		$data = " firstname = '$firstname' ";
		$data = " middlename = '$middlename' ";
		$data = " lastname = '$lastname' ";
		$data .= ", $ue = '$username' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("Select * from $table where $ue = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO $table set ".$data);
		}else{
			$save = $this->db->query("UPDATE $table set ".$data." where id = ".$id);
		}
		if($save){
			$_SESSION['login_firstname'] = $firstname;
			$_SESSION['login_middlename'] = $middlename;
			$_SESSION['login_lastname'] = $lastname;
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}
	function save_page_img(){
		extract($_POST);
		if($_FILES['img']['tmp_name'] != ''){
				$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
				if($move){
					$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
					$hostName = $_SERVER['HTTP_HOST'];
						$path =explode('/',$_SERVER['PHP_SELF']);
						$currentPath = '/'.$path[1]; 
   						 // $pathInfo = pathinfo($currentPath); 

					return json_encode(array('link'=>$protocol.'://'.$hostName.$currentPath.'/admin/assets/uploads/'.$fname));

				}
		}
	}

	// function save_customer(){
		// $id = $_POST['id'];
		// $firstname = $_POST['firstname'];
		// $middlename = $_POST['middlename'];
		// $lastname = $_POST['lastname'];
		// $contact = $_POST['contact'];
		// $address = $_POST['address'];
		// $email = $_POST['email'];
		// $password = $_POST['password'];
		// $cpass = $_POST['cpass'];

		// $qry = $this->db->query("INSERT INTO customers  (id, firstname, middlename, lastname, contact, address, email, cpass) VALUES  ('$id','$firstname','$middlename', '$lastname','$contact','$address','$email','md5($cpass)') ");
		// mysqli_query($conn, $qry);

	// }


	function save_customer(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM customers where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO customers set $data");
		}else{
			$save = $this->db->query("UPDATE customers set $data where id = $id");
		}

		if($save)
			return 1;
	}


	function delete_customer(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM customers where id = ".$id);
		if($delete){
			return 1;
		}
	}

	function save_staff(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM staff where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO staff set $data");
		}else{
			$save = $this->db->query("UPDATE staff set $data where id = $id");
		}

		if($save)
			return 1;
	}
	function delete_staff(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM staff where id = ".$id);
		if($delete){
			return 1;
		}
	}

	// supplier 
	function save_supplier(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password')
					$v = md5($v);
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM supplier where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO supplier set $data");
		}else{
			$save = $this->db->query("UPDATE supplier set $data where id = $id");
		}

		if($save)
			return 1;
	}
	function delete_supplier(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM supplier where id = ".$id);
		if($delete){
			return 1;
		}
	}
	// end 
	function save_department(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM departments where name ='$name' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO departments set $data");
		}else{
			$save = $this->db->query("UPDATE departments set $data where id = $id");
		}

		if($save)
			return 1;
	}
	function save_product(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM product where product_name ='$product_name' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product set $data");
		}else{
			$save = $this->db->query("UPDATE product set $data where id = $id");
		}

		if($save)
			return 1;
	}

	function delete_department(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM departments where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function delete_product(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_ticket(){
		extract($_POST);

		$data = "";
		foreach($_POST as $k => $v){
			
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'description'){
					$v = htmlentities(str_replace("'","&#x2019;",$v));
					
				}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(!isset($customer_id)){
			$data .= ", customer_id={$_SESSION['login_id']} ";
		}
		if($_SESSION['login_type'] == 1){
			$data .= ", admin_id={$_SESSION['login_id']} ";
		}
		if(empty($id)){
			// print_r($data);
			$save = $this->db->query("INSERT INTO tickets set $data");
		}else{
			$save = $this->db->query("UPDATE tickets set $data where id = $id");
		}
		// print_r($data);
		// print_r($save);
		if($save)
			return 1;
	}
	function update_ticket(){
		extract($_POST);
			$data = " status=$status ";
		if($_SESSION['login_type'] == 2)
			$data .= ", staff_id={$_SESSION['login_id']} ";
		$save = $this->db->query("UPDATE tickets set $data where id = $id");
		if($save)
			return 1;
	}
	function delete_ticket(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tickets where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_comment(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'comment'){
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
			$data .= ", user_type={$_SESSION['login_type']} ";
			$data .= ", user_id={$_SESSION['login_id']} ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO comments set $data");
		}else{
			$save = $this->db->query("UPDATE comments set $data where id = $id");
		}

		if($save)
			return 1;
	}
	function delete_comment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM comments where id = ".$id);
		if($delete){
			return 1;
		}
	}

	function mail_send(){
		require_once("mail.php");
		return 1;
	}


	/**
	 * Date wise Ticket PDF
	 *
	 * @return void
	 */
	function ticket_datewise_pdf(){
		include_once("ticket_list_pdf.php");
		return 1;
	}
	



	function update_supplier(){
		include("db_connect.php");

		$update_supplier=$_POST['select_suplier_id'];
		$update_ticket=$_POST['Ticket_id'];
		$update_ticket_sup_id=$_POST['supplier_name_id'];

		
		
		if(empty($id)){

			// $update_supplier =  mysqli_query($conn,"INSERT INTO `supplier_ticket`(`id`, `select_suplier_id`, `Ticket_id`) 
			$update_supplier =  mysqli_query($conn,"INSERT INTO `supplier_ticket`( `select_suplier_id`, `Ticket_id`, `supplier_name_id`) 
			VALUES ('$update_supplier','$update_ticket','$update_ticket_sup_id')"); 

			mysqli_query($conn, $update_supplier);
		
		}else{
			// $update_supplier = mysqli_query($conn,"UPDATE `supplier_ticket` SET `id`='$id', `select_suplier_id`='$select_suplier_id', `Ticket_id`='$Ticket_id'"); 
			$update_supplier = mysqli_query($conn,"UPDATE `supplier_ticket` SET `select_suplier_id`='$select_suplier_id', `Ticket_id`='$Ticket_id', `supplier_name_id`='$supplier_name_id'"); 
			mysqli_query($conn, $update_supplier);
		}



		$update_supplier = mysqli_query($conn,"UPDATE `tickets` SET `supplier_id`='$update_ticket_sup_id' WHERE `id`='$update_ticket'"); 
		mysqli_query($conn, $update_supplier);

		

		if($update_supplier){
			return 1;
		}
		
		
	}

	
}