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

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Contact Us</title>

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
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
				<div class="tables">
					<h3 class="title1">Contact US</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Contact US:</h4>
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>No.</th> 
									<th>Name</th> 
									<th>Email</th>
									<th>Mobile No.</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Date & Time</th>
									<th>Edit</th>
								</tr> 
							</thead> 
							<tbody>
								<?php
									$query = "SELECT * FROM contact_us";
									$ret=mysqli_query($con, $query);
									$cnt=1;
									while ($row=mysqli_fetch_array($ret)) {
								?>

						 	<tr> 
						 		<th scope="row"><?php echo $cnt;?></th> 
						 		<td><?php  echo $row['Cont_Name'];?></td>
						 		<td><?php  echo $row['Cont_Email'];?></td>
						 		<td><?php  echo $row['Cont_Mobile'];?></td>
						 		<td><?php  echo $row['Cont_Subject'];?></td>
						 		<td><?php  echo $row['Cont_Message'];?></td>
						 		<td><?php  echo $row['Cont_Date'];?></td> 
						 		<td><a href="contact_delete.php?delid=<?php echo $row['Cont_Id'];?>">Delete</a></td> </tr> 
						 		<?php 
									$cnt=$cnt+1;
								}
								?>
							</tbody> 
						</table> 
					</div>
				</div>
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
<?php } ?>