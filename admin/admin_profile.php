<?php
session_start();
error_reporting(0);
require_once('../Config/config.php');
if (strlen($_SESSION['PID']==0))
{
	header('location:logout.php');
} 
else
{
	if(isset($_POST['update']))
  	{
    	$adminid=$_SESSION['PID'];
    	$name=$_POST['name'];
    	$email = $_POST['email'];
  		$mobile=$_POST['mobile'];
  		
     	$query= "UPDATE admin SET Name ='$name', Email= '$email', Mobile='$mobile' WHERE ID='$adminid'";
     	$query_run = mysqli_query($con, $query);
    	if ($query_run) 
    	{
    		echo "<script>alert('Profile Has Been Updated...!!');</script>";
  		}
  		else
    	{
    		echo "<script>alert('Something Went Wrong. Please try again.');</script>";	
    	}
  	}
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Profile</title>

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

<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
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
					<h3 class="title1">Admin Profile</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Profile :</h4>
						</div>
						<div class="form-body">
							<form method="POST" enctype="multipart/form-data">	
  							<?php
								$adminid=$_SESSION['PID'];
								$ret=mysqli_query($con,"select * from admin where ID='$adminid'");
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
							?>
							  
							<div class="form-group"> 
								<label for="exampleInputPassword1">User Name</label>
							 	<input type="text" name="name" class="form-control" value="<?php  echo $row['Name'];?>" /> 
							</div>
							
							<div class="form-group"> 
								<label for="exampleInputPassword1">Email Address</label> 
								<input type="email" name="email" class="form-control" value="<?php  echo $row['Email'];?>" /> 
							</div>
							<div class="form-group">
							  	<label for="exampleInputPassword1">Contact Number</label>
							  	<input type="text" name="mobile" class="form-control" value="<?php  echo $row['Mobile'];?>">
							</div>  
							  <button type="submit" name="update" class="btn btn-default">Update</button> </form> 
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