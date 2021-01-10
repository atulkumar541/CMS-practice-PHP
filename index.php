<!--Video tutorial start with video number 14-->
<?php 
session_start();
include 'includes/db.php'; 
	$login_err = '';
	if (isset($_GET['login'])) 
	{
		if ($_GET['login'] =='empty') 
		{
			$login_err ='<div class="alert alert-danger">User Name and Password was empty!!</div>';
		}
		elseif ($_GET['login'] == 'input_wrong') 
		{
			$login_err ='<div class="alert alert-danger">User Name and Password Input was wrong!!</div>';	
		}
		elseif ($_GET['login'] == 'query_error') 
		{
			$login_err ='<div class="alert alert-danger">Something Missing In database !!</div>';	
		}	
	}
	
	//PAGIGNATION CODE FROM HERE...

	$per_page = 2;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
?>
<!DOCTYPE html>
<html>
<head>
	<title>CMS</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/mycss.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome/css/font-awesome.css">
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="container" style="margin-top: 10px;">
		<?php echo $login_err; ?>
		<article class="row" style="margin-top: 20px;">
			<section class="col-lg-7">
				<?php 

					$sel_sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC LIMIT $start_from,$per_page";
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
		<div style="margin-top: 30px"></div>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
				   	<li class="page-item">
					    <a class="page-link" href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					    </a>	
				    </li>
				<?php
					$pagination_sql = "SELECT * FROM posts WHERE status = 'published'";
					$run_pagination = mysqli_query($conn,$pagination_sql);

					$count = mysqli_num_rows($run_pagination);
					$total_page = ceil($count/$per_page);

					for ($i=1; $i<=$total_page; $i++){ 
						echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
					}
				?>
					<li class="page-item">
				      	<a class="page-link" href="index.php?page=" aria-label="Next">
				        	<span aria-hidden="true">&raquo;</span>
				      	</a>
				    </li>
				</ul>
			</nav>
	</div>
	  <?php include 'includes/footer.php'; ?>
	</body>
</html>