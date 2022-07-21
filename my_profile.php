<?php
  //session_start();
  require_once('Config/config.php');
  include("header/header.php");
?>
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="my_account.php">My Account </a></p>
            <h1 class="mb-3 bread">My Profile</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
			     <form class="p-5 bg-white" method="POST" enctype="multipart/form-data">
            <?php
                $uid=$_GET['uid'];
                $query = "SELECT * FROM  user_master WHERE Id='$uid'";
                $ret=mysqli_query($con, $query);
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
              ?>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Name</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $row['UserName']; ?>" placeholder="Name" required="Fill Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Gender</label>
                  <select class="form-control" name="gender" required="Select An Option">
                    <option value="<?php echo $row['Gender']; ?>"><?php echo $row['Gender']; ?></option>
                    <option disabled="">-- Selected --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" placeholder="Email" required="Fill Email">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Mobile No.</label>
                  <input type="text" name="mobile" class="form-control" value="<?php echo $row['Mobile']; ?>" placeholder="Mobile No." required="Fill Mobile No.">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Address</label>
                  <input type="text" name="address" class="form-control" value="<?php echo $row['Address']; ?>" placeholder="Address" required="Fill Address">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Pincode No.</label>
                  <input type="text" maxlength="6" name="pincode" class="form-control" value="<?php echo $row['Pincode']; ?>" placeholder="Pincode No." required="Fill Pincode No.">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">City</label>
                  <input type="text" name="city" class="form-control" value="<?php echo $row['City']; ?>" placeholder="City" required="Fill City">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">State</label>
                  <input type="text" name="state" class="form-control" value="<?php echo $row['State']; ?>" placeholder="State" required="Fill State">
                </div>
              </div>
            
              
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update" name="update" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            <?php } ?>
            </form>
            <?php
            if(isset($_POST['update']))
            {
              @$username=$_POST['username'];
              @$gender = $_POST['gender'];
              @$email=$_POST['email'];
              @$mobile=$_POST['mobile'];
              @$address=$_POST['address'];
              @$pincode=$_POST['pincode'];
              @$city=$_POST['city'];
              @$state=$_POST['state'];

              $uid=$_GET['uid'];
              $query = "UPDATE user_master SET UserName='$username', Gender= '$gender', Email='$email', Mobile= '$mobile', Address= '$address', Pincode='$pincode', City= '$city', State= '$state' WHERE Id = '$uid' "; 
              $query_run=mysqli_query($con, $query);
              if ($query_run) 
              {
                echo "<script>alert('Profile Has Been UPDATED.');</script>";
                echo "<script>window.location.href = 'my_account.php'</script>"; 
              }
              else
              {
                echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
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