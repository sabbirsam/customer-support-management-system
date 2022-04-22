<?php include 'db_connect.php'; 

?>
<?php 
$qry = $conn->query("SELECT * FROM tickets where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

  // include 'db_connect.php';
// customer mail 
$mail_qry = $conn->query("SELECT t.*,email as email, concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname, d.name as dname FROM tickets t inner join customers c on c.id= t.customer_id inner join departments d on d.id = t.department_id  where  t.id = ".$_GET['id'])->fetch_array();
foreach($mail_qry as $mk => $mv){
	$mk = $mv;
}

// staff mail
 
// $mail_qry_supp = $conn->query("SELECT `email` FROM `supplier` WHERE `id`= ".$_GET['id'])->fetch_array();
// foreach($mail_qry_supp as $mk => $mv){
// 	$mk = $mv;
// }


?>
<div class="container-fluid">
	<form action="" id="update-ticket">
		<input type="hidden" value="<?php echo $id ?>" name='id'>
		<div class="form-group">
			
		<form name="form">
			<label for="uname" class="control-label uname">Name:</label>
			<input type="text" id="uname" name="uname" value="<?php echo $mail_qry["cname"] ?>"><br>
			<label for="mail" class="control-label mail">Mail:</label>
			<input type="text" id="mail" name="mail" value="<?php echo $mail_qry["email"];?>"><br>

			<!-- <label for="s_mail" class="control-label mail">Stuff Mail:</label>
			<input type="text" id="s_mail" name="s_mail" value="<?php echo $mail_qry_supp["email"];?>"><br> -->

		</form>

			<label for="" class="control-label">Status</label>
			<select name="status" id="" class="custom-select custom-select-sm">
				<option value="0" <?php echo $status == 0 ? 'selected' : ''; ?>>Submission</option>
				<option value="1" <?php echo $status == 1 ? 'selected' : ''; ?>>Processing</option>
				<option value="2" <?php echo $status == 2 ? 'selected' : ''; ?>>Complete</option>
				<!-- <option value="3" <?php echo $status == 3 ? 'selected' : ''; ?>>Closed</option> -->
			</select>
		</div>
	</form>
</div>
<script>
	$('#update-ticket').submit(function(e){
		e.preventDefault()
		start_load()
		// $('#msg').html('')
		$.ajax({
			url:'ajax.php?action=update_ticket',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					// alert_toast('Data successfully updated.',"success");

					$.ajax({
						method: "POST",
						url: 'ajax.php?action=mail_send',
						data: {
							mail: $('#mail').val(),
							uname: $('#uname').val(),
						
						},
						success:function(send){
							if(send == 1){
								alert_toast('Mail send.',"success");
							}else{
								alert_toast('Mail not send.',"success");
							}	
						}
					})

					setTimeout(function(){
						location.reload()
					},1800)

					alert_toast('Updated successfully. Mail send to user',"success");

				}
			}
		})
	})
</script>