<?php
session_start();
error_reporting(0);
require_once('../Config/config.php');
if (strlen($_SESSION['PID']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $cat_name=$_POST['cat_name'];
   
 	$eid=$_GET['editid'];
    $query = "UPDATE categories SET Cat_Name='$cat_name' WHERE Cat_Id='$eid' "; 
    $query_run=mysqli_query($con, $query);
    if ($query_run) {
    	echo "<script>alert('Categorie has been UPDATED.');</script>";
    	echo "<script>window.location.href = 'manage_categories.php'</script>"; 
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
<title>Update Categories</title>

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
					<h3 class="title1">Update Categories</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Categories:</h4>
						</div>
						<div class="form-body">
							<form method="POST">
  							<?php
 								$cid=$_GET['editid'];
								$query = "SELECT * FROM  categories WHERE Cat_Id='$cid'";
								$ret=mysqli_query($con, $query);
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
							?> 
  
							 <div class="form-group"> 
							 	<label for="exampleInputEmail1">Categories Name</label> 
							 	<input type="text" class="form-control" id="sername" name="cat_name" placeholder="Categorie Name" value="<?php  echo $row['Cat_Name'];?>" required="true"> 
							 </div> 							 
							 <?php } ?>
							<button type="submit" name="submit" class="btn btn-default">Update</button> 
						</form> 
						</div>
						
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