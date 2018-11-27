<?php
	error_reporting(0);
	session_start();

	if(!isset($_SESSION['id'])){
		header('Location: execute_logout.php');
	}
	require_once("db.php");
	$query1 = "SELECT * 
		FROM  `user` 
		WHERE u_id ={$_SESSION['id']}";
	$result1 = mysqli_query($db_con, $query1);
	if($row1 = mysqli_fetch_assoc($result1)){
		$name = $row1["full_name"];
		$Phone_no = $row1["p_number"];
		$email = $row1["email"];
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ice storege</title>
	<link rel="stylesheet" href="styles/user_profile.css">
</head>
<body>
	<div class="whole_page">
		<?php
			require_once("user_heading.php");
		?>

		<div class="content">
			<table>
				<tr>
					<td class="td_1">
						<img src="img/users/default_user.png" class="img">
					</td>
					<td class="td_2">
						<h2>
						User Profile
						</h2>
						<p>
							Name: <?php echo $name; ?>
						</p>
						<p>
							Phone no: <?php echo $Phone_no; ?>
						</p>
						<p>
							Email: <?php echo $email; ?>
						</p>						
					</td>
				</tr>
			</table>
		</div>
		
	</div>

</body>
</html>