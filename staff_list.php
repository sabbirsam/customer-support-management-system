<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<!-- PDF  -->
	<div class="pdf_container" style="padding-bottom:4px">
          <form class="form-inline" method="post" action="staff_list_pdf.php">
            <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>Generate PDF</button>
          </form>
        </div>
        <!-- PDF  -->

	<div class="card">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">

				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="15%">
					<col width="20%">
					<col width="15%">
					<col width="25%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				
				<thead>
					<tr>
						<th>#</th>
						<th>SR Number</th>
						<th>Name</th>
						<!-- <th>Department</th> -->
						<th>Contact #</th>
						<th>Address</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;

					// main 
					$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM staff order by concat(lastname,', ',firstname,' ',middlename) asc"); // Main 
					
					//show department but not id
					// $qry = $conn->query("SELECT *, CONCAT(lastname,',',firstname,' ',middlename) AS sname FROM staff INNER JOIN departments ON departments.id=staff.department_id order by unix_timestamp(staff.date_created) asc"); // Main 
					
					
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<!-- staff ID  -->
						<td><b><?php echo ucwords("SN0000". $row['id']) ?></b></td>
						<!-- staff name  -->
						<td><b><?php echo ucwords($row['name']) ?></b></td>


						<!-- staff name  -->
						<!-- <td><b><?php echo ucwords($row['sname']) ?></b></td> -->

						<!-- department name -->
						<!-- <td><b><?php echo ucwords($row['name']) ?></b></td> -->
						

						
						<td><b><?php echo $row['contact'] ?></b></td>
						<td><b><?php echo $row['address'] ?></b></td>
						<td><b><?php echo $row['email'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
							<a class="dropdown-item view_ticket" href="./index.php?page=view_staff&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">Details</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_staff&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_staff" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.delete_staff').click(function(){
	_conf("Are you sure to delete this staff?","delete_staff",[$(this).attr('data-id')])
	})
	})
	function delete_staff($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_staff',
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

<script>
	$('.delete_staff').click(function(){

	_conf("Are you sure to delete this staff?","delete_staff",[$(this).attr('data-id')])

	})
</script>