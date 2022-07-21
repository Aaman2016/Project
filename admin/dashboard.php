<?php
session_start();
error_reporting(0);
require_once('../Config/config.php');
if (strlen($_SESSION['PID']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Dashboard</title>

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
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
<div class="main-content">
		
		 <?php include_once('includes/sidebar.php');?>
		
	<?php include_once('includes/header.php');?>
		<!-- main content start-->
		<div id="page-wrapper" class="row calender widget-shadow">
			<div class="main-page">
				
			
				<div class="row calender widget-shadow">
					<div class="row-one">
					<div class="col-md-4 widget">
						<?php
							$query = "SELECT * FROM user_master";
							$query1=mysqli_query($con, $query);
							$totaluser=mysqli_num_rows($query1);
						?>
						<div class="stats-left ">
							<h5>Total</h5>
							<h4>Customer</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totaluser;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<?php 
							$query = "SELECT * FROM categories";
							$query2=mysqli_query($con,$query);
							$totalcategories=mysqli_num_rows($query2);
						?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Categories</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalcategories;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<?php 
							$query = "SELECT * FROM project_detail";
							$query2=mysqli_query($con,$query);
							$totalprojects=mysqli_num_rows($query2);
						?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Projects</h4>
						</div>
						<div class="stats-right">
							<label><?php echo $totalprojects;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>

				<div class="row calender widget-shadow">
					<div class="row-one">
					<div class="col-md-4 widget">
						<?php 
							$query = "SELECT * FROM project_detail WHERE Pro_Fees = 'Free'";
							$query2=mysqli_query($con,$query);
							$totalfreeprojects=mysqli_num_rows($query2);
						?>
						<div class="stats-left ">
							<h5>Total</h5>
							<h4>Free Projects</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalfreeprojects;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<?php 
							$query = "SELECT * FROM project_detail WHERE Pro_Fees = 'Paid'";
							$query2=mysqli_query($con,$query);
							$totalpaidprojects=mysqli_num_rows($query2);
						?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Paid Projects</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalpaidprojects;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<?php
							$query = "SELECT * FROM blog ";
							$query2=mysqli_query($con,$query);
							$totalblog=mysqli_num_rows($query2);
					 	?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Blogs</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalblog;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>

				<div class="row calender widget-shadow">
					<div class="row-one">
					<div class="col-md-4 widget">
						<?php
							$query = "SELECT * FROM software ";
							$query2=mysqli_query($con,$query);
							$totalsoftware=mysqli_num_rows($query2);
						 ?>
						<div class="stats-left ">
							<h5>Total</h5>
							<h4>Software</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totalsoftware;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-mdl">
						<?php
							$query = "SELECT * FROM admin ";
							$query2=mysqli_query($con,$query);
							$totaladmin=mysqli_num_rows($query2);
 						?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Admin</h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $totaladmin;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="col-md-4 widget states-last">
						<?php
							$query = "SELECT * FROM subscribe";
							$query2=mysqli_query($con,$query);
							$totalsubscribe=mysqli_num_rows($query2);
						?>
						<div class="stats-left">
							<h5>Total</h5>
							<h4>Subscribe</h4>
						</div>
						<div class="stats-right">
							<label><?php echo $totalsubscribe;?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
					<div class="clearfix"> </div>	
				</div>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		<?php include_once('includes/footer.php');?>
        <!--//footer-->
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