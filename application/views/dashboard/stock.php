<?php

require_once("application/controllers/product.php");

function displayStock(){
	global $database;
	//$q = "SELECT * FROM meta_data ORDER BY pid DESC";
	$product_controller = new Product();
        $stock = $product_controller->getAllProducts();
	//print_r($stock);
	//$result = $database->query($q);
	/* Error occurred, return given name by default */
	/*$num_rows = mysqli_num_rows($result);
	if(!$result || ($num_rows < 0)){
		echo "Error displaying info";
		return;
	}
	if($num_rows == 0){
		echo "Database table empty";
		return;
	}*/

	/* Display table contents */
	//echo "<table class='table table-bordered table-striped table-highlight'>";
	echo "<table id='tablesorter' class='metadataTable table table-bordered table-striped table-highlight'>
			<thead>
				<tr>
					<th class='sort' data-sort='asc' data-id='-1' data-type='int' style='white-space: nowrap; cursor: move; display: none;'>ID# <i class='icon-sort'></i></th>
					<!--th class='sort' data-sort='asc' data-id='0' data-type='str' style='white-space: nowrap; cursor: move;'>Stock Owner <i class='icon-caret-up'></i></th-->
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Product Name <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Category <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Brandname <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Description<i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='5' data-type='str' style='white-space: nowrap; cursor: move;'>Size<i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='1' data-type='int style='white-space: nowrap; cursor: move;'>Quantity<i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='2' data-type='int' style='white-space: nowrap; cursor: move;'>Cost Price <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='3' data-type='int' style='white-space: nowrap; cursor: move;'>Selling Price <i class='icon-sort'></i></th>
					<th class='sort' data-sort='asc' data-id='4' data-type='int' style='white-space: nowrap; cursor: move;'>Markup Amount <i class='icon-sort'></i></th>
					<th /><th /><th />
				</tr>
			</thead>";
	echo "<tbody>";
	foreach($stock as $row){
		$stock_id = $row->stock_id;
		$owner = $row->owner;
		$cost_price = $row->cost_price;
		$selling_price = $row->selling_price;
		$mark_up_amount = $row->mark_up_amount;
		$category_id = $row->category_id;
		$brandname  = $row->brandname;
		$unit_volume = $row->unit_volume;
		$description  = $row->description;
		$product_name = $row->product_name;
		$quantity = $row->quantity;

		echo "<tr>
				<td style='display: none;' ><span class='fieldText txtstock_id'> $stock_id</span><input type='text' value='$stock_id'  class='fieldEdit tbxstock_id' style='display: none' /></td>
				<td><span class='fieldText txtproduct_name'> $product_name</span><input type='text' value='$product_name'  class='fieldEdit tbxproduct_name' style='display: none' /></td>
				<td><span class='fieldText txtowner'> $category_id</span><input type='text' value='$category_id'  class='fieldEdit tbxcategory_id' style='display: none' /></td>
				<td><span class='fieldText txtbrandname'> $brandname</span><input type='text' value='$brandname'  class='fieldEdit tbxbrandname' style='display: none' /></td>
				<td ><span class='fieldText txtdescription'> $description</span><input type='text' value='$description'  class='fieldEdit tbxdescription' style='display: none' /></td>
				<td ><span class='fieldText txtunit_volume'> $unit_volume</span><input type='text' value='$unit_volume'  class='fieldEdit tbxunit_volume' style='display: none' /></td>
				<td><span class='fieldText txtquantity' >$quantity</span><input type='text' value='$quantity'  class='fieldEdit tbxquantity' style='display: none' /></td>
				<td><span class='fieldText txtcost_price' >$cost_price</span><input type='text' value='$cost_price'  class='fieldEdit tbxcost_price' style='display: none' /></td>
				<td><span class='fieldText txtselling_price' >$selling_price</span><input type='text' value='$selling_price'  class='fieldEdit tbxselling_price' style='display: none' /></td>
				<td><span class='fieldText txtmark_up_amount' >$mark_up_amount</span><input type='text' value='$mark_up_amount'  class='fieldEdit tbxmark_up_amount' style='display: none' /></td>
				<td><a class='del btn btn-small btn-secondary' data-id='$stock_id' href='dashboard/deleteUpload'><span>delete</span></a></td>
				<td><a class='activate btn btn-small btn-secondary' data-id='$stock_id' href='dashboard/reviewUpload/$stock_id' ><span>review</span></a></td>
				<td><a class='edit btn btn-small btn-secondary' href=''><span>edit</span></a><a class='save btn btn-small btn-secondary' href='' data-id='$stock_id' style='display: none' ><span>save</span></a></td>
			</tr>
			";
	}
	echo "</tbody></table>";
	
	echo "<tr>
				<td style='display: none;' ><span class='fieldText txtpid'> </span><input type='text' value=''  class='fieldEdit tbxpid' style='display: none' /></td>
				<td><span class='fieldText txtmedianame'> </span><input type='text' value=''  class='fieldEdit tbxmedianame' style='display: none' /></td>
				<td><span class='fieldText txtheadline'> </span><input type='text' value=''  class='fieldEdit tbxheadline' style='display: none' /></td>
				<td ><span class='fieldText txtpublicationdate'> </span><input type='text' value=''  class='fieldEdit tbxpublicationdate' style='display: none' /></td>
				<td ><span class='fieldText txtmediatype'> </span><input type='text' value=''  class='fieldEdit tbxmediatype' style='display: none' /></td>
				<td><span class='fieldText txtdaterecieved' ></span><input type='text' value=''  class='fieldEdit tbxdaterecieved' style='display: none' /></td>
				<td><span class='fieldText txtuploadedby' ></span><input type='text' value=''  class='fieldEdit tbxuploadedby' style='display: none' /></td>
				<td><span class='fieldText txtarticletext' ></span><textarea class='fieldEdit tbxarticletext' style='display: none'></textarea></td>
				<td><a class='del btn btn-small btn-secondary' id='' href='URLdashboard/deleteStock'><span>delete</span></a></td>
				<td><a class='activate btn btn-small btn-secondary' id='' href='URL/dashboard/reviewStock' ><span>review</span></a></td>
				<td><a class='edit btn btn-small btn-secondary' href=''><span>edit</span></a><a class='save btn btn-small btn-secondary' href='' style='display: none' ><span>save</span></a></td>
			</tr>
			";
	
	echo "<a class='addStockLink' id='add_stock' href='".URL."dashboard/add_stock'><span>Add Stock</span></a>";
}

?>

<div id="content">
	<div class="container">
		<div class="row">
			<div class="">
				<h3 class="title col-sm-9 col-md-6 col-lg-4">Stock Manager</h3>
				<?php
					displayStock();
				?>
			</div> <!-- /.span4 -->
		</div> <!-- /.row -->	
	</div> <!-- /.container -->
</div> <!-- /#content -->
	