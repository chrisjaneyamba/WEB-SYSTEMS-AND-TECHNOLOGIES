<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Logout</a>
    </p>
<style>
		a{color:#fff;}
		a:hover{background-color:yellow; color:black;}
	</style>
</head>
<body bgcolor="#dddeee">
<?php include("./config.php");?>
<table border="1" width="120%">
<tr><td width="50%">
		<?php
		
	
		//Fetch data from table (e.g. users)
		//Retrieve
		
		$query = mysqli_query($link, "SELECT * FROM users WHERE status = 'Active'") or die(mysqli_error());
		echo "<br  ><br>";
		echo "Total registered Students)";
		echo "<table border='1' style='border-collapse:collapse;background-color:green; color:#fff;'>
				<th>Student ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Status</th>
			 ";
		while($row = mysqli_fetch_array($query)){
			echo "<tr>
					<td>$row[username]</td>
					<td>$row[lastname]</td>
					<td>$row[firstname]</td>
					<td>$row[status]</td>
				  </tr>";
		}
		echo "</table>";
	?>
	 <?php 
		echo "<br><br>";
		echo "<br>----------------------------------------------------------------------------------<br>";
		echo "Update and Deleting of Students";
		echo "<table border='1' style='border-collapse:collapse;background-color:green; color:#fff;'>
				<th>Student ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Status</th>
				<th>Action</th>
			 ";
	$query1 = mysqli_query($link, "SELECT * FROM users WHERE status = 'Active'") or die(mysqli_error());
		while($row = mysqli_fetch_array($query1)){
			echo "<tr>
					<td>$row[username]</td>
					<td>$row[lastname]</td>
					<td>$row[firstname]</td>
					<td>$row[status]</td>
					<td align='center'><a style='text-decoration:none;' href='delete.php/?id=$row[username]'>X</a></td>
				  </tr>";
		}
		echo "</table><br><br>"
	?>
	 
	 
	 
	 
</body>
</html>