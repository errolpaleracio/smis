<?php
$nav_path = 'nav.php';
include 'header.php';


if(isset($_POST['submit'])){
	$stmt = $db->prepare('UPDATE product SET product_name=?, unit_price=? WHERE product_id=?');
	$result = $stmt->execute(array($_POST['product_name'], $_POST['unit_price'], $_POST['product_id']));
	if($result){
		echo '<script>window.onload = function(){alert("Product successfully updated.")}</script>';
	}
}
$stmt = $db->query('SELECT * FROM PRODUCT WHERE product_id=' . $_GET['product_id']);
$product = $stmt->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
	<form class="form-horizontal" method="post">
		<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']?>">
		<div class="form-group">
			<label class="col-sm-2 control-label">Product Name</label>
			<div class="col-sm-4">
				<input type="text" name="product_name" value="<?php echo $product->product_name?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Unit Price</label>
			<div class="col-sm-4">
				<input type="text" name="unit_price" value="<?php echo $product->unit_price?>" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<input type="submit" name="submit" class="btn btn-primary">
			</div>
		</div>						
	</form>
</div>
<?php
include 'footer.php';