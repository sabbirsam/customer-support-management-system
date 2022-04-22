<?php include 'db_connect.php' ?>
<?php 
$qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM customers where id = ".$_GET['id'])->fetch_array();
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
                            
								<label for="" class="control-label border-bottom border-primary">Name</label>
								<p class="ml-2 d-list"><b><?php echo $name ?></b></p>

								<label for="" class="control-label border-bottom border-primary">Mail</label>
								<p class="ml-2 d-list"><b><?php echo $email ?></b></p>

                                <label for="" class="control-label border-bottom border-primary">Location</label>
								<?php if($latitude && $longitude) {?>
                                <div class="col-md-6">
                                <p class="" style="width:400px; height:300px;"><b>
                                    <!-- <iframe src='https://www.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&h1=es;z=14&output=embed' frameborder="0"></iframe> -->
                                    <iframe style="width:100%; height:100%;" src='https://www.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&h1=es;z=14&output=embed' frameborder="0"></iframe>
                                </b></p>
                                </div>
								<?php }else{?>
									<p class="ml-2 d-list"><b>Didn't allow to collect location</b></p>
								<?php }?>
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