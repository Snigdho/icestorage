<?php
	require_once("execute_login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" href="styles/log_in.css">
</head>
<body>
	<div class="whole_page">
		<?php
			require("heading.php");
		?>

		<div class="content">
			<div class="sign_in">
				<h3>Sign in here:</h3>
				<form action="log_in.php" method="post">
					<br />					
					<br />
					<table>
						<tr>
							<td><label>Email:</label></td>
							<td><input type="text" name="email" id="email" class="text_box" required></td>
						</tr>
						<tr>
							<td><label>Password:</label></td>
							<td><input type="password" name="pass" id="pass" class="text_box" required></td>
						</tr>
					</table>
					<input type="submit" value="Sign in" name="submit" class="button">
				</form>
				<br />
				<span id="red"><?php echo $err; ?></span>
			</div>
			<div class="sign_up">
				<h3>Haven't registered yet? Lets start Today...</h3>
				<br />
				<a href="register.php"><div id="register_button">Register Now</div></a>
			</div>
			
		</div>
		
	</div>

</body>
</html>