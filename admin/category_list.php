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
	if (isset($_GET['del_id'])) 
	{
		$del_sql = "DELETE FROM `category` WHERE `cat_id` = '$_GET[del_id]'";
		if (mysqli_query($conn,$del_sql)) 
		{
			$result ='<div class="alert alert-danger">You&apos;ve Delete a category id is &apos;'.$_GET['del_id'].'&apos;</div>';
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
		
		
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php' ?>

	  		<div class="col-lg-9" style="margin-top: 30px">
	  			<div class="col-md-12">
	  				<?php echo $result; ?>
	  				<div class=""><h3>Category List</h3><hr></div>
	  				<div class="col-md-7 card" style="margin-top: 20px; margin-right: 30px ">
	  					
			  			<div class="card-body">
			  				<table class="table table-striped table-bg-success">
			  					<thead>
			  						<tr>
				  						<th>Sr. No</th>
				  						<th>Category Name</th>
				  						<th>Edit</th>
				  						<th>Delete</th>
			  						</tr>
			  					</thead>
			  					<tbody>
			  						<?php 

			  							$sql = "SELECT * FROM `category`";
			  							$run = mysqli_query($conn,$sql);
			  							$count = 0;
			  							while ($rows = mysqli_fetch_assoc($run)) 
			  							{ 
			  								$count++;
			  								if ($rows['category_name'] == 'home') 
			  								{
			  								 continue;

			  								}else{
			  									$category_name = ucfirst($rows['category_name']);
			  								}
			  								echo '<tr>
						  							<td>'.$count.'</td>
							  						<td>'.$category_name.'</td>
							  						<td><a href="edit_category.php?cat_id='.$rows['cat_id'].'" class="btn btn-info btn-sm">Edit</a></td>
							  						<td><a href="category_list.php?del_id='.$rows['cat_id'].'" class="btn btn-danger btn-sm">Delete</a></td>	
						  						</tr>';
			  							}
			  						?>
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>
	  			</div>
	  			</div>
	  			</div>	  		
	  		</div>
	  	</body>
	</html>