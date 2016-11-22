<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Products</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery_3_1_1.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

	<style>
	.panel-info > .panel-heading {
		background-color: #5cb85c;
		color: white;
	}
	#signinlink {
		color: white;
	}
	</style>
</head>
<body>
	<div id="addProduct" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
							<div class="panel panel-info">
									<div class="panel-heading">
											<div class="panel-title">Add Product</div>
											<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo base_url('index.php/Login'); ?>">Log In  </a></div>
									</div>
									<div class="panel-body" >
										<?php echo validation_errors(); ?>
											<form id="addProduct" class="form-horizontal" role="form"  method="POST" action="<?php echo base_url("index.php/Admin/AddProduct"); ?>" >
													<div id="addProductalert" style="display:none" class="alert alert-danger">
															<p>Error:</p>
															<span></span>
													</div>
													<div class="form-group">
															<label for="name" class="col-md-3 control-label">Product Name</label>
															<div class="col-md-9">
																	<input type="text" class="form-control" name="name" placeholder="Product Name" value="">
															</div>
													</div>
													<div class="form-group">
															<label for="price" class="col-md-3 control-label">Price</label>
															<div class="col-md-9">
																	<input type="text" class="form-control" name="price" placeholder="Price" value="">
															</div>
													</div>
													<div class="form-group">
															<div class="col-md-offset-3 col-md-9">
																	<button id="btn-signup" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> Add</button>
															</div>
													</div>
												</form>
									 </div>

          	 </div>
                      <h3>Product List</h3>
                       <table class="table table-hover">
                         <thead>
                           <tr>
                             <th>Product Name</th>
                             <th>Price</th>
                           </tr>
                         </thead>
                         <tbody>

                           <?php
                           foreach ($products as $product) { ?>
                           <tr>
                             <td><?php echo $product->name; ?></td>
                             <td><?php echo $product->price; ?></td>
                           </tr>
                           <?php
                       } ?>
                         </tbody>
                       </table>
                     </div>

</body>
</html>
