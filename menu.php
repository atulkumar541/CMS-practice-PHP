<!--Video tutorial start with video number 14-->
<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/mycss.css">
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
					$sel_sql = "SELECT * FROM posts WHERE category = '$_GET[cat_id]'";
					$run_sql = mysqli_query($conn,$sel_sql);
					while ($rows = mysqli_fetch_assoc($run_sql)) 
					{
						echo '
							<div class="card card-post">
								<div class="card-header card-success">
									<a href="post.php?post_id='.$rows['id'].'" style="color:black;"><h4>'.$rows['title'].'</h4></a>
								</div>
								<div class="card-body">
									<div class="row">
								        <div class="col-md-4">
								           <a href="post.php?post_id='.$rows['id'].'"><img src="image/'.$rows['image'].'" width="100%"></a>
								        </div>
								        <div class="col-md-8">
											<p>"'.substr($rows['description'],0,250).'......"</p>
											<a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read More</a>
								        </div>       
								        
								        
								    </div>					
								</div>
							</div>
						';
					}
				?>
			</section>
			<?php include 'includes/sidebar.php'; ?>
		</article>
	</div>
	  <?php include 'includes/footer.php'; ?>
	</body>
</html>

32