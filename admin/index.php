<?php session_start(); 
include 'includes/db.php'; 
	if (isset($_SESSION['user']) && isset($_SESSION['password'])) 
	{
		$sel_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_pass = '$_SESSION[password]'";
		if ($run_sql= mysqli_query($conn,$sel_sql)) 
		{
			while ($rows = mysqli_fetch_assoc($run_sql)) 
			{
				$name = $rows['user_name'];
				$role = $rows['role'];
				$email = $rows['user_email'];
				$mobile = $rows['user_mobile'];
				$gender = $rows['user_gender'];
				$married = $rows['user_merital'];
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

//Countingn POsts
	$sql = "SELECT * FROM posts WHERE status = 'published'";
	$run_sql = mysqli_query($conn,$sql);
	$total_post = mysqli_num_rows($run_sql);
//counting Category

	$sql = "SELECT * FROM category";
	$run_sql = mysqli_query($conn,$sql);
	$total_cat = mysqli_num_rows($run_sql);

// counting user
	$sql = "SELECT * FROM user";
	$run_sql = mysqli_query($conn,$sql);
	$total_user = mysqli_num_rows($run_sql);

// counting comment's
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
		<style type="text/css">
			.table td{
				padding: 2px
			}
			.table th{
				padding: 2px
			}
		</style>		
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php'; ?>
	  		<div class="col-lg-9" style="margin-top: 30px">
				<?php echo"<b>Welcome: </b>". $_SESSION['user']; ?>
	  			<div class="col-md-12">
	  				<?php 
	  					
	  				 ?>
	  			<div class="row">
	  				<div class="col-md-3 card card-header" style="margin-right:">	  				
	  					<div class="card-body" style="height:100px; font-family: all;">
	  							<div class="col-xs-2 text-center">
	  								<div style="font-size: 2.0em"><?php echo $total_post; ?></div>
	  								<div>Posts</div>
	  							</div>
	  					</div>
	  					<a href="post_list.php">
	  						<div class="card-title">
	  							<div class="pull-left">View Post</div>	
	  						</div>
	  					</a>
	  				</div>
	  				<div class="col-md-3 card card-header">	  				
	  					<div class="card-body" style="height: 100px; font-family: all;">
	  							<div class="col-xs-2 text-center">
	  								<div style="font-size: 2.0em"><?php echo $total_cat; ?></div>
	  								<div>Categories</div>
	  							</div>
	  					</div>
	  					<a href="category_list.php">
	  						<div class="card-title">
	  							<div class="pull-left">View Category</div>
	  						</div>
	  					</a>
	  				</div>
	  				<div class="col-md-3 card card-header">	  				
	  					<div class="card-body" style="height: 100px;font-family: all;">
	  							<div class="col-xs-2 text-center">
	  								<div style="font-size: 2.0em"><?php echo $total_user; ?></div>
	  								<div>User's</div>
	  							</div>
	  					</div>
	  					<a href="#">
	  						<div class="card-title">
	  							<div class="pull-left"> View User's</div>	
	  						</div>
	  					</a>
	  				</div>
	  				<div class="col-md-3 card card-header">	  				
	  					<div class="card-body" style="height: 100px;font-family: all;">
	  							<div class="col-xs-2 text-center">
	  								<div style="font-size: 2.0em">6</div>
	  								<div>Comment's</div>
	  							</div>
	  					</div>
	  					<a href="#">
	  						<div class="card-title">
	  							<div class="pull-left">View comment's</div>	
	  						</div>
	  					</a>
	  				</div>
	  				<div class="col-md-7 card card-header" style="margin-top: 20px; margin-right: 30px ">
	  					<div class="card-header"><h3>User List</h3></div>
			  			<div class="card-body">
			  				<table class="table table-striped">
			  					<thead>
			  						<tr>
				  						<th>Sr. No</th>
				  						<th>Name</th>
				  						<th>Role</th>
			  						</tr>
			  					</thead>
			  					<tbody>
			  					<?php
			  						$sql = "SELECT * FROM user LIMIT 5";
			  						$run = mysqli_query($conn,$sql);
			  						$count = 0;
			  						while ($rows = mysqli_fetch_assoc($run)) 
			  						{
			  							$count++;
			  							echo '<tr>
					  							<td>'.$count.'</td>
						  						<td>'.$rows['user_name'].'</td>
						  						<td>'.$rows['role'].'</td>
					  						</tr>';
			  						}
			  					?>
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>
	  				<!--Profile Area-->
	  				<div class="col-md-4" style="margin-top: 20px;">
	  					<div class="card card-header" style="background-color: #008dfd;">
	  						<div class="col-md-5 row">
	  							<div class="page-header text-center"><h4 style="margin-right: 30px"><?php echo $name; ?></h4></div>	  						
	  						<div class="col-md-8 pull-right">
	  							<img src="../image/lion.jpg" width="100px" style="border-radius: 100%">
	  						</div>
		  						<div class="card-body">
					  				<table class="table table-condensed">
					  					<tbody>
					  						<tr>			
						  						<th>Role:</th>
						  						<td><?php echo $role; ?></td>
					  						</tr>
					  						<tr>			
						  						<th>Email:</th>
						  						<td><?php echo $email; ?></td>
					  						</tr>
					  						<tr>			
						  						<th>Contact:</th>
						  						<td><?php echo $mobile; ?></td>
					  						</tr>
					  						<tr>			
						  						<th>Gender:</th>
						  						<td><?php echo $gender; ?></td>
					  						</tr>
					  						<tr>			
						  						<th>Status:</th>
						  						<td><?php echo $married; ?></td>
					  						</tr>
					  						<tr>			
						  						<th>Country:</th>
						  						<td>India</td>
					  						</tr>
					  					</tbody>
					  				</table>
					  			</div>	
	  						</div>
		  				</div>	
	  				</div>
	  			</div>
	  			</div>
	  			<div class="card" style="margin-top: 20px">
		  			<div class="card-header"><h3>Latest Post</h3></div>
			  			<div class="card-body">
			  				<table class="table table-striped">
			  					<thead>
			  						<tr>
				  						<th>Sr. No</th>
				  						<th>Date</th>
				  						<th>Image</th>
				  						<th>Title</th>
				  						<th>Description</th>
				  						<th>Category</th>
				  						<th>Author</th>
			  						</tr>
			  					</thead>
			  					<tbody>
			  						<?php
			  							$sql = "SELECT * FROM posts p JOIN category c ON c.cat_id=p.category WHERE p.author = '$_SESSION[user]' AND p.status = 'published'";
			  							//$sql = "SELECT * FROM posts WHERE author = '$_SESSION[user]' AND status = 'published'";
			  							$run = mysqli_query($conn,$sql);
			  							while ($rows = mysqli_fetch_assoc($run)) 
			  							{
			  								echo '<tr>
						  							<td>1</td>
							  						<td>'.$rows['date'].'</td>
							  						<td><img src="../image/'.$rows['image'].'" width="100px"></td>
							  						<td>'.$rows['title'].'</td>
							  						<td>'.substr($rows['description'], 0,50).'....</td>
							  						<td>'.$rows['category_name'].'</td>
							  						<td>'.$name.'</td>
						  						</tr>';
			  							}
			  						 ?>			  						
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>

	  				<div class="card" style="margin-top: 20px">
		  			<div class="card-header"><h3>Latest Comments</h3></div>
			  			<div class="card-body">
			  				<table class="table table-striped">
			  					<thead>
			  						<tr>
				  						<th>Sr. No</th>
				  						<th>Date</th>
				  						<th>Author</th>
				  						<th>Email</th>
				  						<th>Post</th>
				  						<th>Comment</th>
			  						</tr>
			  					</thead>
			  					<tbody>
			  						<tr>
			  							<td>1</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
			  						</tr>
			  						<tr>
			  							<td>2</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
			  						</tr>
			  						<tr>
			  							<td>3</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
			  						</tr>
			  						<tr>
			  							<td>4</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
			  						</tr>
			  						<tr>
			  							<td>5</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
			  						</tr>
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>
	  			</div>	  		
	  		</div>
	  		<footer style="margin-top: 50px"></footer>
	  	</body>
	</html>