<?php
	//session_start();
	require_once('Config/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/loginstyle.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#cpassword").blur(function(){
        var password = $("#password").val();
		var cpassword = $("#cpassword").val();
		if (password != cpassword) 
		{
        	alert("PASSWORD DO NOT MATCH");
			$("#password").focus();
        }
	});
});
</script>
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Sign Up Form</h2></center>
				
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<label><b>User Name:</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Gender:</b></label>
				<select name="gender">
					<option selected="" disabled="">-- SELECTED --</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select><br><br>
				<label><b>Email Address:</b></label>
				<input type="text" placeholder="Enter Email Address:" name="email" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<label><b>Mobile No.:</b></label>
				<input type="number" placeholder="Enter Mobile no" maxlength="10" name="mobile" required>
				<label><b>Address:</b></label>
				<input type="text" placeholder="Enter Address" maxlength="255" name="address" required>
				<label><b>Pincode:</b></label>
				<input type="number" placeholder="Enter Pincode" maxlength="6" name="pincode" required>
				<label><b>City:</b></label>
				<input type="text" placeholder="Enter City" name="city" required>
				<label><b>State:</b></label>
				<input type="text" placeholder="Enter State" name="state" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="login.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$gender = $_POST['gender'];
				@$email=$_POST['email'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$mobile=$_POST['mobile'];
				@$address=$_POST['address'];
				@$pincode=$_POST['pincode'];
				@$city=$_POST['city'];
				@$state=$_POST['state'];

				
				if($password==$cpassword)
				{
					$query = "SELECT * FROM user_master WHERE UserName='$username' ";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "INSERT INTO user_master (UserName, Gender, Email, Password, Mobile, Address, Pincode, City, State) VALUES ('$username', '$gender' ,'$email','$password', '$mobile','$address','$pincode','$city','$state')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo "<script>alert('User Registered.. Welcome.');</script>"; 
								$_SESSION['UserName'] = $username;
								#$_SESSION['password'] = $password;
								header( "Location: login.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>