<?php
  require_once('Config/config.php');
  include("header/header.php") 
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="blog.php">Blog <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread">Single Blog</h1>
          </div>
        </div>
      </div>
    </div>s
<!-- End Header -->
		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <?php
           if (isset($_GET['bid'])) 
            {
              
               $query = mysqli_query($con, "SELECT * FROM blog WHERE B_Id = '".$_GET['bid']."' ");
            }
            else
            {
              $query = mysqli_query($con, "SELECT * FROM blog LIMIT 1");
            }
            $row = mysqli_num_rows($query);
            $cnt=1;
            while ($row = mysqli_fetch_array($query)) 
            {
              
            
          ?>
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">#<?php echo $cnt; ?> <?php echo $row['B_Title'];?></h2>
            <p>
              <img src="<?php echo $row['B_Image'];?>" alt="" class="img-fluid">
            </p>


            <p><?php echo $row['B_Message'];?></p>

            <p>Writer: <?php echo user_name($row['U_Id'],$con);?> &nbsp;&nbsp;&nbsp; Date: <?php echo $row['B_Date'];?></p>
            <?php 
              $cnt = $cnt+1;
              } 
          ?>


          </div> <!-- .col-md-8 -->
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Blog</h3>
              <?php
               
                  $query = "SELECT * FROM blog LIMIT 5";
                
                  $query_run = mysqli_query($con, $query);
                  while($row = mysqli_fetch_array($query_run))
                  {
              ?>
              <div class="block-21 mb-4 d-flex">

                <img src="<?php echo $row['B_Image'];?>" class="blog-img mr-4">
                <div class="text">
                  <h3 class="heading"><a href="blog-single.php?bid=<?php echo $row['B_Id'];?>"><?php echo $row['B_Title'];?></a></h3>
                  <p><?php echo $row['B_Overview'];?></p>
                  <div class="meta">
                    <div><span class="icon-calendar"></span> <?php echo $row['B_Date'];?> </div>
                    <div><span class="icon-person"></span><?php echo user_name($row['U_Id'],$con);?></div>
                    
                  </div>
                </div>
              </div>
                <?php
                    }
                  
                ?>
            </div>

          </div>

        </div>
      </div>
    </section> <!-- .section -->
		
	<?php
    include("footer/footer.php")
  ?>