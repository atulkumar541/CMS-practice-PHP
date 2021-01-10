<!--Video tutorial start with video number 14-->
<?php include 'includes/db.php';
	
	date_default_timezone_set('Asia/Kolkata');
	$date_by = date("yy-m-d h:i:s"); 
if (isset($_POST['submit_contact'])) 
{  
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$comment = $_POST['comment'];
	$ins_sql="INSERT INTO `comments`(`name`, `email`, `subject`, `comment`, `date`) VALUES ('$name','$email','$subject','$comment','$date_by')";

	$run_sql = mysqli_query($conn,$ins_sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="plugins/tinymce/init-tinymce.js"></script>

	<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script>-->
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="container" style="margin-top: 80px;">
		<article class="row">
			<section class="col-lg-7">
				<div class="page-header">
					<h2>Contact Us Form</h2>
				</div>
				<form class="form-horizontal" action="contact.php" method="post">
	                <div class="form-group">
	                    <label for="name" class="col-sm-3">Name</label>
	                    <div class="col-sm-9">
	                    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter name"/>
	                    </div>	                            
	                	</div>
	                <div class="form-group">
	                    <label for="name" class="col-sm-3">Email Address</label>
	              	        <div class="col-sm-9">
		            	       	<input type="email" class="form-control" name="email" id="email" placeholder="Enter email"/>
	                        </div>	                            
	               </div>
	               <div class="form-group">
	                    <label for="name" class="col-sm-3">Subject</label>
	              	        <div class="col-sm-9">
		            	       	<input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject"/>
	                        </div>	                            
	               </div>
	               <div class="form-group">
	                    <label for="name" class="col-sm-3">Comment</label>
	              	        <div class="col-sm-9">
	              	        	<textarea name="comment" id="comment" rows="5" class="tinymce"></textarea>
		    	            </div>   
	               </div>
	               <div class="form-group">
	                    <label for="name" class="col-sm-3"></label>
	              	        <div class="col-sm-9">
		            	       	<input type="submit" value="Submit" name="submit_contact" id="submit" class="btn btn-block btn-danger">
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