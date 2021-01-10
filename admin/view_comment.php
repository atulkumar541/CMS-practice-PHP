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
				padding: 4px;
			}
			.table th{
				padding: 4px;
			}
		</style>
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php' ?>

	  		<div class="col-lg-9" style="margin-top: 30px">
	  			<div class="col-md-12">
	  			<div class="row">
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
				  						<th>Status</th>
				  						<th>Delete</th>
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
				  						
				  						<td><a href="" class="btn btn-info btn-sm btn-block">Approved</a></td>
				  						<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
			  						</tr>
			  						<tr>
			  							<td>2</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
				  						<td>Approve</td>
				  						<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
			  						</tr>
			  						<tr>
			  							<td>3</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
				  						
				  						<td><a href="" class="btn btn-info btn-sm btn-block">Approved</a></td>
				  						<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
			  						</tr>
			  						<tr>
			  							<td>4</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
				  						<td>Approve</td>
				  						<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
			  						</tr>
			  						<tr>
			  							<td>5</td>
				  						<td>2020-05-12</td>
				  						<td>Atulkumar</td>
				  						<td>atul@gmail.com</td>
				  						<td>2</td>
				  						<td>I like That Post</td>
				  						<td><a href="" class="btn btn-info btn-sm btn-block">Approved</a></td>
				  						<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
			  						</tr>
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>
	  			</div>	  		
	  		</div>
	  	</body>
	</html>