
<?php
$nav_path = 'nav.php';
include 'header.php';

if(isset($_POST['submit'])){
	$stmt = $db->prepare('INSERT INTO PRODUCT (product_name, unit_price, quantity, branch_id, critical_lvl) values (?, ?, ?, ?, ?)');
	$result = $stmt->execute(array($_POST['product_name'], $_POST['unit_price'], $_POST['quantity'], $_SESSION['branch_id'], $_POST['critical_lvl']));
	if($result){
		echo '<script>window.onload = function(){alert("Product successfully added.")}</script>';
	}
}
?>

<div class="container">
	<?php if($_SESSION['branch_id'] != '3'):?>
	<form class="form-horizontal" method="post">
		<div class="form-group">
			<label class="col-sm-2 control-label">Product Name</label>
			<div class="col-sm-4">
				<input type="text" name="product_name" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Unit Price</label>
			<div class="col-sm-4">
				<input type="text" name="unit_price" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Quantity</label>
			<div class="col-sm-4">
				<input type="text" name="quantity" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Critical Level</label>
			<div class="col-sm-4">
				<input type="text" name="critical_lvl" class="form-control" required>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</div>						
	</form>
	<?php endif;?>
	<div style="margin-bottom: 10px;">
		<a href="product.php?replenish=true" class="btn btn-primary">View products to be replenished</a>
		<a href="product.php" class="btn btn-primary">View all products</a>
	</div>	
	<table class="table table-bordered" id="table">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Critical Level</th>
				<?php if($_SESSION['branch_id'] != '3'):?>
					<th>Actions</th>
				<?php else:?>
					<th>Branch</th>
				<?php endif;?>
			</tr>
		</thead>
		<?php 
		$sql = '';
		if($_SESSION['branch_id'] != '3'){
			$sql = 'select product.*, branch_name from product INNER JOIN branch ON product.branch_id=branch.branch_id WHERE product.branch_id=' . $_SESSION['branch_id'];
			if(@$_GET['replenish'] == 'true')
				$sql .= ' AND quantity <= critical_lvl';
		}
		else{
			$sql = 'select product.*, branch_name from product INNER JOIN branch ON product.branch_id=branch.branch_id ';	
			if(@$_GET['replenish'] == 'true')
				$sql .= ' WHERE quantity <= critical_lvl';
		}
		
		$stmt = $db->query($sql);
		
		$product = $stmt->fetchAll(PDO::FETCH_OBJ);
		?>
		<tbody>
			<?php foreach($product as $p):?>
				<tr>
					<td><?php echo $p->product_name?></td>
					<td><?php echo $p->quantity?></td>
					<td><?php echo $p->unit_price?></td>
					<td><?php echo $p->critical_lvl?></td>
					<?php if($_SESSION['branch_id'] != '3'):?>
						<td><a href="update_product.php?product_id=<?php echo $p->product_id?>">Update</a> | <a href="delete_product.php?product_id=<?php echo $p->product_id?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a> | 
						<a href="#" class="restock" data-toggle="modal" data-target=".bs-example-modal-sm" id="<?php echo $p->product_id;?>">Restock</a></td>
					<?php else:?>
						<td><?php echo $p->branch_name?></td>
					<?php endif;?>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="restockModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Restock product</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" action="restock_product.php" method="post">
				<div class="form-group">
					<label class="control-label col-sm-4">Quantity</label>
					<div class="col-sm-8">
						<input type="number" min="1" name="qty" class="form-control" required>
						<input type="hidden" name="id">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-12">
						<input type="submit" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	$('.restock').click(function(event) {
		var id = $(this).attr('id');
		$('[name="id"]').val(id);
	});	
	$('#table').DataTable();
});
</script>
<?php
include 'footer.php';