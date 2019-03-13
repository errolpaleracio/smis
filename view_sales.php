<?php
$nav_path = 'nav.php';
include 'header.php';
$sql = 'SELECT sales.*, product_name, unit_price, branch_name FROM sales INNER JOIN product ON sales.product_id=product.product_id INNER JOIN BRANCH ON sales.branch_id=branch.branch_id WHERE sales.branch_id=' . $_SESSION['branch_id'];
$sql2 = 'SELECT SUM(unit_price * sales.quantity) as total_sales FROM sales INNER JOIN product ON sales.product_id=product.product_id WHERE branch_id='.$_SESSION['branch_id'];
$stmt = $db->query($sql);
if((@$_GET['search'])){
	$start = "'" . @$_GET['start_date'] . "'";
	$end = "'" . @$_GET['end_date'] . "'";
	$sql .= ' AND sold BETWEEN CAST(' . $start . ' AS DATE) AND CAST(' . $end . ' AS DATE)';
	$sql2 .= ' AND sold BETWEEN CAST(' . $start . ' AS DATE) AND CAST(' . $end . ' AS DATE)';
}
$stmt = $db->query($sql);
$sales = $stmt->fetchAll(PDO::FETCH_OBJ);

$sth = $db->query($sql2);
$total_sales = $sth->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
    
	<h1>Total Sales: <?php echo $total_sales->total_sales?></h1>
	<div class="row">
		<form method="GET" action="">
		<div class="input-daterange">
			<div class="col-sm-3">
				<input type="text" name="start_date" id="start_date" class="form-control" value="<?php echo @$_GET['start_date']?>"/>
			</div>
			<div class="col-sm-3">
				<input type="text" name="end_date" id="end_date" class="form-control" value="<?php echo @$_GET['end_date']?>"/>
			</div>      
		</div>
		<div class="col-md-4">
			<input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
		</div>
		</form>
    </div>
	<hr/>
	<table class="table table-bordered" id="order_data">	
		
		<thead>
			<tr>
				<th>Sale Id</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Branch</th>
				<th>Date of Purchased</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sales as $s):?>
				<tr>
					<td><?php echo $s->sales_id?></td>
					<td><?php echo $s->product_name?></td>
					<td><?php echo $s->quantity?></td>
					<td><?php echo $s->unit_price * $s->quantity?></td>
					<td><?php echo $s->branch_name?></td>
					<td><?php echo date_format(date_create($s->sold), 'M d, Y')?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<script>
$('.input-daterange').datepicker({
	todayBtn:'linked',
	format: "yyyy-mm-dd",
	autoclose: true
});
$('#order_data').DataTable();
</script>
<?php
include 'footer.php';