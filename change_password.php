<?php
  //session_start();
  require_once('Config/config.php');
  include("header/header.php");
?>
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#cpassword").blur(function(){
        var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    if (password != cpassword) 
    {
          alert("PASSWORD DO NOT MATCH");
      $("#password").focus();
        }
  });
});
</script>
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="my_account.php">My Account </a></p>
            <h1 class="mb-3 bread">Change Password</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
			     <form class="p-5 bg-white" method="POST" enctype="multipart/form-data">
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Current Password</label>
                  <input type="password" name="current_password" class="form-control" placeholder="Current Password" required="Current Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">New Password</label>
                  <input type="password" name="password" class="form-control" placeholder="New Password" required="New Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="Confirm Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Change" name="change" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
            <?php
                if(isset($_POST['change']))
                {
                  $userid=$_SESSION['Id'];
                  $current_password=($_POST['current_password']);
                  $password=($_POST['password']);
                  $cpassword = ($_POST['cpassword']);
                  $query = "SELECT ID FROM admin WHERE Id='$userid' AND Password='$current_password'";
                  $query_run=mysqli_query($con, $query);
                  $row=mysqli_fetch_array($query_run);
                  if($row>0)
                  {
                    $query = "UPDATE user_master SET Password='$password' WHERE Id = '$userid' ";
                    $ret=mysqli_query($con, $query);
                    echo "<script>alert('Your Password Successully Changed.');</script>"; 
                      echo "<script>window.location.href = 'my_account.php'</script>";   
                  } 
                  else 
                  {
                    echo "<script>alert('Your Current Password is Wrong.');</script>"; 
                  }
                }  
            ?>
          </div>

          <div class="col-md-4 pl-md-5 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3 class="heading-3">My Account</h3>
                <li><a href="change_password.php">Change Your Password</a></li>
                <li><a href="my_profile.php?uid=<?php echo $_SESSION['Id'];?>">My Profile</a></li>
                <li><a href="#">My Blog</a></li>
                <li><a href="#">Office Admin <span>(42)</span></a></li>
                <li><a href="#">Web Designer <span>(14)</span></a></li>
                <li><a href="#">Language <span>(140)</span></a></li>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">My Projects</h3>
              <?php
                  $query = "SELECT * FROM project_detail WHERE U_Id = $_SESSION[Id]";
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
                  -
                  </div>
                </div>
              </div>
              <?php } ?>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
        </div>
      </div>
    </section>
		<?php
      include("footer/footer.php"); 
    ?>