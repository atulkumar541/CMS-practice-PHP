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

	$result = '';

	if (isset($_GET['new_status'])) 
	{
		$new_status = $_GET['new_status'];
		$sql = "UPDATE `posts` SET `status` = '$new_status' WHERE id = $_GET[id]  ";
		if ($run = mysqli_query($conn,$sql)) 
		{
			$result = '<div class="alert alert-success">We Just Update the post</div>';
		}
	}
	if (isset($_GET['del_id'])) 
	{
		$del_id = $_GET['del_id'];
		$del_sql = "DELETE FROM `posts` WHERE `id` = '$del_id'";
		if ($del_run = mysqli_query($conn,$del_sql)) {
			$result = '<div class="alert alert-danger">Well!!The Post No. '.$del_id.' Deleted Successful!!</div>';	
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
			  <?php include 'includes/sidebar.php' ?>
	  		<div class="col-lg-9" style="margin-top: 30px">
	  			<?php echo $result; ?>
	  			<div class="col-lg-12">
	  				<div class="card">
		  			<div class="card-header"><h3>Latest Post</h3></div>
			  			<div class="card-body">
			  				<table class="table table-striped">
			  					<thead>
			  						<tr>
				  						<th>Sr. No</th>
				  						<th>Date/Time</th>
				  						<th>Image</th>
				  						<th>Title</th>
				  						<th>Description</th>
				  						<th>Category</th>
				  						<th>Author</th>
				  						<th>Status</th>
				  						<th>Action Post</th>
				  						<th>Edit Post</th>
				  						<th>View Post</th>
				  						<th>Delete Post</th>
			  						</tr>
			  					</thead>
			  					<tbody>
			  						<?php 
			  							//$sel_sql = "SELECT * FROM posts ORDER BY id DESC";
			  							$sel_sql = "SELECT * FROM `posts` p JOIN `user` u ON p.`author` = u.`user_email` ";
			  							$run_sql = mysqli_query($conn,$sel_sql);
			  							$count = 0;
			  							while ($rows = mysqli_fetch_assoc($run_sql)) 
			  							{
			  								$count ++;
			  								echo '<tr>
						  							<td>'.$count.'</td>
							  						<td>'.$rows['date'].'</td>
							  						<td>'.($rows['image']== '' ? 'No Image' : '<img src="../image/'.$rows['image'].'" width="50px">').'</td>
							  						<td>'.$rows['title'].'</td>
							  						<td scope="row">'.substr($rows['description'],0,50).'...</td>
							  						<td>'.$rows['category'].'</td>
							  						<td>'.$rows['user_name'].'</td>
							  						<td>'.$rows['status'].'</td>
							  						<td>'.($rows['status'] == 'draft' ? '<a href="post_list.php?new_status=published&id='.$rows['id'].'" class="btn btn-primary btn-sm btn-block">Publish</a>' : '<a href="post_list.php?new_status=draft&id='.$rows['id'].'" class="btn btn-info btn-sm btn-block">draft</a>' ).'</td>
							  						<td><a href="edit_post.php?edit_id='.$rows['id'].'" class="btn btn-warning btn-sm btn-block">Edit</a></td>
							  						<td><a href="../post.php?post_id='.$rows['id'].'" class="btn btn-success btn-sm btn-block">View</a></td>
							  						<td><a href="post_list.php?del_id='.$rows['id'].'" class="btn btn-danger btn-sm btn-block">Delete</a></td>
						  						</tr>';
			  							}
			  						?>
			  					</tbody>
			  				</table>
			  			</div>
	  				</div>
	  			</div>
	  			<div style="margin-top: 50px">
	  			<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item"><a class="page-link" href="#">4</a></li>
				    <li class="page-item"><a class="page-link" href="#">5</a></li>
				    <li class="page-item"><a class="page-link" href="#">6</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
				</div>
				</div>
	  		</div>
	  	</body>
	</html>

