<?php
$nav_path = 'nav.php';
include 'header.php';
/*
if(isset($_POST['submit'])){
	$stmt = $db->prepare('INSERT INTO PRODUCT (product_name, unit_price, quantity) values (?, ?, ?)');
	$result = $stmt->execute(array($_POST['product_name'], $_POST['unit_price'], $_POST['quantity']));
	if($result){
		echo '<script>window.onload = function(){alert("Product successfully added.")}</script>';
	}
}
*/


$products = $db->query('SELECT product.*, brand.brand_name FROM product INNER JOIN brand ON product.brand_id=brand.brand_id WHERE branch_id=' . $_SESSION['branch_id'] . ' and archived=0 ORDER BY product_name')->fetchAll(PDO::FETCH_OBJ);
?>
<div id="wrapper">
<?php include 'sb_admin_nav.php'?>
<div id="page-wrapper">
<div class="container-fluid">

<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Add Sales 
</h1>
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-dashboard"></i> Add Sales
</li>
</ol>
</div>

</div>
	<div class="col-sm-9">
		<form class="form-horizontal" method="post" id="salesForm">
			<input type="hidden" name="price">
			<div class="form-group">
				<label class="col-sm-2 control-label">Product</label>
				<div class="col-sm-4" id="products">
					<select name="product_id" class="form-control">
					<?php foreach($products as $p):?>
						<option value="<?php echo $p->product_id?>"><?php echo $p->product_name, ' - ', $p->brand_name?></option>
					<?php endforeach;?> 
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Quantity</label>
				<div class="col-sm-4">
					<input type="text" name="quantity" id="number" class="form-control" required min="1">
				</div>
				<div class="col-sm-2">
					<input type="text" name="on_hand" class="form-control" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Discount</label>
				<div class="col-sm-4">
					<input type="text" name="discount" class="form-control" value="0" required min="1">
				</div>
			</div>			
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
					<input type="Add" name="submit" value="Add" class="btn btn-primary">
				</div>
			</div>						
		</form>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
			</div>
			<div class="panel-body">
				<h3 class="total">Total: php0.00</h3>
				<button type="button" id="payout" class="btn btn-primary">Payout</button>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 80px">Product Id</th>
				<th>Product Name</th>
				<th style="width: 80px">Quantity</th>
				<th class="hide_it">Price</th>
				<th style="width: 80px">Discount</th>
				<th style="width: 150px">Discounted Price</th>
				<th style="width: 200px">Action</th>
			</tr>
		</thead>
	</table>
</div><!-- container-fluid -->
</div><!-- page-wrapper -->
<div><!-- wrapper -->
<script>
$('#salesForm').submit(function(e){
	e.preventDefault();
});
get_count();
var data_set = [];
var table = $('.table').DataTable();
var row_index = 0;
$('input[name="submit"]').click(function(){
	var $product = $('[name="product_id"]').find(':selected');
	var product_name = $product.text();
	var product_id = $product.val();
	var $quantity = $('input[name="quantity"]'); 
	var quantity = $quantity.val();
	var $discount = $('input[name="discount"]'); 
	var discount = $discount.val();
	var price = $('input[name="price"]').val();
	var on_hand = $('[name="on_hand"]').val();
		
	if(parseInt(on_hand) >= parseInt(quantity)){
		
		data_set.push([product_id, product_name, quantity, price, discount]);
		var total = 0;
		for(i = 0; i < data_set.length; i++){
			total += parseFloat(data_set[i][2] * data_set[i][3] - data_set[i][4]);
		}
		$quantity.val('');
		$discount.val('0');
		$('.total').text('Total: Php: ' + total)
		table.row.add([product_id, product_name, quantity, price * quantity, discount, price * quantity - discount,'<input type="button" name="update_item" value="Change" class="btn btn-primary"> <input type="button" name="remove_item" value="Remove Item" class="btn btn-danger">']).draw();
		row_index++;
		$('[name="on_hand"]').val(on_hand-quantity);
		
	}else{
		alert('The total quantity must not be greater than stock on hand');
		$quantity.val('');
	}
});

