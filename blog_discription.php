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
            <h1 class="mb-3 bread">My Blog Discription</h1>
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
                $bid = $_GET['bid'];
                $query = "SELECT * FROM blog WHERE B_Id = '$bid' ";
                $query_run = mysqli_query($con, $query);
                $cnt=1;
                while($row = mysqli_fetch_array($query_run))
                {
            ?>
            <h2 class="mb-3" style="color: red;font-size: 35px;" ><?php echo $cnt; ?>. Blog Title: <?php echo $row["B_Title"]; ?> </h2>
            <h3 class="mb-3" style="font-size: 25px;">Writer: <?php echo user_name($row['U_Id'],$con);  ?></h3>
            <p>
              <img src="<?php echo $row["B_Image"]; ?>" alt="" class="img-fluid">
            </p>
            <h4>Overview of The Blog:</h4>
            <p><?php echo $row["B_Overview"]; ?></p>
            
            <h4>Message:</h4>
            <p><?php echo $row["B_Message"]; ?></p>
            
            <h4>Date of Upload:</h4>
            <p class="icon-calendar"> <?php echo $row["B_Date"]; ?></p>

            
            <br><br>
            <a href="edit_blog.php?bid=<?php echo $row['B_Id'];?>" class="btn btn-primary py-2">Edit</a>
            <a href="delete_blog.php?bid=<?php echo $row['B_Id'];?>" class="btn btn-primary py-2">Delete</a>
            <br><br>
            <?php
            $cnt = $cnt+1;
              }
             
            ?>
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
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
                    <div><span class="icon-calendar"></span> <?php echo $row["Pro_Date"]; ?></div>
                    <div><span class="icon-person"></span> <?php echo $row["Developer_Name"]; ?></div>
                    
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
                  <h3 class="heading"><a href=""><?php echo $row["B_Title"]; ?></a></h3><br>
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