<?php include 'db_connect.php' ?>
<?php 
$qry = $conn->query("SELECT t.*,email as email, concat(lastname,', ',firstname,' ',middlename) as cname, d.name as dname FROM staff t inner join departments c on c.id= t.department_id inner join departments d on d.id = t.department_id where t.id = ".$_GET['id'])->fetch_array();
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
					<h3 class="card-title"><?php echo $firstname ?> Information</h3>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<label for="" class="control-label border-bottom border-primary">Department</label>
								<p class="ml-2 d-list"><b><?php echo $dname ?></b></p>
								<label for="" class="control-label border-bottom border-primary">Name</label>
								<p class="ml-2 d-list"><b><?php echo $cname ?></b></p>

								<label for="" class="control-label border-bottom border-primary">Mail</label>
								<p class="ml-2 d-list"><b><?php echo $email ?></b></p>
							</div>

							<div class="col-md-6">
								<label for="" class="control-label border-bottom border-primary">SR Number</label>
								<p class="ml-2 d-list"><b><?php echo ucwords("WDSN00". $id) ?></b></p>

								<label for="" class="control-label border-bottom border-primary">Address</label>
								<p class="ml-2 d-list"><b><?php echo $address ?></b></p>

								<label for="" class="control-label border-bottom border-primary">Contact</label>
								<p class="ml-2 d-list"><b><?php echo $contact ?></b></p>
							</div>

							
						</div>
						<hr class="border-primary">
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


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

</script>