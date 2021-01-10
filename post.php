<!--Video tutorial start with video number 14-->
<?php include 'includes/db.php'; ?>
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
	<div class="container">
		<article class="row" style="margin-top: 20px;">
			<section class="col-lg-7">
				<?php
				if (isset($_GET['post_id'])) 
				{
					$sel_sql = "SELECT * FROM posts WHERE id = '$_GET[post_id]'";
					$run_sql = mysqli_query($conn,$sel_sql);
					while ($rows = mysqli_fetch_assoc($run_sql)) 
					{
						echo '
							<div class="card">
								<div class="card-body">
									<div class="card-title">
										<h3>'.$rows[''].'</h3>
									</div>
									<img src="image/'.$rows['image'].'" width="100%">
									<h4>'.$rows['title'].'</h4>
									<p>"'.$rows['description'].'"</p>
								</div>
							</div>
						';
					}
				}
				else{
					echo '<div class="alert alert-danger">Oops!!No Post your are selected <a href="index.php">Click Here to See </a> the post</div>';
				}				
				?>
			</section>
			<?php include 'includes/sidebar.php'; ?>
		</article>
	</div>
	  <?php include 'includes/footer.php'; ?>
	</body>
</html>