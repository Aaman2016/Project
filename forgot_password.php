<?php
	session_start();
	require_once('Config/config.php');
	require_once('mail/phpmailer/PHPMailerAutoload.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="css/loginstyle.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Forgot Password</h2></center>
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form method="post">
		
			<div class="inner_container">
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter Email" name="email" required><br><br>
				<button class="login_button" name="forgot" type="submit">Send</button>
				<a href="login.php"><button type="button" class="register_btn">Go Back</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['forgot']))
			{
				@$email=$_POST['email'];
				$query = "SELECT Password FROM user_master WHERE Email='$email' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
						$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
						$_SESSION['Id'] = $row['Id'];
						echo $_SESSION['Password'] = $row['Password'];

						$mail = new PHPMailer();
						$mail->IsSMTP();
						$mail->SMTPDebug = 0;
						$mail->SMTPAuth = TRUE;
						$mail->SMTPSecure = "tls";
						$mail->Port     = 587;  
						$mail->Username = 'projecthub.info1@gmail.com';
						$mail->Password = 'Neha@7801802437';
						$mail->Host     = 'smtp.gmail.com';
						$mail->Mailer   = 'smtp';
						$mail->SetFrom('projecthub.info1@gmail.com','Project Hub');
						$mail->AddAddress($email);
						$mail->AddReplyTo('projecthub.info1@gmail.com');
						$mail->IsHTML(true);
						$mail->Subject = "Forgot Password";
						$mail->Body = "<h3>Your Password is. ".$_SESSION['Password'];"</h3>";
						$mail->WordWrap   = 80;
						if(!$mail->Send())
						{ 
							echo "<script>alert('Please Enter Valid Email.')</script>";
						}
						else
						{ 
							echo "<script>alert('Password Send in Your Register Email Please Check Your Email.')</script>";
							header("Location: login.php");
						}
						
						
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
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