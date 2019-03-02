<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign up</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
	<?php
	error_reporting(0);
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$gender=$_POST['gndr'];
	$bd=$_POST['bday'];
	$age=$_POST['age'];
	$un =$_POST['user'];
	$pw = $_POST['pass'];
	$ps1=$_POST['pass1'];
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$conn= mysqli_connect ("localhost","root","","signupdb");
		if (isset($_POST) && !empty ($_POST))
		{
			$sql = "SELECT * FROM signuptbl WHERE Username='$un'";
			$sql1 = "SELECT * FROM signuptbl WHERE Email ='$d'";
			$result = mysqli_query($conn,$sql);
			$result1 = mysqli_query($conn,$sql1);
			$row = mysqli_num_rows ($result);
			$row1 = mysqli_num_rows ($result1);
			if ($a == "" || $b == "" || $c == "" ||$d == "" ||$bd == "" || $un == "" ||$pw == "" )
			{
				echo'<script>';
				echo'alert("All fields are required!")';
				echo'</script>';
			}
			else if ($row > 0 && $row1 > 0)
			{
				echo'<script>';
				echo'alert("Username and Email already exists!")';
				echo'</script>';
			}
			else if ($row > 0)
			{
				echo'<script>';
				echo'alert("Username already exists!")';
				echo'</script>';
			}
			else if ($row1 > 0)
			{
				echo'<script>';
				echo'alert("Email already exists!")';
				echo'</script>';
			}
			else
			{
				$sql = "INSERT INTO signuptbl (Username,Password,FirstName,MiddleName,LastName,Email,Birthdate) VALUES ('$un','$pw','$a','$b','$c','$d','$bd')";
				$result = mysqli_query($conn,$sql);
				$_SESSION["Username"]=$row["FirstName"]." ".$row["LastName"];
				header("location:account.php");
			}
	}
	}
	?>
	<body>
<form action="" method="POST">
	<div class="sign">
	<h2>Please fill up all the Information needed</h2>
<b><p class="t">Name:
	<input type="text" placeholder="First Name"name="a" class="inputname">
	<input type="text" placeholder="Middle Name"name="b" class="inputname">
	<input type="text" placeholder="Last Name"name="c" class="inputname">
	Sex:
	<input type="radio" name="gndr">Male
	<input type="radio"name="gndr">Female
</p>
<p class="t">Birthday: 
	<input type="date" name="bday"class="input2">
	Age:<select class="input3" name="age">
	<option >11</option>
	<option >12</option>
	<option >13</option>
	<option >14</option>
	<option >15</option>
	<option >16</option>
	<option >17</option>
	<option >18</option>
	<option >19</option>
	<option >11</option>
	<option >11</option>
	<option >11</option>
	<option >11</option>
	<option >11</option>
	<option >000</option>
	</select>
	Email Address: <input type="email"name="d" class="input1">
</p>
	<p class="t">Username: <input type="text" name="user" class="user"></p> 
	<p class="t">Password:<input type="password" name="pass" class="pass"></p> 
	<p class="t">Confirm Password: <input type="password" name="pass1" class="pass1"></p>
	<input type="submit" value="Sign Up" class="but">
	</b>
	<h1><?php echo$output; ?></h1>
	</div>
	
</form>
	</body>
</html>		