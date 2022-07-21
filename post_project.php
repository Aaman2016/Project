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
               $("#file_upload").hide();
                
            } 
            else {
                $("#price").hide();
                $("#file_upload").show();
                
                
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
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Projects</span></p>
            <h1 class="mb-3 bread">Post A Project</h1>
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
                  <label class="font-weight-bold" for="fullname" style="color: black;">Language Name</label>
                  <select class="form-control" name="cat_id" required="Select The Language">
                    <option selected="" disabled="">-- Selected --</option>
                    <?php 
                      $query = mysqli_query($con, "SELECT * From categories");
                      $row = mysqli_num_rows($con, $query);
                      while ($row= mysqli_fetch_array($query)) 
                      {
                        echo "<option value='".$row['Cat_Id']."'>".$row['Cat_Name']."</option>";
                      }
                    ?>
                    
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Title</label>
                  <input type="text" name="project_name" class="form-control" placeholder="Project Title/Name" required="Fill Project Title">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Type</label>
                  <input type="text" name="project_type" class="form-control" placeholder="Which Framework You Use" required="Fill Project Type">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Overview</label>
                  <textarea name="overview" class="form-control" cols="10" rows="5" placeholder="Overview of The Project" required="Fill Project Overview"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Developer Name</label>
                  <input type="text" name="developer_name" class="form-control" placeholder="Ex. XYZ" required="Fill Developer Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">How To Run</label>
                  <input type="text" name="how_to_run" class="form-control" placeholder="How To Run" required="Fill How To Run">
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Details</label>
                  <textarea name="details" class="form-control" cols="30" rows="5" placeholder="Enter Full Details of A Project" required="Fill All Details"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Index Image</label>
                  <input type="file" name="index_image" class="form-control" accept=".gif,.jpg,.jpeg,.png">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Free/Paid</label>
                  <select class="form-control" name="check" id="check" required="Select An Option">
                    <option selected="" disabled="" value="selelcted">-- Selected --</option>
                    <option value="Free">Free</option>
                    <option value="Paid">Paid</option>
                  </select>
                </div>
              </div>
                
              <div class="row form-group" id="price">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Price</label>
                  <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
              </div>
              <div class="row form-group" id="file_upload">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">File Upload</label>
                  <input type="file" name="file_upload" class="form-control" >
                </div>
              </div>      
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Post" name="submit1" class="btn btn-primary  py-2 px-5">
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
              <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">projecthub.info1@gmail.com</span></a></p>

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
    if (!isset($_SESSION['Id'])) 
    {
        echo "<script>alert('Please Login...!!');</script>";
    }
    else
    {
      if (isset($_POST['submit1'])) 
        {
          $project_name = $_POST['project_name'];
          $project_type = $_POST['project_type'];
          $overview = $_POST['overview'];
          $developer_name = $_POST['developer_name'];
          $how_to_run = $_POST['how_to_run'];
          $details = $_POST['details'];
          
          
          /*$allowedTypes = array('application/zip', 'application/x-rar-compressed', 'application/octet-stream');


          $name = "/^[a-zA-Z ]+$/";
          $datetime = date("d-m-Y h-i-s A");
          */
          $datetime = date("d-m-Y h-i-s A");
          $path="project_image/";
          $index_image = $path.$datetime." ".basename($_FILES['index_image']['name']);
          $file_path = "uploads/";
          $file_upload= $file_path.$datetime." ".basename($_FILES['file_upload']['name']);
          $allowed = array("zip","rar","jpg","png");
          //$index_image = $_FILES['index_image']['name'];
          $check = $_POST['check'];
          $price = $_POST['price'];
          $cat_id = $_POST['cat_id'];
          if ($project_name == $project_name) 
          {
            $query = "SELECT Pro_Id FROM project_detail WHERE Pro_Name = '$project_name' LIMIT 1";
              $query_run = mysqli_query($con, $query); 
                if (mysqli_num_rows($query_run)>0)
                {
                  
                  echo "<script>alert('Project Name is already available...!! Plz Try Another Product');</script>";
                  /*echo "<div class='alert alert-danger'>
                      <a href='post_project.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                      <b>Project Name is already available...!! Plz Try Another Product</b>
                    </div>";*/
                    //exit();
                
                }
                else
                {
                      //$newfilename = 'FILENAME.'.pathinfo($file_upload, PATHINFO_EXTENSION);
                      //file permission
                      
                      move_uploaded_file($_FILES["file_upload"]["tmp_name"], "uploads/".$datetime." ".$_FILES['file_upload']['name']);
                      move_uploaded_file($_FILES['index_image']['tmp_name'],"project_image/".$datetime." ".$_FILES['index_image']['name']);
                    $query = "INSERT INTO project_detail(Pro_Name, Pro_Type, Overview, Developer_Name, How_To_Run, Details, File_Upload, Index_Image,Pro_Fees, Pro_Price, Cat_Id, U_Id) VALUES('$project_name', '$project_type', '$overview', '$developer_name', '$how_to_run', '$details', '$file_upload', '$index_image', '$check', '$price', '$cat_id', '$_SESSION[Id]' )";
                      $query_run = mysqli_query($con,$query);
                      
                    if ($query_run) 
                    {
                        echo "<script>alert('Project Upload Successfully...!!');</script>";
                   }                  
                }
          }        
        }
      
    }
    ?>
		<?php
      include("footer/footer.php"); 
    ?>