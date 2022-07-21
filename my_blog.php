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
            <h1 class="mb-3 bread">My Blog</h1>
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
						$bid = $_SESSION['Id'];
						$query = mysqli_query($con, "SELECT * FROM blog WHERE U_Id = '$bid' ");
						$row = mysqli_num_rows($query);
						if ($row == 0) 
						{
							?>
					<div class="col-md-12 ftco-animate">
		           	 <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                
		                <center><h2 class="mr-3 text-black"><?php echo "No Blog Avilable";?></h2></center>
		                
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
		                	
		                  <h2 class="mr-3 text-black"><a href="#"><?php echo $row['B_Title'];?></a></h2>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                  <div class="mr-3"><span class="icon-calendar"></span> <a href="#"><?php echo $row['B_Date'];?></a></div>
		                  <div><span class="icon-person"></span> <span><?php echo user_name($row['U_Id'],$con);?></span></div>
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		                <a href="blog_discription.php?bid=<?php echo $row['B_Id'];?>" class="btn btn-primary py-2">More</a>
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