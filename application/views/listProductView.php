<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List Products</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />

	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery_3_1_1.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/main.js"); ?>"></script>

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
<div class="col-md-3">
  <div class="container">
      <div class="well well-sm">
          <strong>Display</strong>
          <div class="btn-group">
              <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
              </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                  class="glyphicon glyphicon-th"></span>Grid</a>
          </div>
      </div>
      <div id="products" class="row list-group">
        <?php
        foreach ($products as $product) { ?>
          <div class="item  col-xs-4 col-lg-4">
              <div class="thumbnail">

                  <div class="caption">
                      <h4 class="group inner list-group-item-heading">
                          <?php echo $product->name; ?></h4>
                      <div class="row">
                          <div class="col-xs-12 col-md-6">
                              <p class="lead">
                                  <?php echo $product->price; ?></p>
                          </div>
                          <div class="col-xs-12 col-md-6">
                              <a class="btn btn-success" href="<?php echo base_url().'index.php/ListProduct/buy/'.$product->id; ?>">Pay Now</a>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <?php
      } ?>
      </div>
  </div>
</body>
</html>
