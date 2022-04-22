<?php include 'db_connect.php' ?>
<?php 
$qry = $conn->query("SELECT t.*,email as email, concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname, d.name as dname FROM tickets t inner join customers c on c.id= t.customer_id inner join departments d on d.id = t.department_id  where  t.id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
	// print_r($k);
}
?>
<style>
	.d-list {
	    display: list-item;
	}
</style>
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-8">
			<div class="card card-outline card-success">
				<div class="card-header">
					<h3 class="card-title">Ticket</h3>
					<!-- <h3 class="card-title"><input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>"></h3> -->
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<label for="" class="control-label border-bottom border-primary">Subject</label>
								<p class="ml-2 d-list"><b><?php echo $subject ?></b></p>
								<label for="" class="control-label border-bottom border-primary">Customer</label>
								<p class="ml-2 d-list"><b><?php echo $cname ?></b></p>

								<label for="" class="control-label border-bottom border-primary">Mail</label>
								<p class="ml-2 d-list"><b><?php echo $email ?></b></p>

							</div>
							<div class="col-md-6">
								<label for="" class="control-label border-bottom border-primary">Status</label>
								<p class="ml-2 d-list">
									<?php if($status == 0): ?>
										<span class="badge badge-primary">Submission</span>
									<?php elseif($status == 1): ?>
										<span class="badge badge-info">Processing</span>
									<?php elseif($status == 2): ?>
										<span class="badge badge-success">Complete</span>
									<?php else: ?>
										<!-- <span class="badge badge-secondary">Closed</span> -->
									<?php endif; ?>
									<?php if($_SESSION['login_type'] != 3): ?>
									<span class="badge btn-outline-primary btn update_status" data-id = '<?php echo $id ?>'>Update Status</span>
									<?php endif; ?>
								</p>
								<label for="" class="control-label border-bottom border-primary">Need Support From</label>
								<p class="ml-2 d-list"><b><?php echo $dname ?></b></p>

								<!-- code supplier admin -->


								<?php if($_SESSION['login_type'] == 1): ?>
								<form action="" id="update-supplier">
										<label for="select_suplier_id" class="control-label border-bottom border-primary">Supplier</label>

									<?php 
										$selected_supplier = $conn->query("SELECT select_suplier_id FROM supplier_ticket WHERE Ticket_id =".$_GET['id'])->fetch_array();

											foreach($selected_supplier as $k => $v){
												$k = $v;}

										/**
										 * New add
										 */	

										$supplier_ids = $conn->query("SELECT supplier_id as supplier_ids FROM tickets WHERE id=".$_GET['id'])->fetch_array();
										
										$clientid = $supplier_ids["supplier_ids"];
										// echo "<pre>";
										// print_r ($supplier_ids );
										// echo "</pre>";
									
										$supplier_name = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM supplier WHERE id=".$clientid)->fetch_array();
										// echo "<pre>";
										// echo ($supplier_name["name"]);
										// echo "</pre>";
										
										if($supplier_name["name"]){
											?>
											<p class="ml-2 d-list"><b><?php echo $supplier_name["name"] ?></b></p>
											<?php
											
										}else{
											// echo "Not Assigned";
											?>
											<!-- <p class="ml-2 "><b>Assigned supplier</b></p> -->
													<?php if($selected_supplier[0] != true){ ?>
												<select name="select_suplier_id" id="select_suplier_id" class="custom-select custom-select-sm select2">
													<option value=""></option>
													<?php
														$supplier_id = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM supplier order by concat(lastname,', ',firstname,' ',middlename) asc");											
														while($row = $supplier_id->fetch_assoc()):
													?>
														<option data-id="<?php echo ucwords($row['id']) ?>" value="<?php echo ucwords($row['name']) ?>"  <?php echo isset($selected_supplier[0]) == $row['firstname'] ? "selected" : '' ?>><?php echo isset($selected_supplier[0]) == $row['firstname'] ? "$selected_supplier[0]" :   ucwords($row['name']) ?></option>
														
													<?php endwhile; ?>
												</select>
												<br>
												<button class="btn btn-primary btn-sm float-right">Save</button>
												<?php } else{?>
													<p class="ml-2 d-list"><b><?php echo $selected_supplier[0] ?></b></p>
												<?php }?>
											
											<?php
										}
										
											// end 
									?>
									
								</form>
								<?php endif; ?>


								<!-- code admin supplier end -->


								<!-- code supplier for stuff  -->
										<?php if($_SESSION['login_type'] == 2): ?>
								<form action="" id="update-supplier">
										<label for="select_suplier_id" class="control-label border-bottom border-primary">Supplier</label>

										<?php 
										$selected_supplier = $conn->query("SELECT select_suplier_id FROM supplier_ticket WHERE Ticket_id =".$_GET['id'])->fetch_array();

											foreach($selected_supplier as $k => $v){
												$k = $v;}

										/**
										 * New add
										 */	

										$supplier_ids = $conn->query("SELECT supplier_id as supplier_ids FROM tickets WHERE id=".$_GET['id'])->fetch_array();
										
										$clientid = $supplier_ids["supplier_ids"];
										// echo "<pre>";
										// print_r ($supplier_ids );
										// echo "</pre>";
									
										$supplier_name = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM supplier WHERE id=".$clientid)->fetch_array();
										// echo "<pre>";
										// echo ($supplier_name["name"]);
										// echo "</pre>";
										
										if($supplier_name["name"]){
											?>
											<p class="ml-2 d-list"><b><?php echo $supplier_name["name"] ?></b></p>
											<?php
											
										}else{
											// echo "Not Assigned";
											?>
											<!-- <p class="ml-2 "><b>Assigned supplier</b></p> -->
													<?php if($selected_supplier[0] != true){ ?>
												<select name="select_suplier_id" id="select_suplier_id" class="custom-select custom-select-sm select2">
													<option value=""></option>
													<?php
														$supplier_id = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM supplier order by concat(lastname,', ',firstname,' ',middlename) asc");											
														while($row = $supplier_id->fetch_assoc()):
													?>	
														
														<option data-id="<?php echo ucwords($row['id']) ?>" value="<?php echo ucwords($row['name']) ?>"  <?php echo isset($selected_supplier[0]) == $row['firstname'] ? "selected" : '' ?>><?php echo isset($selected_supplier[0]) == $row['firstname'] ? "$selected_supplier[0]" :   ucwords($row['name']) ?></option>
														
													<?php endwhile; ?>
												</select>
												<br>
												<button class="btn btn-primary btn-sm float-right">Save</button>
												<?php } else{?>
													<p class="ml-2 d-list"><b><?php echo $selected_supplier[0] ?></b></p>
												<?php }?>
											
											<?php
										}
												// end 
									?>
									
								</form>
								<?php endif; ?>
								<!-- code supplier  end -->

							</div>
						</div>
						<hr class="border-primary">
						<div>
							<?php echo html_entity_decode($description) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if($_SESSION['login_type'] != 4): ?>
		<div class="col-md-4">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h3 class="card-title">Comment/s</h3>
				</div>
				<div class="card-body p-0 py-2">
					<div class="container-fluid">
						<?php 
						$comments = $conn->query("SELECT * FROM comments where ticket_id = '$id' order by unix_timestamp(date_created) asc");
						while($row = $comments->fetch_assoc()):
							if($row['user_type'] == 1)
								$uname = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM users where id = {$row['user_id']}")->fetch_array()['name'];
							if($row['user_type'] == 2)
								$uname = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff where id = {$row['user_id']}")->fetch_array()['name'];
							if($row['user_type'] == 3)
								$uname = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM customers where id = {$row['user_id']}")->fetch_array()['name'];
						?>
						<div class="card card-outline card-info">
							<div class="card-header">
								<h5 class="card-title"><?php echo ucwords($uname) ?></h5>
								<div class="card-tools">
									<span class="text-muted"><?php echo date("M d, Y",strtotime($row['date_created'])) ?></span>
									<?php if($row['user_type'] == $_SESSION['login_type'] && $row['user_id'] == $_SESSION['login_id']): ?>
									<span class="dropleft">
										<a class="fa fa-ellipsis-v text-muted" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
										<div class="dropdown-menu" style="">
									        <a class="dropdown-item edit_comment" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a>
									        <div class="dropdown-divider"></div>
									        <a class="dropdown-item delete_comment" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
									     </div>
									</span>	
								<?php endif; ?>
								</div>
							</div>
							<div class="card-body">
								<div>
									<?php echo html_entity_decode($row['comment']) ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					<hr class="border-primary">
					<div class="px-2">
						<form action="" id="manage-comment">
							<div class="form-group">
								<input type="hidden" name="id" value="">
								<input type="hidden" name="ticket_id" value="<?php echo $id ?>">
								<label for="" class="control-label">New Comment</label>
								<textarea name="comment" id="" cols="30" rows="" class="fom-control summernote2"></textarea>
							</div>
							<button class="btn btn-primary btn-sm float-right">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<script>
	$('#update-supplier').submit(function(e){
		e.preventDefault()
		start_load()

		function query_string(variable)
			{
			var query = window.location.search.substring(2);
			
			var vars = query.split("&");
			var data =  vars[1];
			const slug = data.split('=').pop();			
			console.log(slug); 
			return(slug);
			}
			//Getting the parameter-
			v = query_string('v'); 
		
		$.ajax({
			url:'ajax.php?action=update_supplier',
			data: { "select_suplier_id" : $('#select_suplier_id').val(), // this one collect contact name for supplier
	   	 		   "Ticket_id" :v, // get ticket id
					"supplier_name_id": $('option:selected', this).data('id') // this one collect supplier Id
			},
			// data: new FormData($(this)[0]),	
		    method: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Supplier Included.',"success");
					setTimeout(function(){
						location.reload()
					},1800)
				}
			}
		})
	})
</script>



<script>
	$(function () {
    $('.summernote2').summernote({
        height: 150,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'view', [ 'undo', 'redo'] ]
        ]
    })

  })
	$('.edit_comment').click(function(){
		uni_modal("Edit Comment","manage_comment.php?id="+$(this).attr('data-id'))
	})
	$('.update_status').click(function(){
		uni_modal("Update Ticket's Status","manage_ticket.php?id="+$(this).attr('data-id'))
	})





	$('#manage-comment').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_comment',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Comment successfully saved.',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
	$('.delete_comment').click(function(){
	_conf("Are you sure to delete this comment?","delete_comment",[$(this).attr('data-id')])
	})
	function delete_comment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_comment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

<!-- <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>"> -->