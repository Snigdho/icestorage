<?php
	error_reporting(0);
	session_start();

	if(!isset($_SESSION['id'])){
		header('Location: execute_logout.php');
	}

	require_once("db.php");

	if(isset($_GET['file_id'])){
		$query01 = "delete from file where f_id={$_GET["file_id"]}";
		$result01 = mysqli_query($db_con, $query01);
		if($result01){
			$delete_destination = "storage/".$_GET["file_id"];
			unlink($delete_destination);
			$notification = "alert(" . "\"Deleted Successfully\"" . ");";
		}
	}

	$query1 = "SELECT * 
		FROM  `file` 
		WHERE u_id ={$_SESSION['id']}";
	$result1 = mysqli_query($db_con, $query1);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Browse files</title>
	<link rel="stylesheet" href="styles/user_files.css">
</head>
<body>
	<div class="whole_page">
		<?php
			require_once("user_heading.php");
		?>
		<div class="content">
			<div class="file_continer">
				<div class="td1">Serial #</div>
				<div class="td2">File Name</div>			
				<div class="td3">Size</div>			
				<div class="td4">Delete</div>
				<hr />
				<?php $counter = 1; while($row1 = mysqli_fetch_assoc($result1)){ 
					$fl_id = $row1["f_id"];

					?>

				<div class="td1"><?php echo $counter; $counter++; ?></div>
				<div class="td2"><a href="#"><?php echo $row1["f_name"]; ?></a></div>
				<div class="td3"><?php $size = $row1["size"] / 1024; $size = number_format($size,2); echo $size; ?> KB</div>
				<div class="td4"><a href="user_files.php?file_id=<?php echo $fl_id; ?>"><img src="img/cross.png"></a></div>
				<hr />

				<?php } ?>
			</div>
		</div>
		
	</div>
<script>
	<?php echo $notification; ?>
</script>
</body>
</html>