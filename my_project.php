<?php
	require_once('Config/config.php');
	include("header/header.php")
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="my_account.php">My Account </a></p>
            <h1 class="mb-3 bread">My Projects</h1>
          </div>
        </div>
      </div>
    </div>
<!-- Header End -->
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 pr-lg-4">
		        <div class="row">
					<?php
						$pid = $_SESSION['Id'];
						$query = mysqli_query($con, "SELECT * FROM project_detail WHERE U_Id = '$pid' ");
						$row = mysqli_num_rows($query);
						if ($row == 0) 
						{
							?>
					<div class="col-md-12 ftco-animate">
		           	 <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                
		                <center><h2 class="mr-3 text-black"><?php echo "No Project Avilable";?></h2></center>
		                
		              </div>
		            </div>
		          </div>
		          <?php
						}
						else
						{
						while ($row = mysqli_fetch_array($query)) {
						
					?>
					<div class="col-md-12 ftco-animate">
		            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
		                	<span class="subadge"><?php echo cat_nm_fun($row['Cat_Id'],$con);?></span>
		                  <h2 class="mr-3 text-black"><a href="#"><?php echo $row['Pro_Name']?></a></h2>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                  <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $row['Pro_Type']?></a></div>
		                  <div><span class="icon-my_location"></span> <span><?php echo $row['Overview']?></span></div>
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		                <a href="my_account.php?pid=<?php echo $row['Pro_Id'];?>" class="btn btn-primary py-2">More</a>
		              </div>
		            </div>
		          </div><!-- end -->
					<?php 
						}
					}
					 ?>
		        </div>


		      </div>
		      
			</div>
		</section>

		
	<?php
		include("footer/footer.php")
	?>