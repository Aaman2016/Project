<?php
	require_once('Config/config.php');
	include("header/header.php");
?>
<?php 
      
    // Import the file where we defined the connection to Database.   
     
  
    $limit = 2;  // Number of entries to show in a page. 
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
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
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Detail</span></p>
            <h1 class="mb-3 bread">Categorie Wise Projects</h1>
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
		              		if (isset($_POST['search'])) 
		              		{
		              			if (isset($_GET['st'])) 
		              			{
		              				if ($_GET['st']==0) 
		              				{
		              					$query = mysqli_query($con, "SELECT * FROM project_detail WHERE Pro_Fees LIKE '%Paid%' LIMIT $start_from, $limit ");
										
		              				}
		              				else if ($_GET['st']==1) 
		              				{
		              					$query = mysqli_query($con, "SELECT * FROM project_detail WHERE Pro_Fees LIKE '%Free%' LIMIT $start_from, $limit ");
										
		              				}
		              			}
		              			else
		              			{
		              				$cat_id = $_POST['cat'];
		              			$tital=$_POST['se'];
								$query = mysqli_query($con, "SELECT * FROM project_detail WHERE Cat_Id = '$cat_id' AND Pro_Name like '%$tital%' LIMIT $start_from, $limit");	
		              			}
		
		              		}
			              	else
			              	{
								$cat_id = $_GET['cat_id'];
								$query = mysqli_query($con, "SELECT * FROM project_detail WHERE Cat_Id = '$cat_id' LIMIT $start_from, $limit ");
							}
							$row = mysqli_num_rows($query);
							if ($row == 0) 
							{
						?>
					<div class="col-md-12 ftco-animate">
		           	 <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                
		                <center><h2 class="mr-3 text-black"><?php echo "No Project";?></h2></center>
		                
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
		                <a href="discription.php?pro_id=<?php echo $row['Pro_Id'];?>" class="btn btn-primary py-2">More</a>
		              </div>
		            </div>
		          </div><!-- end -->
					<?php 
						}
					}
					 ?>
		        </div>


		        <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		              	
		              	<?php   
		              		if (isset($_POST['search'])) 
		              		{
		              			$cat_id = $_POST['cat'];
				              	$tital=$_POST['se'];
								$query = "SELECT COUNT(*) FROM project_detail WHERE Cat_Id = '$cat_id' AND Pro_Name like '%$tital%'";
		              		}
		              		else
		              		{
		              			$cat_id = $_GET['cat_id'];
								$query = "SELECT COUNT(*) FROM project_detail WHERE Cat_Id = '$cat_id'";
								//$query = "SELECT COUNT(*) FROM project_detail";   
		              		}
					        
					        $rs_result = mysqli_query($con, $query);   
					        $row = mysqli_fetch_row($rs_result);   
					        $total_records = $row[0];   
					          
					        // Number of pages required. 
					        $total_pages = ceil($total_records / $limit);   
					        $pagLink = "";                         
					        for ($i=1; $i<=$total_pages; $i++) { 
					          if ($i==$pn) { 
					          	if (isset($_GET['st'])) {
					          		$pagLink .= "<li class='active'><a href='detail.php?page=".$i."&st=".$_GET['st']."&cat_id=".$cat_id."'>".$i."</a></li>"; 	
					          	}
					          	else
					          	{
									$pagLink .= "<li class='active'><a href='detail.php?page=".$i."&cat_id=".$cat_id."'>".$i."</a></li>";
					          	}
					              //$pagLink .= "<li class='active'><a href='detail.php?page=".$i."&cat_id=".$cat_id."'>".$i."</a></li>"; 
					          }             
					          else  {
					          	 if (isset($_GET['st']))
					          	{
					          		$pagLink .= "<li><a href='detail.php?page=".$i."&st=".$_GET['st']."&cat_id=".$cat_id."'>".$i."</a></li>"; 	
					          	}else{

					              $pagLink .= "<li ><a href='detail.php?page=".$i."&cat_id=".$cat_id."'>".$i."</a></li>";   
					          } 

					              
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
                	<li><a href="detail.php?cat_id=<?php echo $row['Cat_Id'];?>"><?php echo $row["Cat_Name"]; ?>
                		<span>
                	<?php 
        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Cat_Id = '".$row['Cat_Id']."'");
        			$resu=mysqli_fetch_array($ress);
        			$rno=$resu[0];
        			
        			echo $rno;?>
                	</span>
                	</a></li>
                
                <?php } ?>
              </div>
		        </div>

		        <div class="sidebar-box bg-white p-4 ftco-animate">
		        	<h3 class="heading-sidebar">Project Type</h3>
		        	<div class="categories">
		        		<?php

		        		?>
                		<li><a href="project.php?st=1">Free
                		<span>
		                	<?php 
		        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Pro_Fees = 'Free' ");
		        			$resu=mysqli_fetch_array($ress);
		        			$rno=$resu[0];
		        			
		        			echo ($rno);?>
                		</span>
                		</a></li>                
                		<li><a href="project.php?st=0">Paid
                		<span>
		                	<?php 
		        			$ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE Pro_Fees = 'Paid' ");
		        			$resu=mysqli_fetch_array($ress);
		        			$rno=$resu[0];
		        			
		        			echo $rno;?>
                		</span>
                		</a></li>
                	</div>
		        </div>
		      </div>
				</div>
			</div>
		</section>

		
	<?php
		include("footer/footer.php")
	?>