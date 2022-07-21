<?php
  require_once("Config/config.php");
  include("header/header.php") 
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="my_account.php">My Account </a></p>
            <h1 class="mb-3 bread">My Acount</h1>
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
                if(isset($_GET['pid']))
                {

                  $query = "SELECT * FROM project_detail WHERE Pro_Id = '".$_GET['pid']."'";
                }
                else
                {
                   $query = "SELECT * FROM project_detail WHERE U_Id = $_SESSION[Id] LIMIT 1";
                }
                $query_run = mysqli_query($con, $query);
                $cnt=1;
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <h2 class="mb-3" style="color: red;font-size: 35px;" ><?php echo $cnt; ?>. Project Title: <?php echo $row["Pro_Name"]; ?> </h2>
            <h3 class="mb-3" style="font-size: 25px;">Framework: <?php echo cat_nm_fun($row["Cat_Id"],$con);  ?> <?php echo $row["Pro_Type"]; ?> </h3>
            <p>
              <img src="<?php echo $row["Index_Image"]; ?>" alt="" class="img-fluid">
            </p>
            <h4>Overview of The Project:</h4>
            <p><?php echo $row["Overview"]; ?></p>
            
            <h4>How To Run:</h4>
            <p><?php echo $row["How_To_Run"]; ?></p>
            
            <h4>Free / Paid:</h4>
            <p><?php echo $row["Pro_Fees"]; ?></p>
            <?php
              if($row["Pro_Price"] > 0)
              {
            ?>
              <h4>Price:</h4>
              <p><?php echo $row["Pro_Price"]; ?></p>
            <?php
            }
            else
            {
            ?>
              
            <?php } ?>

            <h4>Details:</h4>
            <p><?php echo $row["Details"]; ?></p>
            <?php
              if ($row['Pro_Fees'] == 'Free') 
              {
              
            ?>
            <h4>Download Link:</h4>
            <a href="<?php echo $row['File_Upload'];?>" class="btn btn-primary py-2">Download</a>
            <br><br>
          <?php 
            }
            else
            { 
            ?>
            <h4>Download Link:</h4>
            <h5>This is Paid Project. So it's File is Not Upload..</h5>
            <br><br><br>
          <?php }?>
          <h4>Update & Delete:</h4>
            <a href="edit_project.php?editid=<?php echo $row['Pro_Id'];?>" class="btn btn-primary py-2">Edit</a>
            <a href="delete_project.php?delid=<?php echo $row['Pro_Id'];?>" class="btn btn-primary py-2">Delete</a>
            <br><br>
            <?php
            $cnt = $cnt+1;
              }
             
            ?><div class="pt-5 mt-5">
              <h3 class="mb-5">Comments</h3>
              <ul class="comment-list">
              	<?php
              		$pid = $_GET['pid'];
	                $query = "SELECT * FROM pro_review WHERE Pro_Id = '$pid' ORDER BY Date DESC LIMIT 2";
	                $query_run = mysqli_query($con, $query);
	                while ($row = mysqli_fetch_array($query_run)) 
	                {
              	?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $row['Name'];?></h3>
                    <div class="meta"><?php echo $row['Date'];?></div>
                    <h3><?php echo $row['Subject'];?></h3>
                    <p><?php echo $row['Message'];?></p>
                  </div>
                </li>
            <?php }?>
              </ul>
              <!-- END comment-list -->
              
              
            </div>
            
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">
            
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3 class="heading-3">My Account</h3>
                <li><a href="change_password.php">Change Your Password</a></li>
                
                <li><a href="my_profile.php?uid=<?php echo $_SESSION['Id'];?>">My Profile </a></li>
                <li><a href="my_project.php">My Projects<span>
                  <?php
                  $ress=mysqli_query($con,"SELECT COUNT(*) FROM `project_detail` WHERE U_Id = '".$_SESSION['Id']."'");
                  $resu=mysqli_fetch_array($ress);
                  $rno=$resu[0];
                  echo $rno;
                ?>

                </span>
                </a></li>
                <li><a href="my_blog.php">My Blog<span>
                  <?php
                  $ress=mysqli_query($con,"SELECT COUNT(*) FROM `blog` WHERE U_Id = '".$_SESSION['Id']."'");
                  $resu=mysqli_fetch_array($ress);
                  $bno=$resu[0];
                  echo $bno;
                ?>
                </span></a></li>
                
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Projects</h3>
              <?php
                  $query = "SELECT * FROM project_detail WHERE U_Id = $_SESSION[Id] ORDER BY Pro_Date DESC LIMIT 3";
                  $query_run = mysqli_query($con, $query);
                
                  while($row = mysqli_fetch_array($query_run))
                  {
                ?>
              <div class="block-21 mb-4 d-flex">
                <img src="<?php echo $row["Index_Image"]; ?>" class="blog-img mr-4" />
                <div class="text">
                  <h3 class="heading"><a href="my_account.php?pid=<?php echo $row['Pro_Id'] ?>"><?php echo $row["Pro_Name"]; ?></a></h3><br>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $row["Pro_Date"]; ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo $row["Developer_Name"]; ?></a></div>
                    
                  </div>
                </div>
              </div>
              <?php } ?>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Blog</h3>
              <?php
                  $query = "SELECT * FROM blog WHERE U_Id = $_SESSION[Id] ORDER BY B_Date DESC LIMIT 3";
                  $query_run = mysqli_query($con, $query);
                
                  while($row = mysqli_fetch_array($query_run))
                  {
                ?>
              <div class="block-21 mb-4 d-flex">
                <img src="<?php echo $row["B_Image"]; ?>" class="blog-img mr-4" />
                <div class="text">
                  <h3 class="heading"><a href="blog_discription.php?bid=<?php echo $row['B_Id'];?>"><?php echo $row["B_Title"]; ?></a></h3><br>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $row["B_Date"]; ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo user_name($row['U_Id'],$con); ?></a></div>
                    
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
		
	<?php
    include("footer/footer.php")
  ?>