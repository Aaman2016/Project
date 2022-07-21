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
    
    <div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay"></div>
      <div class="container">
      	<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        <div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text text-center pt-5 mt-md-5">
	        		<p class="mb-4">Find Your Projects</p>
	            <h1 class="mb-5">The Eassiest Way to Get Your New Project</h1>
							<div class="ftco-counter ftco-no-pt ftco-no-pb">
			        	<div class="row">
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-project-management"></span>
				              	</div>
				              	<div class="desc text-left">
				              		<?php 
										$query = "SELECT * FROM project_detail";
										$query2=mysqli_query($con,$query);
										$totalproject=mysqli_num_rows($query2);
									?>
					                <strong class="number" data-number="<?php echo $totalproject?>"></strong>
					                <span>Total Projects</span>
				                </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-visitor"></span>
				              	</div>
				              	<div class="desc text-left">
				              		<?php 
										$query = "SELECT * FROM user_master";
										$query2=mysqli_query($con,$query);
										$totaluser=mysqli_num_rows($query2);
									?>
					                <strong class="number" data-number="<?php echo $totaluser?>"></strong>
					                <span>Active Users</span>
					              </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-resume"></span>
				              	</div>
				              	<div class="desc text-left">
				              		<?php 
										$query = "SELECT * FROM categories";
										$query2=mysqli_query($con,$query);
										$totalcategories=mysqli_num_rows($query2);
									?>
					                <strong class="number" data-number="<?php echo $totalcategories?>"></strong>
					                <span>Categories</span>
					              </div>
				              </div>
				            </div>
				          </div>
				        </div>
			        </div>
							<div class="ftco-search my-md-5">
								<div class="row">
			            <div class="col-md-12 nav-link-wrap">
				            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Project</a>

				              

				            </div>
				          </div>
				          <div class="col-md-12 tab-wrap">
				            
				            <div class="tab-content p-4" id="v-pills-tabContent">

				              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
				              	<form class="search-job" action="detail.php" method="POST" enctype="multipart/form-data">
				              		<div class="row no-gutters">
				              			<div class="col-md mr-md-2">
				              				<div class="form-group">
											
				              					<div class="form-field">
					              				<div class="select-wrap">
							                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
							                      <select name="cat" id="cat" class="form-control">
							                      	<option value="">Category</option>
													<?php
														$query = mysqli_query($con, "SELECT * From categories");
														$row = mysqli_num_rows($con, $query);
														while($row = mysqli_fetch_array($query))
														{
															echo "<option value='".$row['Cat_Id']."'>".$row['Cat_Name']."</option>";
														}
													?>
							                      </select>
							                    </div>
									            </div>
								            </div>
				              			</div>
				              			<div class="col-md mr-md-2">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="icon"><span class="icon-search"></span></div>
									                <input type="text" class="form-control" placeholder="Search" name="se">
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
												<input type= "submit" name="search" class="form-control btn btn-primary" value="Search" />
								                	
									              </div>
								              </div>
				              			</div>
				              		</div>
				              	</form>
				              </div>

				              
				            </div>
				          </div>
				        </div>
			        </div>
	          </div>
	        </div>
	    	</div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="category-wrap">
    					<div class="row no-gutters">
    						<div class="col-md-2">
    							<div class="top-category text-center no-border-left">
    								<h3>Step-1:</h3><br>
    								<h3><a href="login.php">Login &amp; Register</a></h3>
    								
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3>Step-2:</h3><br>
    								<h3><a href="post_project.php">Post Project</a></h3>
    								<h3><a href="post_blog.php">Post Artical</a></h3>
    								
  
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3>Step-3: </h3><br>
    								<h3><a href="">Find Projects</a></h3>
    								
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3>Step-4:</h3><br>
    								<h3><a href="project.php">Download Project</a></h3>
    								
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3>Step-5:</h3><br>
    								<h3><a href="software.php">Download Software</a></h3>
    								
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<br>
    								<h3><a>Thank You For</a></h3>
    								<h3>Visit Our Website</h3>
    								
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>