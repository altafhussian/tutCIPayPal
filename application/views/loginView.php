<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter - PayPal Integration</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery_3_1_1.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
<?php echo validation_errors(); ?>
	<div id="login-overlay" class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
               <h4 class="modal-title" id="myModalLabel">Admin Login</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-xs-12">
                       <div class="well">
                           <form id="loginForm" method="POST" action="<?php echo base_url("index.php/VerifyLogin"); ?>" novalidate="novalidate">
                               <div class="form-group">
                                   <label for="username" class="control-label">Username</label>
                                   <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" required="" title="Please enter you username" placeholder="username">
                                   <span class="help-block"></span>
                               </div>
                               <div class="form-group">
                                   <label for="password" class="control-label">Password</label>
                                   <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" required="" title="Please enter your password" placeholder="password">
                                   <span class="help-block"></span>
                               </div>
                               <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                               <button type="submit" class="btn btn-success btn-block">Login</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

</body>
</html>
