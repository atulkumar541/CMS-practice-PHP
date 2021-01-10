<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/mycss.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome/css/font-awesome.css">
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
<nav class="navbar navbar-fixed-top sticky-top navbar-dark bg-dark">
		<div class="container" id="nav">
			<a href="index.php" id="cms" class="navbar-brand"><i>C M S Website</i></a>
			<ul class="nav">
				 
				<?php 
				$sel_cat = "SELECT * FROM category";
				$run_cat = mysqli_query($conn,$sel_cat);
				while ($rows = mysqli_fetch_assoc($run_cat)) 
				{
					if (isset($_GET['cat_name'])) 
					{
						if ($_GET['cat_name'] == $rows['category_name']) 
						{
								$class = 'active';
						}
						else
						{
							$class = '';
						}					
					}
					else
					{
						$class = '';
					}
					if ($rows['category_name'] == 'home') 
					{
						if ($_SERVER['PHP_SELF'] 	=='cms/index/php') 
						{
							echo '<li class="active"><a href="index.php" id="nava">'.ucfirst($rows['category_name']).'</a></li>';
						}
						else
						{
							
							echo '<li class=""><a href="index.php" id="nava">'.ucfirst($rows['category_name']).'</a></li>';
						}
					}
					else{
						echo '
							<li class="'.$class.'"><a href="menu.php?cat_id='.$rows['cat_id'].'" id="nava">'.ucfirst($rows['category_name']).'</a></li>
						';
					}					
				}
				 ?>
				<li><a href="#" id="nava">Articles</a></li>
				<li><a href="contact.php" id="nava">Contact</a></li>
				<li><a href="registration.php" id="nava">Registration</a></li>				
			</ul>
		</div>		
	</nav>