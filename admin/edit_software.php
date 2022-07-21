<?php
session_start();
error_reporting(0);
require_once('../Config/config.php');
if (strlen($_SESSION['PID']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $s_name = $_POST['s_name'];
    $s_details = $_POST['s_details'];
    $datetime = date("d-m-Y h-i-s A");
    $file_path = "software/";
    $file_upload= $file_path.$datetime." ".basename($_FILES['file_upload']['name']);

    move_uploaded_file($_FILES["file_upload"]["tmp_name"], "software/".$datetime." ".$_FILES['file_upload']['name']);
   
 	$eid=$_GET['editid'];
    $query = "UPDATE software SET S_Name='$s_name', S_Details ='$s_details', S_File = '$file_upload' WHERE S_Id='$eid' "; 
    $query_run=mysqli_query($con, $query);
    if ($query_run) {
    	echo "<script>alert('Software Update Sucessfully...');</script>";
    	echo "<script>window.location.href = 'manage_software.php'</script>"; 
  }
  else
    {
    	echo "<script>alert('Something Went Wrong. Please Try Again.');</script>"; 
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
					<h3 class="title1">Update Software</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Software:</h4>
						</div>
						<div class="form-body">
							<form method="POST" enctype="multipart/form-data">
  							<?php
 								$cid=$_GET['editid'];
								$query = "SELECT * FROM  software WHERE S_Id='$cid'";
								$ret=mysqli_query($con, $query);
								$cnt=1;
								while ($row=mysqli_fetch_array($ret)) {
							?> 
  
							 <div class="form-group"> 
							 	<label for="exampleInputEmail1">Software Name</label> 
							 	<input type="text" class="form-control" id="sername" name="s_name" placeholder="Software Name" value="<?php  echo $row['S_Name'];?>" required="true"> 
							 </div> 
							 <div class="form-group"> 
							 	<label for="exampleInputEmail1">Software Details</label> 
							 	<textarea class="form-control" name="s_details" placeholder="Software Details" required="true"><?php  echo $row['S_Details'];?></textarea>
							 </div>						
							 <div class="form-group"> 
							 	<label for="exampleInputEmail1">Upload .exe File</label> 
							 	<input type="file" class="form-control" name="file_upload" value="<?php  echo $row['S_file'];?>"> 
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