function get_total_count(id){
	var total_count = 0;
	for(i = 0; i < data_set.length; i++){
		if(data_set[i][0] == id)
			total_count += parseInt(data_set[i][2]);
	}
	return total_count;	
} 
$('[name="product_id"]').change(function(event) {
	get_count();	
});
function get_count(){
	$.get('get_count.php?product_id=' + $('[name="product_id"]').find(':selected').val(), 'json',function(data) {
		var product = JSON.parse(data);
		var product_id = $('[name="product_id"]').find('option:selected').val();
		$('[name="on_hand"]').val(product.quantity - parseInt(get_total_count(product_id)));
		$('[name="price"]').val(product.unit_price);
	});
}
$('#payout').click(function(){
	if(data_set.length > 0){
		$.each(data_set, function(index, val) {
			$.post('add_sale.php', {product_id: val[0], quantity: val[2], unit_price: val[3], discount: val[4]}, function(data, textStatus, xhr) {
				//console.log(xhr.responseText);
			});
			
			$.post('update_count.php', {product_id: val[0], quantity: val[2]}, function(data, textStatus, xhr) {
				
			});
			
		});	
		window.location.href='sales.php';
	}else{
		alert('Must add items first.')
	}
});
$(document).on('click', '[name="update_item"]', function(){
	var index = $(this).parents('tr').index();
	var product_id = data_set[index][0];
	var quantity = data_set[index][2];
	var $td = $(this).parents('tr').children('td').eq(2);
	var $td_price = $(this).parents('tr').children('td').eq(3);
	var $td_discounted_price = $(this).parents('tr').children('td').eq(5);
	if($(this).val() == 'Change'){
		$(this).val('Update');
		$td.html('<input type="text" name="change_quantity" class="form-control" value=' + quantity + '>');
		var on_hand = $('[name="on_hand"]').val();
		var selected_item_id = $('[name="product_id"] option:selected').val();
		if(product_id == selected_item_id)
			$('[name="on_hand"]').val(parseInt(on_hand) + parseInt(quantity));
	}else{
		$(this).val('Change');
		quantity = parseInt($td.find('input[name="change_quantity"]').val());
		$td.html(quantity);
		data_set[index][2] = quantity;
		var on_hand = $('[name="on_hand"]').val();
		var selected_item_id = $('[name="product_id"] option:selected').val();
		if(product_id == selected_item_id)
			$('[name="on_hand"]').val(parseInt(on_hand) - parseInt(quantity));
			$td_price.html(parseInt(data_set[index][2] * data_set[index][3]));
			$td_price.html(parseInt(data_set[index][2] * data_set[index][3] - data_set[index][4]));
		var total = 0;
		for(i = 0; i < data_set.length; i++){
			total += parseFloat(data_set[i][2] * data_set[i][3] - data_set[i][4]);
		}
		$('.total').text('Total: Php: ' + total)	
	}
	
	//data_set.splice(index, 1);	
	//table.row($(this).parents('tr')).remove().draw();
	
});

$(document).on('click', '[name="remove_item"]', function(){
	var index = $(this).parents('tr').index()
	//console.log(row_index);
	var product_id = data_set[index][0];
	var quantity = data_set[index][2];
	data_set.splice(index, 1);
	var on_hand = $('[name="on_hand"]').val();
	var selected_item_id = $('[name="product_id"] option:selected').val();
	
	console.log(data_set);
	if(product_id == selected_item_id)
		$('[name="on_hand"]').val(parseInt(on_hand) + parseInt(quantity));
	
	table.row($(this).parents('tr')).remove().draw();
});

/*
function load_products(brand_id){
	$('#products').load('load_product.php?brand_id=' + brand_id);
}

function check_brand(){
	var $brand = $('select[name="brand_id"]');
	var brand_id = $brand.find('option:selected').val();
	load_products(brand_id);
}

check_brand();
$('select[name="brand_id"]').on('change', function(){
	check_brand();
});
*/


var number = document.getElementById('number');
 
// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
</script>

<?php
if(isset($_SESSION['branch_id'])){
	$sql = 'select count(*) as prod_count from product where quantity <= critical_lvl AND branch_id='.$_SESSION['branch_id'];
	$prod = $db->query($sql);
	$result = $prod->fetch(PDO::FETCH_OBJ)->prod_count;
	if($result > 0)
		echo '<script>alert("There are products that has reach its critical levels. Please Replenish them.")</script>';
	
}
?>
<?php
include 'footer.php';