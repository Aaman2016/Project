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
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Edit Blog</span></p>
            <h1 class="mb-3 bread">Edit Blog</h1>
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
                $bid=$_GET['bid'];
                $query = "SELECT * FROM  blog WHERE B_Id='$bid'";
                $ret=mysqli_query($con, $query);
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
              ?> 
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Blog Title</label>
                  <input type="text" name="blog_title" class="form-control" value="<?php echo $row['B_Title']; ?>" placeholder="Blog Title" required="Fill Blog Title">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Blog Image</label>
                  <input type="file" name="blog_image" class="form-control" accept=".gif,.jpg,.jpeg,.png" value="<?php echo $row['B_Image']; ?>">
                  <input type="hidden"  name="oldimg" value="<?php echo $row['B_Image']; ?>"/>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Blog Overview</label>
                  <textarea name="blog_overview" class="form-control" cols="10" rows="5" placeholder="Overview of The Blog" required="Fill Blog Overview"><?php echo $row['B_Overview']; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Message</label>
                  <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Enter Full Details of A Blog" required="Fill All Details"><?php echo $row['B_Message']; ?></textarea>
                </div>
              </div>

                
              <div class="row form-group" id="price">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Writer Name</label>
                  <input type="text" name="username" disabled="" class="form-control" value="<?php echo user_name($row['U_Id'],$con); ?>" placeholder="Price">
                </div>
              </div>      

              <?php } ?>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update" name="edit" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
            <?php
               if(isset($_POST['edit']))
              {
                $blog_title = $_POST['blog_title'];
                $blog_overview = $_POST['blog_overview'];
                $overview = $_POST['overview'];
                $message = $_POST['message'];
                
                $datetime = date("d-m-Y h-i-s A");
                $path="blog_image/";
                if($_FILES['blog_image']['name']=="")
                {
                  $blog_image=$_POST['oldimg'];

                }
                else
                {
                  $blog_image = $path.$datetime." ".basename($_FILES['blog_image']['name']);
                  move_uploaded_file($_FILES['blog_image']['tmp_name'],"blog_image/".$datetime." ".$_FILES['blog_image']['name']);
                }
                
                  $bid=$_GET['bid'];
                
                  $query = "UPDATE blog SET B_Title='$blog_title', B_Image= '$blog_image', B_Overview='$blog_overview',B_Message= '$message' WHERE B_Id='$bid' "; 
                  $query_run=mysqli_query($con, $query);
                  if ($query_run) 
                  {
                    echo "<script>alert('Blog Update Sucessfully.');</script>";
                    echo "<script>window.location.href = 'my_account.php'</script>"; 
                  }
                  else
                  {
                    echo "<script>alert('Something Went Wrong. Please Try Again.');</script>"; 
                  }   
                }
            ?>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">105 Vardhman Complex, Sadhu Vaswani Road, Rajkot-360005</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+91 98989 89898</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">projecthub.infoway@gmail.com</span></a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <?php
      include("footer/footer.php"); 
    ?>