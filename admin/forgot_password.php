<?php
session_start();
error_reporting(0);
require_once('../Config/config.php');
require_once('mail/phpmailer/PHPMailerAutoload.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>BPMS | Forgot Page </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Forgot Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to AdminPanel ! </h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
								<input type="text" name="email" class="lock" placeholder="Email" required="true">
							
							<input type="text" name="contactno" class="lock" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
							
							<input type="submit" name="submit" value="Reset">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="index.php">Already have an account</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
						<?php
			if(isset($_POST['forgot']))
			{
				@$email=$_POST['email'];
				$query = "SELECT Password FROM admin WHERE Email='$email' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
						$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
						$_SESSION['ID'] = $row['ID'];
						echo $_SESSION['Password'] = $row['Password'];

						$mail = new PHPMailer();
						$mail->IsSMTP();
						$mail->SMTPDebug = 0;
						$mail->SMTPAuth = TRUE;
						$mail->SMTPSecure = "tls";
						$mail->Port     = 587;  
						$mail->Username = 'projecthub.infoway@gmail.com';
						$mail->Password = 'MeetBhatt3815';
						$mail->Host     = 'smtp.gmail.com';
						$mail->Mailer   = 'smtp';
						$mail->SetFrom('projecthub.infoway@gmail.com','Project Hub');
						$mail->AddAddress($email);
						$mail->AddReplyTo('projecthub.infoway@gmail.com');
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
							header("Location: index.php");
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
				</div>
				
				
			</div>
		</div>
		
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>