<!--Video tutorial start with video number 14-->
<?php include 'includes/db.php';
	
	date_default_timezone_set('Asia/Kolkata');	
	$match = '';
	$unscu = '';
	$success = '';
if (isset($_POST['register'])) 
{  
	$role = "Subscriber";
	if ($_POST['password'] == $_POST['con_password']) 
	{		
		$date_by = date('Y-m-d h:i:s'); 
		$regi_inst = "INSERT INTO `user` (`role`,`user_name`, `user_email`, `user_pass`, `user_confirmpass`, `user_gender`, `user_merital`, `user_mobile`, `date_by`) VALUES ('$role','$_POST[name]','$_POST[email]','$_POST[password]','$_POST[con_password]','$_POST[gender]','$_POST[merital]','$_POST[mobile]','$date_by')";

		if ($conn->query($regi_inst) == TRUE)
		{
			$success ='<div class="alert alert-success">Well done!! Registration Successful</div>';
		}
		else
		{			
			$success ='<div class="alert alert-danger">Opps!! Registration Unsuccessful</div>';
			//echo "Error: " . $regi_inst . "<br>" . $conn->error;
		}
	}
	else
	{
		$match ='<div class="alert alert-danger">Opps!! Confirm Password Doesn&apos;t match</div>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome/css/font-awesome.css">
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="container" style="margin-top: 80px;">
		<article class="row">
			<section class="col-lg-7">
				<div class="page-header">
					<h2>Registration Here...</h2><hr>
				</div>
				<?php echo $success; ?>
				
				<?php echo $unscu; ?>
				<?php echo $match; ?>
				<form class="form-horizontal" action="registration.php" method="post">
	                <div class="form-group row">
	                    <label for="name" class="col-sm-2">Name<span style="color: red;"> *</span></label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="" />
	                    </div>	                            
	                	</div>
	                <div class="form-group row">
	                    <label for="email" class="col-sm-2">Email Address<span style="color: red;"> *</span></label>
	              	        <div class="col-sm-9">
		            	       	<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="" />
	                        </div>	                            
	               </div>
	               <div class="form-group row">
	                    <label for="password" class="col-sm-2">Password<span style="color: red;"> *</span></label>
	              	        <div class="col-sm-9">
		            	       	<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required="" />
	                        </div>	                            
	               </div>
	                <div class="form-group row">
	                    <label for="Confirm password" class="col-sm-2">Confirm<span style="color: red;"> *</span> Password</label>
	              	        <div class="col-sm-9">
		            	       	<input type="password" class="form-control" name="con_password" id="con_password" placeholder="Enter Confirm password" required="" />
	                        </div>	                            
	               </div>
	               <div class="form-group row">
	                    <label for="gender" class="col-sm-2">Gender</label>
	              	        <div class="col-sm-3">
		            	       	<select class="form-control" name="gender" id="gender">
		            	       		<option class="active" value="">Choose..</option>
		            	       		<option value="Male">Male</option>
		            	       		<option value="Female">Female</option>
		            	       	</select>
	                        </div>	                           
	                    <label for="Merital" class="col-sm-3">Merital Status</label>
	              	        <div class="col-sm-3">
		            	       	<select class="form-control" name="merital" id="merital">
		            	       		<option class="active disabled">Choose..</option>
		            	       		<option value="Single">Single</option>
		              	       		<option value="Married">Married</option>
		            	       		<option value="Divoced">Divoced</option>
		            	       		<option value="Other">Other</option>
		            	       	</select>
	                        </div>	                            
	               </div>
	               <div class="form-group row">
	                    <label for="Phone" class="col-sm-2">Mobile No.</label>
	              	        <div class="col-sm-9">
		            	       	<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile No."/>
	                        </div>	                            
	               </div>
	               <div class="form-group">
	                    <label for="submit" class="col-sm-3">   </label>
	              	        <div class="col-sm-11">
		            	       	<input type="submit" value="Register Your Self" name="register" id="register" class="btn btn-block btn-danger">
	                		</div>	                            
	               </div>		               
				</form>
			</section>
			<?php  include 'includes/sidebar.php'; ?>			
		</article>
	</div>
	<?php  include 'includes/footer.php'; ?>
	</body>
</html>
