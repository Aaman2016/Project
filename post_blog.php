<?php
  //session_start();
  require_once('Config/config.php');
  include("header/header.php");
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#check").change(function () {
            if ($(this).val() == "Paid")
            {
                $("#price").show();
                $("#price").focus();
            } 
            else {
                $("#price").hide();
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
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread">Post A Blog</h1>
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
                  <label class="font-weight-bold" for="fullname" style="color: black;">Blog Title</label>
                  <input type="text" name="blog_title" class="form-control" placeholder="Project Title/Name" required="Fill Blog Title">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Blog Image</label>
                  <input type="file" name="blog_image" class="form-control" accept=".gif,.jpg,.jpeg,.png">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Overview</label>
                  <textarea name="overview" class="form-control" cols="15" rows="5" placeholder="Write A 100 Words For Blog" required="Fill All Details"></textarea>
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Message</label>
                  <textarea name="details" class="form-control" cols="30" rows="5" placeholder="Write A 500 Words For Blog" required="Fill All Details"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Post" name="blog" class="btn btn-primary  py-2 px-5">
                </div>
              </div>
            </form>
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
      if (isset($_POST['blog'])) 
        {
          $blog_title = $_POST['blog_title'];
          
          $datetime = date("d-m-Y h-i-s A");
          $path="blog_image/";
          $blog_image = $path.$datetime." ".basename($_FILES['blog_image']['name']);
          $details = $_POST['details'];
          $overview = $_POST['overview'];

          if ($blog_title == $blog_title) 
          {
                $query = "SELECT B_Id FROM blog WHERE B_Title = '$blog_title' LIMIT 1";
                $query_run = mysqli_query($con, $query); 
                if (mysqli_num_rows($query_run)>0)
                {
                  
                  echo "<script>alert('Blog Title is Already Available...!! Plz Try Another Blog Title');</script>";
                  
                }
                else
                {
                      
                    move_uploaded_file($_FILES['blog_image']['tmp_name'],"blog_image/".$datetime." ".$_FILES['blog_image']['name']);
                    $query = "INSERT INTO blog(B_Title, B_Image,B_Overview ,B_Message, U_Id) VALUES('$blog_title', '$blog_image', '$overview' ,'$details', '$_SESSION[Id]' )";
                      $query_run = mysqli_query($con,$query);
                      
                    if ($query_run) 
                    {
                        echo "<script>alert('Blog Upload Successfully...!!');</script>";
                    }
                    else
                    {
                      echo "<script>alert('Blog Not Upload...!! Please Try Again.');</script>"; 
                    }                  
                }
          }
          else
          {
              echo "<script>alert('ERROR');</script>"; 
          }        
        }
    ?>
		<?php
      include("footer/footer.php"); 
    ?>