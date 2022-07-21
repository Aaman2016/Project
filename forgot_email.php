<?php
	session_start();
	require_once('Config/config.php');
	require_once('mail/phpmailer/PHPMailerAutoload.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Email</title>
<link rel="stylesheet" href="css/loginstyle.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Forgot Email</h2></center>
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form method="post">
		
			<div class="inner_container">
				<label><b>Mobile Number</b></label>
				<input type="text" placeholder="Enter Mobile No." name="mobile" required><br><br>
				<button class="login_button" name="forgot" type="submit">Send SMS</button>
				<a href="login.php"><button type="button" class="register_btn">Go Back</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['forgot']))
			{
				@$mobile=$_POST['mobile'];
				$query = "SELECT * FROM user_master WHERE Mobile='$mobile' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
						$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
						//$_SESSION['Id'] = $row['Id'];
						echo $_SESSION['UserName'] = $row['UserName'];
						echo $_SESSION['Email'] = $row['Email'];

						//$message = "Hi" .$row['UserName']. " Your Project Hub Email is ".$_SESSION['Email'];" ";
						$url="https://www.sms4india.com/api/v1/sendCampaign";
						$message = urlencode("Hi " .$row['UserName']. " Your Project Hub Email is ".$_SESSION['Email']);// urlencode your message
						$curl = curl_init();
						curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
						curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=865109MCYQXLQQER2ASIL78CU250XOE9&secret=FHG2143K6LM0AN0I&usetype=stage &phone=$mobile&senderid=projecthub.infoway@gmail.com&message=$message");// post data
						// query parameter values must be given without squarebrackets.
						 // Optional Authentication:
						curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						$result = curl_exec($curl);
						curl_close($curl);
						echo $result;

						echo "<script>alert('SMS Send Sucessfully...')</script>";
						header("Location:login.php");
						
					}
					else
					{
						echo '<script type="text/javascript">alert("Mobile Number is Not Valid")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>