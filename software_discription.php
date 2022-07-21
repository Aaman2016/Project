<?php
  require_once("Config/config.php");
  include("header/header.php") 
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3">Software </p>
            <h1 class="mb-3 bread">Software Details</h1>
          </div>
        </div>
      </div>
    </div>s
<!-- End Header -->
		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <?php
                $soft_id = $_GET['soft_id'];
               
                $query = "SELECT * FROM software WHERE S_Id = '$soft_id' ";
                $query_run = mysqli_query($con, $query);
                $cnt=1;
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <h2 class="mb-3" style="color: red;font-size: 35px;" ><?php echo $cnt; ?>. Software Name: <?php echo $row["S_Name"]; ?> </h2>
            
            
            <h4>Software Discription:</h4>
            <p><?php echo $row["S_Details"]; ?></p>
            
           
            <h4>Download Link:</h4>
            
              <a href="admin/<?php echo $row['S_File'];?>" class="btn btn-primary py-2">Download</a>
              
            <?php
            $cnt = $cnt+1;
              }
              
            ?>
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Software</h3>
              <?php
                  $query = "SELECT * FROM software ORDER BY Date_Time DESC LIMIT 6";
                  $query_run = mysqli_query($con, $query);
                
                  while($row = mysqli_fetch_array($query_run))
                  {
                ?>
              <div class="block-21 mb-4 d-flex">
                
                <div class="text">
                  <h3 class="heading"><a href="software_discription.php?soft_id=<?php echo $row['S_Id'];?>"><?php echo $row["S_Name"]; ?></a></h3><br>
                  
                </div>
              </div>
              <?php } ?>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
		
	<?php
    include("footer/footer.php")
  ?>