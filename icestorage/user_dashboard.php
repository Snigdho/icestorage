<?php
	error_reporting(0);
	session_start();

	if(!isset($_SESSION['id'])){
		header('Location: execute_logout.php');
	}
	
	require_once("db.php");

	$query1 = "select full_name from user where u_id='{$_SESSION['id']}'";
	$result1 = mysqli_query($db_con, $query1);
	if($row = mysqli_fetch_assoc($result1)){
		$name = $row["full_name"];
	}

	
	$query11 = "SELECT SUM(size) 
		FROM  `file` 
		WHERE u_id ={$_SESSION['id']}";
	$result11 = mysqli_query($db_con, $query11);
	if($row11 = mysqli_fetch_assoc($result11)){
		$sum_space = 0;
		$sum_space += $row11["SUM(size)"];
		
		$free_bytes = 500000 * 1024;
		$free_bytes = $free_bytes - $sum_space;		
	}


	if (isset($_POST['upload'])) {
		$err_up = 0;
		$file_name = $_FILES['uploaded']['name'];
		$file_type = $_FILES['uploaded']['type'];
		$file_size = $_FILES['uploaded']['size'];
		//$file_size = number_format($file_size,0);
		//$notification = "alert(" . "\"{$file_name} {$file_size}\"" . ");";
		
		if ($_FILES["uploaded"]["size"] > $free_bytes){
			$notification = "alert(" . "\"Sorry, file size too large!\"" . ");";
			$err_up = 1;
		}

		if($err_up == 0){
			$query2 = "INSERT INTO  `icestoragedb`.`file` (
			`f_id` ,
			`f_name` ,
			`type` ,
			`size` ,
			`u_id`
			)
			VALUES (
			NULL ,  '{$file_name}',  '{$file_type}',  '{$file_size}',  '{$_SESSION['id']}'
			);";
			$result2 = mysqli_query($db_con, $query2);
			if($result2){			

				$query3 = "SELECT MAX( f_id ) 
				FROM  `file` 
				WHERE u_id ={$_SESSION['id']}"; 
				$result3 = mysqli_query($db_con, $query3);
				if($row3 = mysqli_fetch_assoc($result3)){
					$notification = "alert(" . "\"{$row3["MAX( f_id )"]}\"" . ");";
					$new_id = $row3["MAX( f_id )"];
				}

				$destination = "storage/" . $new_id;
				move_uploaded_file($_FILES['uploaded']['tmp_name'], $destination);

				$notification = "alert(" . "\"Uploaded successfully\"" . ");";
			}
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" href="styles/user_dashboard.css">
</head>
<body>
	<div class="whole_page">
		<?php
			require_once("user_heading.php");
		?>
		<div class="content">
			<p class="welcome">Welcome,  <?php echo $name; ?></p>			
			<form action="user_dashboard.php" method="post" enctype="multipart/form-data">
				<label>Upload a File: </label>
				<input type="file" name="uploaded" id="uploaded" required>
				<br />
				<input type="submit" value="upload" name="upload" class="button">
			</form>
			<br />

			<?php

				$query11 = "SELECT SUM(size) 
					FROM  `file` 
					WHERE u_id ={$_SESSION['id']}";
				$result11 = mysqli_query($db_con, $query11);
				if($row11 = mysqli_fetch_assoc($result11)){
					$sum_space = 0;
					$sum_space += $row11["SUM(size)"];
					
					$free_bytes = 500000 * 1024;
					$free_bytes = $free_bytes - $sum_space;		
				}

				$used_space = $sum_space / 1024;
				$free_space = 500000.00 - $used_space;	
				$used_space = number_format($used_space,2);
				$free_space = number_format($free_space,2); 
			?>

			<table>
				<tr>
					<td>Total Space:</td><td> 500,000 KB </td>
				</tr>
				<tr>
					<td>Used Space:</td><td> <?php echo $used_space; ?> KB</td>
				</tr>
				<tr>
					<td>Free Space:</td><td> <?php echo $free_space; ?> KB</td>
				</tr>
			</table>			
		</div>
	</div>

<script>
	<?php echo $notification; ?>
</script>

</body>
</html>