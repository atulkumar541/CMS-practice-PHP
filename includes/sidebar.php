<aside class="col-lg-5" style="margin-top: 10px;">
				<form class="form-group form-horizontal" action="search.php" method="get" role="form">
					<div class="card">
						<div class="card-header">
							<h5>Search Something</h5>
						</div>
						<div class="card-body">
							<div class="form-group row col-sm-12">
								<input type="text" name="search" class="form-control" placeholder="Search Something Here..." autofocus />
							</div>
							<div class="form-group row col-sm-12">
                                    <button class="btn btn-danger btn-block" type="submit" name="search_submit">Search</button>
							</div>
						</div>						
					</div>
				</form>
				<form class="form-group form-horizontal" role="form" action="accounts/login.php" method="post">
					<div class="card">
					<div class="card-header">Login Area</div>
						<div class="card-body">
							<div class="form-group row">
		                        <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>
		                        <div class="col-md-7">
		                            <input type="email" id="username" class="form-control" name="user_name" placeholder="Username / E-mail">
		                        </div>
                     		</div>
							<div class="form-group row">
		                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
		                        <div class="col-md-7">
		                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your Password">
		                        </div>
                     		</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="submit" name="submit_login" id="submit_login" class="btn btn-success btn-login btn-block">
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="list-group">
					<?php
						$sel_side = "SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC LIMIT 6";
						$run_side = mysqli_query($conn,$sel_side);
						while ($rows = mysqli_fetch_assoc($run_side)) 
						{
							if (isset($_GET['post_id'])) 
							{
								if ($_GET['post_id'] == $rows['id']) 
								{
									$class ="active";
								}
								else
								{
									$class ='';
								}
							}
							echo '
							<a href="post.php?post_id='.$rows['id'].'" class="list-group-item 
							list-group-item-action '.$class.'">
							<div class="row">
								<div class="col-sm-4">
									<img src="image/'.$rows['image'].'" style="height: 114px;" width="100%">
								</div>
								<div class="col-sm-8" >
									<div class="col-sm-12" style="margin-left:140px">
										<small>'.$rows['date'].'</small>
									</div>
									<div class="d-flex w-100 justify-content-between">
								      <h5 class="mb-1">'.$rows['title'].'</h5>
								    </div>
										<p class="list-group-item-text">"'.substr($rows['description'],0,50).'......"</p>
								</div>
							</div>
							<div style="clear:both"></div>	
							</a>';
						}
					 ?>
				</div >
			</aside>