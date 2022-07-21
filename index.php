<?php
	require_once('Config/config.php');
	include("header/index_header.php");
?>
<!-- Header End -->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Categories</span>
            <h2 class="mb-0">Top Categories</h2>
          </div>
        </div>
        <div class="row">
        	<?php 
        		$query = mysqli_query($con, "SELECT * FROM categories");
        		$row = mysqli_num_rows($query);

        		while ($row = mysqli_fetch_array($query)) {
        			
        		
        	?>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">

        			<li><a href="detail.php?cat_id=<?php echo $row['Cat_Id'];?>"><?php echo $row['Cat_Name'];?> <br><span>Total Projects:</span> <span class="number"><?php 
        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Cat_Id = '".$row['Cat_Id']."'");
        			$resu=mysqli_fetch_array($ress);
        			$rno=$resu[0];
        			echo $rno;?></span> <i class="ion-ios-arrow-forward"></i></a>
        			</li>
        		</ul>
        	</div>
        <?php } ?>
        	
       </div>
    	</div>
    </section>

    <section class="ftco-section services-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Projects</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-team"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Projects</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-career"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employees"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 pr-lg-5">
						<div class="row justify-content-center pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Recently Added Projects</span>
		            <h2 class="mb-4">Featured Project Posts For This Week</h2>
		          </div>
		        </div>
				<div class="row">
					<?php
					$query = mysqli_query($con, "SELECT * FROM project_detail LIMIT 10");
					$row = mysqli_num_rows($query);
					while ($row = mysqli_fetch_array($query)) {
						
					?>
					<div class="col-md-12 ftco-animate">
						<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
		                	<span class="subadge"></span>
		                  <h2 class="mr-3 text-black"><?php echo $row['Pro_Name'];?></h2>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                  <div class="mr-3"><span class="icon-layers"></span> <?php echo $row['Pro_Type'];?></div>
		                  <div><span class="icon-my_location"></span> <span><?php echo $row['Overview'];?></span></div>
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		              	
		                <a href="discription.php?pro_id=<?php echo $row['Pro_Id'];?>" class="btn btn-primary py-2">Read More</a>
		              </div>
		            </div>
		        
		          </div><!-- end -->
		          <?php
		          
		      }
		          ?>
		          
		       </div>
		      </div>
		      <div class="col-lg-3 sidebar">
		        <div class="row justify-content-center pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">Top Projects</h2>
		          </div>
		        </div>
		        <div class="sidebar-box ftco-animate">
		        	<div class="">
			        	<a href="#" class="company-wrap"><img src="images/php.png" class="img-fluid" alt="Colorlib Free Template"></a>
			        	<div class="text p-3">
			        		<h3>PHP</h3>
			        		
			        	</div>
		        	</div>
		        </div>
		        <div class="sidebar-box ftco-animate">
		        	<div class="">
			        	<a href="#" class="company-wrap"><img src="images/java.png" class="img-fluid" alt="Colorlib Free Template"></a>
			        	<div class="text p-3">
			        		<h3>Java</h3>
			        		
			        	</div>
			        </div>
		        </div>
		        <div class="sidebar-box ftco-animate">
		        	<div class="">
			        	<a href="#" class="company-wrap"><img src="images/python.png" class="img-fluid" alt="Colorlib Free Template"></a>
			        	<div class="text p-3">
			        		<h3>Python</h3>
			        		
			        	</div>
			        </div>
		        </div>
		        <div class="sidebar-box ftco-animate">
		        	<div class="">
			        	<a href="#" class="company-wrap"><img src="images/android.png" class="img-fluid" alt="Colorlib Free Template"></a>
			        	<div class="text p-3">
			        		<h3>Android</h3>
			        		
			        	</div>
			        </div>
		        </div>
		      </div>
				</div>
			</div>
		</section>





    <section class="ftco-section ftco-candidates bg-primary">
    	<div class="container">
    		<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
          	<span class="subheading">Projects</span>
            <h2 class="mb-4">Latest Projects</h2>
          </div>
        </div>
    	</div>
    	<div class="container">
        <div class="row">
        	
        	<div class="col-md-12 ftco-animate">
        		<div class="carousel-candidates owl-carousel">
        			<?php
        			$query = mysqli_query($con, "SELECT * FROM project_detail ORDER BY Pro_Date DESC LIMIT 6");
					$row = mysqli_num_rows($query);
					while ($row = mysqli_fetch_array($query)) {
        		?>
        			<div class="item">
		        		<a href="discription.php?pro_id=<?php echo $row['Pro_Id'];?>" class="team text-center">	
		        				<img src="<?php echo $row["Index_Image"]; ?>" class="img">
		        			<h2><?php echo $row['Pro_Name']?></h2>
		        			<span class="position"><?php echo $row['Pro_Type']?></span>
		        		</a>
        			</div>
        			
	        	<?php } ?>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Blog</span>
            <h2><span>Recent</span> Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <?php
            $query = mysqli_query($con, "SELECT * FROM blog ORDER BY B_Date DESC LIMIT 4");
            $row = mysqli_num_rows($query);
            while ($row = mysqli_fetch_array($query)) {
          ?>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.php?bid=<?php echo $row['B_Id'];?>"><img src="<?php echo $row["B_Image"]; ?>" class="block-20"></a>
              <div class="text mt-3">
              	<h3 class="heading">Title: <?php echo $row['B_Title'];?></h3>
                <h5><?php echo $row['B_Overview'];?></h5>
                <div class="meta mb-2">
                  <div><?php echo $row['B_Date'];?></div>
                  <div>Writer: <?php echo user_name($row['U_Id'],$con);?></div>
                  
                </div>
                
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </section>
	<!-- Footer -->	
	<?php
		include("footer/footer.php")
	?>