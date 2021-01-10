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

	$error = '';
	$success = '';
//POST INSERT CODE..
	if (isset($_POST['submit_post'])) 
	{
		$title = strip_tags($_POST['title']);
		$description = $_POST['description'];
		$category = $_POST['category'];
		$author = $_SESSION['user'];
		$status = $_POST['status'];
		$date_by = date('Y-m-d h:i:s');

		if ($_FILES['image']['name'] !='') 
		{
			$image_name = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			$image_size = $_FILES['image']['size'];
			$image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
			$image_path = '../image/'.$image_name;
			$image_db_path = '../image/'.$image_name;

	//VALIDATION OF IMAGES CHECKS  HERE...			

			if ($image_size < 2000000) 
			{
				if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'jpeg') 
				{
					if (move_uploaded_file($image_tmp, $image_path)) {
						$ins_sql = "INSERT INTO `posts`(`title`, `description`, `image`, `category`,`status`, `date`, `author`) VALUES ('$title','$description','$image_db_path','$category','$status','$date_by','$author');";
						if (mysqli_query($conn,$ins_sql)) 
						{
							header('post_list.php');
						}else{
							$error = '<div class="alert alert-danger">The Query Was not Working</div>';
							echo "Error: " . $ins_sql . "<br>" . $conn->error;
						}						
					}else{
						$error = '<div class="alert alert-danger">OOPs!! Image was Not Uploaded Try Again!!</div>';
					}					
				}else{
					$error = '<div class="alert alert-danger">OOPs!! Image File Extension not Valid!! must Choose .JPEG/.JPG/.PNG</div>';
				}				
			}else{
				$error = '<div class="alert alert-danger">OOPs!! Image File Size is much Bigger then Expect!! must be Less Than 2mb</div>';
			}
		}
		else
		{
			$ins_sql = "INSERT INTO `posts`(`title`, `description`, `category`, `status`, `date`, `author`) VALUES ('$title','$description','$category','$status','$date_by','$author');";
			if (mysqli_query($conn,$ins_sql)) 
				{
					header('post_list.php');
				}else{
					$error = '<div class="alert alert-danger">Empty Image The Query Was not Working</div>';
					echo "Error: " . $ins_sql . "<br>" . $conn->error;
				}
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
		<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/jquery-3.5.0.min.js"></script>
		<script type="text/javascript" src="../plugins/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../plugins/tinymce/init-tinymce.js"></script>
		<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'textarea'});</script>-->
		
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php' ?>
			<div class="col-lg-9" style="margin-top: 30px">
				<?php echo $error ; ?>
				<?php echo $success ; ?>
	  			<div class="col-md-12">
		  			<div class=""><h3>New Post<hr></h3></div>
		  				<div style="width: 50px; height: 50px"></div>
		  				<form class="from-horizontal" action="new_post.php" method="post" enctype="multipart/form-data">
		  					<div class="from-group">
		  						<label for="title" class="col-sm-3"><b>Upload an Image</b></label>
			  					<div class="col-sm-8">
			  						<input type="file" class="btn btn-primary" name="image" id="image" required="" />
			  					</div>
		  					</div>
		  					<div class="from-group">
		  						<label for="title" class="col-sm-3"><b>Title</b></label>
			  					<div class="col-sm-8">
			  						<input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required="" autofocus="" />
			  					</div>
		  					</div>		  					
		  					<div class="from-group">
		  						<label for="category" class="col-sm-3"><b>Category</b></label>
			  					<div class="col-sm-8">
			  						<select class="form-control" name="category">
			  							<option>Select Category...</option>
			  							<?php
			  								$sel_qry = "SELECT * FROM category";
			  								$run_qry = mysqli_query($conn,$sel_qry);
			  								while ($rows = mysqli_fetch_assoc($run_qry)) 
			  								{
			  									if ($rows['category_name'] == 'home') 
			  									{
			  										continue;	
			  									}
			  									echo '<option value="'.$rows['cat_id'].'">'.ucfirst($rows['category_name']).'</option>';
			  								}
			  							?>
			  						</select>
			  					</div>
		  					</div>		  					
		  					<div class="from-group">
		  						<label for="Description" class="col-sm-3"><b>Description</b></label>
			  					<div class="col-sm-8">
			  						<textarea name="description" id="description" rows="5"  class="tinymce"></textarea>
			  					</div>
		  					</div>
		  					<div class="from-group">
		  						<label for="Status" class="col-sm-3"><b>Status</b></label>
			  					<div class="col-sm-8">
			  						<select class="form-control" name="status">
			  							<option>Select Status...</option>
			  							<option value="published">Publish</option>
			  							<option value="draft">Draft</option>
			  						</select>
			  					</div>
		  					</div>
		  					<div class="form-group">
	                    		<label for="name" class="col-sm-3"></label>
	              	        	<div class="col-sm-8">
		            	       		<input type="submit" value="Submit" name="submit_post" id="submit" class="btn btn-block btn-danger">
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