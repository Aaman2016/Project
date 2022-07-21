<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Project Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
		 
		 window.setTimeout(function() {
			 $("#success-alert").fadeTo(1000, 0).slideUp(1000, function(){
				 $(this).remove(); 
			 });
		 }, 3000);
		 });
	</script>
  </head>
  <body>
  	
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.php">Project Hub</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <?php
				if (isset($_SESSION['Id'])) 
				{ 
			?>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="project.php" class="nav-link">Project</a></li>
				<li class="nav-item"><a href="software.php" class="nav-link">Software</a></li>
				<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
				<li class="nav-item"><a href="about.php" class="nav-link">About US</a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact US</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>	
				<li class="nav-item"><a href=""  class="nav-link"><?php echo "Hi, ". $_SESSION['UserName']; ?></a></li>
				<li class="nav-item cta mr-md-1"><a href="post_project.php" class="nav-link">Post a Project</a></li>
				<li class="nav-item cta cta-colored"><a href="my_account.php" class="nav-link"><u>My Account</u></a></li>
	        </ul>
	      </div>
			<?php  
				}
				else 
				{ 
			?>


	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="project.php" class="nav-link">Project</a></li>
	          <li class="nav-item"><a href="software.php" class="nav-link">Software</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About US</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact US</a></li>
	          <li class="nav-item"><a href="login.php" class="nav-link">Log in/Sign Up</a></li>
			  <li class="nav-item cta mr-md-1"><a href="login.php" class="nav-link">Post a Project</a></li>
	        </ul>
	      </div>
			<?php
				}
			?>
	    </div>
	  </nav>
	  
    <!-- END nav -->
    