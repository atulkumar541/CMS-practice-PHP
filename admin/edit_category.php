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
	if (isset($_POST['update_category']))
	{
		$category = strip_tags($_POST['category']);
		$sql = "UPDATE `category` SET `category_name`='$category' WHERE `cat_id` ='$_POST[cat_id]'";
		//$sql = "INSERT INTO `category` (category_name) VALUES ('$category') ";
		if (mysqli_query($conn,$sql)) {
			header('Location:category_list.php');
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
	  				<?php 
	  					if (isset($_GET['cat_id'])) { 
	  						$sql = "SELECT * FROM category WHERE cat_id = '$_GET[cat_id]'";
	  						$run = mysqli_query($conn,$sql);
	  						while ($rows = mysqli_fetch_assoc($run)) 
	  						{	  							
	  				?>
	  					<div class=""><h3>Edit Category<hr></h3></div>
		  				<div style="width: 50px; height: 50px"></div>
		  				<form class="from-horizontal col-lg-5" action="edit_category.php" method="post">
		  					<div class="from-group">
		  						<input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>">
		  						<label for="title"><b>Category Name</b></label>
			  					<div class="">
			  						<input type="text" class="form-control" name="category" id="category" value="<?php echo $rows['category_name']; ?>" placeholder="Enter Category Name"/>
			  					</div>
		  					</div>
		  					<div class="form-group">
	                    		<label for="name" class="col-sm-3"></label>
	              	        	<div class="">
		            	       		<input type="submit" value="Submit" name="update_category" id="submit" class="btn btn-block btn-danger">
	                			</div>	                            
	               			</div>	
		  				</form>
	  					<?php } } else{	  						   
	  						   echo $result = '<div class="alert alert-danger">Please Select a Category</div>';	
	  						}
	  					?>		  			
		  		</div>
	  		</div>
	  	</div>
  	</div>
  	</body>
</html>