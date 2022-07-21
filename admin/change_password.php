<?php
session_start();
require_once('../Config/config.php');
error_reporting(0);
if (strlen($_SESSION['PID']==0)) 
{
	header('location:logout.php');
} 
else
{
	if(isset($_POST['submit']))
	{
		$adminid=$_SESSION['PID'];
		$cpassword=($_POST['currentpassword']);
		$newpassword=($_POST['newpassword']);
		$query = "SELECT ID FROM admin WHERE ID='$adminid' AND Password='$cpassword'";
		$query_run=mysqli_query($con, $query);
		$row=mysqli_fetch_array($query_run);
		if($row>0)
		{
			$query = "UPDATE admin SET Password='$newpassword' WHERE ID = '$adminid' ";
			$ret=mysqli_query($con, $query);
			echo "<script>alert('Your Password Successully Changed.');</script>"; 
    		echo "<script>window.location.href = 'change_password.php'</script>";   
		} 
		else 
		{
			echo "<script>alert('Your Current Password is Wrong.');</script>"; 
		}
}  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Change Password</title>

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
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Change Password</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Reset Your Password :</h4>
						</div>
						<div class="form-body">
							<form method="post" name="changepassword" onsubmit="return checkpass();" action="">
  								<?php
									$adminid=$_SESSION['PID'];
									$query = "SELECT * FROM admin WHERE ID ='$adminid' ";
									$ret=mysqli_query($con, $query);
									$cnt=1;
									while ($row=mysqli_fetch_array($ret)) {
								?>
							 <div class="form-group">
								<label for="exampleInputEmail1">Current Password</label> 
								<input type="password" name="currentpassword" class="form-control" required= "true" value=""> 
							</div> 
							<div class="form-group"> 
								<label for="exampleInputPassword1">New Password</label> 
								<input type="password" name="newpassword" class="form-control" value="" required="true"> 
							</div>
							 <div class="form-group"> 
							 	<label for="exampleInputPassword1">Confirm Password</label> 
							 	<input type="password" name="confirmpassword" class="form-control" value="" required="true">
							</div>
							  
							<button type="submit" name="submit" class="btn btn-default">Change</button> </form> 
						</div>
						<?php } ?>
					</div>
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
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
<?php } ?>