<div id="headerwrap" style="margin-top: -150px">
      <div class="container">
         <div class="row">
		  <div class="col-lg-12">
			<h2>Create new product</h2>
			<form action="<?php echo URL; ?>product/create" class="form-horizontal col-sm-9 col-md-6 col-lg-4" role="form" method="post" enctype="multipart/form-data" id="addProductFrm" style="background: rgb(221, 219, 219); margin-top: 30px; padding: 20px;"> 
				<div id="successMsg" class="form-group" style="display: none" >
					<h2>
						<b>Upload Success!</b>
					</h2>
				</div>
				<div id="formContents" >
					<div class="form-group"> 
						<label for="category" class="col-sm-2 control-label">Category</label> 
						<div class="col-sm-10"> 
							<select name="category" id="category" class="form-control" required ><option value="1" selected>Drinks</option><option value="2" >Snacks</option></select>
						</div> 
					</div> 
					<!--div class="form-group"> 
						<label for="sub_category" class="col-sm-2 control-label">Sub Category</label> 
						<div class="col-sm-10"> 
							<select name="sub_category" id="sub_category" class="form-control" required ><option value="Drinks" selected>Alchole</option><option value="Snacks" >Chips</option></select>
						</div> 
					</div --> 
					
					<div class="form-group"> 
						<label for="brandname" class="col-sm-2 control-label">Brandname</label> 
						<div class="col-sm-10"> 
							<input value="Coca Cola" type="text" class="form-control" id="brandname" name="brandname" placeholder="Brandname" /> 
						</div> 
					</div>
					
					<div class="form-group"> 
						<label for="product_name" class="col-sm-2 control-label">Product Name</label> 
						<div class="col-sm-10"> 
							<input value="123123123" type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" /> 
						</div> 
					</div>
					
					<div class="form-group"> 
						<label for="product_name" class="col-sm-2 control-label">Description</label> 
						<div class="col-sm-10"> 
							<input value="cooler" type="text" class="form-control" id="description" name="description" placeholder="Description" /> 
						</div> 
					</div>			
					
					<div class="form-group">
						<label for="unit_volume" class="col-sm-2 control-label">Unit Volume</label> 
						<div class="col-sm-10">
							<input value="123123123" type="text" class="form-control" id="unit_volume" name="unit_volume" placeholder="Unit Volume" /> 
						</div>
					</div>

					<div class="form-group">
						<label for="back_quantity" class="col-sm-2 control-label">Quantity</label> 
						<div class="col-sm-10">
							<input value="123123123" type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" /> 
						</div>
					</div>

					<div class="form-group">
						<label for="cost_price" class="col-sm-2 control-label">Cost Price</label> 
						<div class="col-sm-10">
							<input value="123666321" type="text" class="form-control" id="cost_price" name="cost_price" placeholder="Cost Price" /> 
						</div>
					</div>
					
					<div class="form-group">
						<label for="selling_price" class="col-sm-2 control-label">Selling Price</label> 
						<div class="col-sm-10">
							<input value="123666321" type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Selling Price" /> 
						</div>
					</div>					

					<!--div class="form-group">
						<label for="front_quantity" class="col-sm-2 control-label">Image</label> 
						<div class="col-sm-10">
							<input type='file' id="file[]" name="file[]" multiple required data-validation-required-message="Please upload a picture" />
						</div>
					</div-->
					
					<input type="hidden" id="owner" name="owner" value="66"  />
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10"> 
							<button type="submit" class="btn btn-default">Submit</button> <img src="<?php echo URL;?>public/img/loading.gif" id="loading" style="display: none;">
						</div> 
					</div> 
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10"> 
							<span id="success"></span>
						</div> 
					</div> 
				</div> 	
			</form>	
		</div>
        </div>
      </div>
</div><!-- /headerwrap -->
<script type="text/javascript" src="<?php echo URL; ?>public/js/Uploader.js"></script>	
<script>
	$("#addProductFrm").ajaxForm(options);
</script>