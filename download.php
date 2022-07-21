<?php
  require_once("Config/config.php");
  include("header/header.php") 
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3">Project </p>
            <h1 class="mb-3 bread">Project Details</h1>
          </div>
        </div>
      </div>
    </div>s
<!-- End Header -->
		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<form method="POST">
          <div class="col-md-8 ftco-animate">
            <?php
                $pro_id = $_GET['pro_id'];
               
                $query = "SELECT * FROM project_detail WHERE Pro_Id = '$pro_id' ";
                $query_run = mysqli_query($con, $query);
                $cnt=1;
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <h2 class="mb-3" style="color: red;font-size: 35px;" ><?php echo $cnt; ?>. Project Title: <?php echo $row["Pro_Name"]; ?> </h2>
            <h3 class="mb-3" style="font-size: 25px;">Framework: <?php echo cat_nm_fun($row['Cat_Id'],$con); ?> <?php echo $row["Pro_Type"]; ?> </h3>
            <p>
              <img src="<?php echo $row["Index_Image"]; ?>" alt="" class="img-fluid">
            </p>
            
            <h4>Free / Paid:</h4>
            <p><?php echo $row["Pro_Fees"]; ?></p>

            <h4>Price:</h4>
            <p><?php echo $row["Pro_Price"]; ?></p>

            <h4>Details:</h4>
            <p><?php echo $row["Details"]; ?></p>
            <h4>Download File:</h4>

       		<a href="" class="nav-link"><input type="submit" name="download" value="Download" class="btn btn-primary py-2"></a>
            
            
            <?php
            $cnt = $cnt+1;
              }
              
            ?>
          </div> <!-- .col-md-8 -->
          </form>
      </div>
    </section> <!-- .section -->
		<?php
			if (!isset($_SESSION['Id'])) 
			{
				echo "<script>alert('Please Login...!!');</script>";
			}
			else
			{
				echo "<script>alert('Download');</script>";
			}
		?>
	<?php
    include("footer/footer.php")
  ?>