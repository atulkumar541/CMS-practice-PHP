<?php 
	session_start();
	include '../includes/db.php';
	if (isset($_POST['submit_login'])) 
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if (!empty($user_name) && !empty($password)) 
		{
			$user_name = mysqli_real_escape_string($conn,$user_name);
			$password = mysqli_real_escape_string($conn,$password);
			$sql = "SELECT * FROM user WHERE user_email = '$user_name' AND user_pass = '$password'";
			if ($result = mysqli_query($conn,$sql))
			{
				while ($rows = mysqli_fetch_assoc($result)) 
				{
					if (mysqli_num_rows($result) == 1) 
					{
						$_SESSION['user'] = $user_name;
						$_SESSION['password'] = $password;
						$_SESSION['role'] = $rows['role'];
						header('Location:../admin/index.php');					
					}else
					{
						header('Location:../index.php?login=input_wrong');
					}				
				}				
			}
			else
			{
				header('Location:../index.php?login=query_error');
			}
		}else
		{
			header('Location:../index.php?login=empty');
		}
	}
	else
	{
		header('Location:../index.php');
	}
?>