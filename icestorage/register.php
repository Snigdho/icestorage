<?php
	$err2 = "";

	if(isset($_POST['submit'])){

		$er = 0;

		if($_POST['spass'] != $_POST['cpass']){
			$notification = "alert(" . "\"Password did not match!\"" . ");";
			$er = 1;
		}

		if($er == 0){
			require_once("db.php");
			$query = "INSERT INTO  `icestoragedb`.`user` (
				`u_id` ,
				`full_name` ,
				`p_number` ,
				`email` ,
				`password`
				)
				VALUES (
				NULL ,  '{$_POST['name']}',  '{$_POST['phone_no']}',  '{$_POST['email']}',  '{$_POST['spass']}'
				);";
			$result = mysqli_query($db_con, $query);
			if($result){
				$notification = "alert(" . "\"Successfully Registered. Now you can LOG IN!\"" . ");";
			}
			
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="styles/log_in.css">
</head>
<body>
	<div class="whole_page">
		<?php
			require_once("heading.php");
		?>

		<div class="content">
			
			<div class="sign_up">
				<h3>Lets start Today...</h3>
				<form action="register.php" method="post">
					<?php echo $err2; ?>
					<br />
					<table>
						<tr>
							<td><label>Full name:</label></td>
							<td><input type="text" name="name" id="name" class="text_box" required></td>
							<td>*</td>
						</tr>
						<tr>
							<td><label>Phone number:</label></td>
							<td><input type="text" name="phone_no" id="phone_no" class="text_box"></td>
						</tr>
						<tr>
							<td><label>Email:</label></td>
							<td><input type="text" name="email" id="email" class="text_box" required></td>
							<td>*</td>
						</tr>
						<tr>
							<td><label>Password:</label></td>
							<td><input type="password" name="spass" id="spass" class="text_box" required></td>
							<td>*</td>
						</tr>
						<tr>
							<td><label>Retype password:</label></td>
							<td><input type="password" name="cpass" id="cpass" class="text_box" required></td>
							<td>*</td>
						</tr>
					</table>
					<input type="submit" value="Sign up" name="submit" class="button">
				</form>				
			</div>
			
		</div>
		
	</div>
<script>
	<?php echo $notification; ?>
</script>
</body>
</html>