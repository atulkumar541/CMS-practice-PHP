<?php session_start(); 
include 'includes/db.php'; 
	if (isset($_SESSION['user']) && isset($_SESSION['password'])) 
	{
		$sel_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_pass = '$_SESSION[password]'";
		if ($run_sql= mysqli_query($conn,$sel_sql)) 
		{
			while ($rows = mysqli_fetch_assoc($run_sql)) 
			{				
				if(mysqli_num_rows($run_sql) == 1)
				{
					if ($rows['role'] == 'Admin') 
					{
						
					}
					else
					{
						header('Location:../index.php');
					}
				}
				else
				{
					header('Location:../index.php');
				}
			}			
		}			
	}
	else
	{
		header('Location:../index.php');	
	}
	$result ='';
	if (isset($_POST['submit_category']))
	{
		$category = strip_tags($_POST['category']);	
		$sql = "INSERT INTO `category` (category_name) VALUES ('$category') ";
		if (mysqli_query($conn,$sql)) {
			$result = '<div class="alert alert-success">You&apos;ve creted a new category named &apos;'.$category.'&apos;</div>';
		}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/mycss.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/font-awesome/css/font-awesome.css">
		<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'textarea'});</script>
		
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php' ?>
			<div class="col-lg-9" style="margin-top: 30px">
	  			<div class="col-md-12">
	  				<?php echo $result ?>
		  			<div class=""><h3>New Category<hr></h3></div>
		  				<div style="width: 50px; height: 50px"></div>
		  				<form class="from-horizontal col-lg-5" action="new_category.php" method="post">
		  					<div class="from-group">
		  						<label for="title"><b>Category</b></label>
			  					<div class="">
			  						<input type="text" class="form-control" name="category" id="category" placeholder="Enter Category Name"/>
			  					</div>
		  					</div>		  					
		  					
		  					<div class="form-group">
	                    		<label for="name" class="col-sm-3"></label>
	              	        	<div class="">
		            	       		<input type="submit" value="Submit" name="submit_category" id="submit" class="btn btn-block btn-danger">
	                			</div>	                            
	               			</div>	
		  				</form>
		  		</div>
	  		</div>
	  	</div>
			  <footer></footer>	  		  		
	  	</div>
	  	</body>
	</html>