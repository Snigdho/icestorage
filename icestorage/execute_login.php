<?php	
	error_reporting(0);
	session_start();
	require_once("db.php");

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$query = "select * from user where email='{$email}' and password='{$pass}'";
		$result = mysqli_query($db_con, $query);
		if(mysqli_num_rows($result) == 1){
			$query2 = "select u_id from user where email='{$email}'";
			$result2 = mysqli_query($db_con, $query2);
			if($row_id = mysqli_fetch_assoc($result2)){
				$id = $row_id["u_id"];
			}
			$_SESSION['id'] = $id;
			/*if($name == "admin"){
				$_SESSION['type']="admin";
			}*/
			header('Location: user_dashboard.php');
		}
		else{
			$err = "Invalid username or password";
		}
	}
?>