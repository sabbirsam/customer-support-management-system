<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<!-- PDF  -->
	<div class="pdf_container" style="padding-bottom:4px">
          <form class="form-inline" method="post" action="product_list_pdf.php">
            <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>Generate PDF</button>
          </form>
        </div>
        <!-- PDF  -->

	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<button class="btn btn-sm btn-primary btn-block" type='button' id="new_product"><i class="fa fa-plus"></i> New Product</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM product order by  product_name asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['product_name']) ?></b></td>
						<td><b><?php echo $row['description'] ?></b></td>
						<td class="text-center ">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item edit_product" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_product" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
	$('#new_product').click(function(){
		uni_modal("New Product","manage_product.php")
	})
	$('.edit_product').click(function(){
		uni_modal("Edit Product","manage_product.php?id="+$(this).attr('data-id'))
	})
	$('.delete_product').click(function(){
	_conf("Are you sure to delete this product?","delete_product",[$(this).attr('data-id')])
	})
	
	})
	function delete_product($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_product',
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
	$('.delete_product').click(function(){

	_conf("Are you sure to delete this product?","delete_product",[$(this).attr('data-id')])

	})
</script>