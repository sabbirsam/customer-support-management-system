<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM product where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage-product">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<!-- image  -->
		<!-- <div class="form-group">
			<label for="product_name" class="control-label">Product Image</label>
			<input type="file" class="form-control form-control-sm" id="product_image" name="product_image" value = '<?php echo isset($product_image)? $product_image: '' ?>'>
		</div> -->
		<!-- image  -->
		<div class="form-group">
			<label for="product_name" class="control-label">Product Name</label>
			<input type="text" class="form-control form-control-sm" id="product_name" name="product_name" value = '<?php echo isset($product_name)? $product_name: '' ?>'>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Description</label>
			<textarea name="description" id="" cols="30" rows="4" class="form-control"><?php echo isset($description)? $description: '' ?></textarea>
		</div>
	</form>
</div>
<script>
	$('#manage-product').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_product',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=product_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Department already exist.</div>");
					$('[name="name"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>