<?php session_start(); 
include 'includes/db.php'; 
	if (isset($_SESSION['user']) && isset($_SESSION['password'])) 
	{
		$sel_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_pass = '$_SESSION[password]'";
		if ($run_sql= mysqli_query($conn,$sel_sql)) 
		{
			while ($rows = mysqli_fetch_assoc($run_sql)) 
			{
				$user_name	= $rows['user_name'];
				$user_gender = $rows['user_gender'];
				$user_merital = $rows['user_merital'];
				$user_mobile = $rows['user_mobile'];
				$user_email = $rows['user_email'];
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
				padding: 2px
			}
			.table th{
				padding: 0px
			}
		</style>		
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		<div class="row">
			  <?php include 'includes/sidebar.php' ?>

	  		<div class="col-lg-9" style="margin-top: 30px">
	  			<div class="col-lg-11">
	  				<div class="card-title"><h3>User List</h3></div><hr>
	  				<div class="card row" style="background-color: #007bff;">
	  					<div class="card-heading row">
	  						<div class="col-lg-4" >
	  							<img src="../image/black.jpg" width="50%" height="90%" class="img-thumnail" style="border: 3px solid; border-color: #d4cdcd; margin-top: 10px; margin-left: 40px; margin-bottom:10px">
	  						</div><hr>	
	  						<div class="col-md-8">
	  							<p><h4 style="font-family:monospace ;"><b><u> <?php echo ucfirst( $user_name); ?></u></b></h4></p>
	  							<!--<span><i class="fa fa-heart-o" aria-hidden="true"></i>  Web Developer</span><br>
	  							<span><i class="fa fa-road" aria-hidden="true"></i>  Mumbai</span><br>-->
	  							<span><i class="fa fa-phone" aria-hidden="true"></i> <?php echo ucfirst($user_mobile); ?> </span><br>
	  							<span><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo ucfirst($user_email); ?></span>
	  						</div><hr>
	  						<div class="clearfix"></div>
	  					</div>
	  				</div>
	  			</div>
	  			<div style=" height: 20px"></div>
	  			<div class="row">
	  			<div class="col-md-3">
	  				<div class="card card-header">
	  					<table class="table table-condensed">
	  						<tbody>
	  							<tr>
		  							<th>Gender</th>
		  							<td><?php echo ucfirst($user_gender); ?></td>
	  							</tr>
	  							<tr>
		  							<th>Marital status</th>
		  							<td><?php echo ucfirst($user_merital); ?></td>
		  						</tr>
		  						<!--<tr>
		  							<th>Website</th>
		  							<td>xyz.com</td>
		  						</tr>-->
	  						</tbody>
	  					</table>
	  				</div>
	  			</div>
	  			<div class="col-md-3">
	  				<div class="card card-header">
	  					<table class="table table-condensed">
	  						<tbody>
	  							<tr>
	  								<td width="20%">1</td>
	  								<td><a href="">The First Post</a></td>
	  							</tr>
	  							<tr>
	  								<td>2</td>
	  								<td><a href="">The Second Post</a></td>
	  							</tr>
	  							<tr>
	  								<td>3</td>
	  								<td><a href="">The Third Post</a></td>
	  							</tr>	  							
	  						</tbody>
	  					</table>
	  				</div>
	  			</div>
	  			<div class="col-md-5">
	  				<div class="card card-header">
	  					<h4>About me</h4>
	  					<span>Lorem ipsum dolor sit amet, consectetur adipiscing Lorem ipsum dolor sit amet, consectetur adipiscing...</span>
	  				</div>
	  			</div>
	  		</div>
	  		</div>	  		
	  	</div>
	</body>
</html>