<?php
	require_once('Config/config.php');
	include("header/header.php")
?>
<?php 
      
	// Import the file where we defined the connection to Database.   


	$limit = 5;  // Number of entries to show in a page. 
	// Look for a GET variable page if not found default is 1.      
	if (isset($_GET["page"])) 
	{  
		$pn  = $_GET["page"];  
	}  
	else 
	{  
		$pn=1;  	
	};   

	$start_from = ($pn-1) * $limit;   

	//$query = "SELECT * FROM project_detail LIMIT $start_from, $limit";   
	//$rs_result = mysqli_query ($con, $query);  

?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Software</span></p>
            <h1 class="mb-3 bread">All Software</h1>
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
						
							$query = mysqli_query($con, "SELECT * FROM software LIMIT $start_from, $limit");
							$row = mysqli_num_rows($query);
	
						while ($row = mysqli_fetch_array($query)) {
						
					?>
					<div class="col-md-12 ftco-animate">
		            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
		                	<span class="subadge"><?php echo $row['S_Name'];?></span>
		                  <h2 class="mr-3 text-black"><a href="#"><?php echo $row['S_Name']?></a></h2>
		                </div>
		               </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
		                <a href="software_discription.php?soft_id=<?php echo $row['S_Id'];?>" class="btn btn-primary py-2">More</a>
		              </div>
		            </div>
		          </div><!-- end -->
					<?php } ?>
		        </div>
		        <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                
		                <?php   
							$query = "SELECT COUNT(*) FROM software";
					        $rs_result = mysqli_query($con, $query);   
					        $row = mysqli_fetch_row($rs_result);   
					        $total_records = $row[0];   
					          
					        // Number of pages required. 
					        $total_pages = ceil($total_records / $limit);   
					        $pagLink = "";                         
					        for ($i=1; $i<=$total_pages; $i++) { 
					          if ($i==$pn) { 
					          	
					          	
									$pagLink .= "<li class='active'><a href='software.php?page=".$i."'>".$i."</a></li>";   					          		
					          	
					          }             
					          else  {
					          	 
					              $pagLink .= "<li ><a href='software.php?page=".$i."'>".$i."</a></li>";   
					          }
					           
					        };   
					        echo $pagLink;   
					    ?>
		                
		                
		              </ul>
		            </div>
		          </div>
		        </div>
		      </div>
		      <div class="col-lg-3 sidebar">
		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<div class="categories">
                <h3 class="heading-3">Categories</h3>
                <?php
                	$query = mysqli_query($con, "SELECT * From categories");
					$row = mysqli_num_rows($query);
					while($row = mysqli_fetch_array($query))
					{
						//echo "<li><a href='detail.php?cat_id=".$cat_id."'>".$row['Cat_Name']."</a></li>";
                ?>
                	<li><a href="detail.php?cat_id=<?php echo $row['Cat_Id'];?>"><?php echo $row["Cat_Name"]; ?><span>
                	<?php 
        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Cat_Id = '".$row['Cat_Id']."'");
        			$resu=mysqli_fetch_array($ress);
        			$rno=$resu[0];
        			
        			echo $rno;?>
                	</span></a></li>
                
                <?php } ?>
              </div>
		        </div>

		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Project Type</h3>
		        	<div class="categories">

                		<li><a href="project.php?st=1">Free Projects<span>
		                	<?php 
		        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Pro_Fees = 'Free' ");
		        			$resu=mysqli_fetch_array($ress);
		        			$rno=$resu[0];
		        			
		        			echo ($rno);?>
                		</span></a></li>                
                		<li><a href="project.php?st=0">Paid Projects<span>
		                	<?php 
		        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Pro_Fees = 'Paid' ");
		        			$resu=mysqli_fetch_array($ress);
		        			$rno=$resu[0];
		        			
		        			echo $rno;?>
                		</span></a></li>
                	</div>
		        </div>
		      </div>
				</div>
			</div>
		</section>

		
	<?php
		include("footer/footer.php")
	?>