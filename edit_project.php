<?php
  //session_start();
  require_once('Config/config.php');
  include("header/header.php");
  
  if(isset($_POST['submit1']))
  {
    @$project_name = $_POST['project_name'];
    $project_type = $_POST['project_type'];
    $overview = $_POST['overview'];
    $developer_name = $_POST['developer_name'];
    $how_to_run = $_POST['how_to_run'];
    $details = $_POST['details'];
    
    $datetime = date("d-m-Y h-i-s A");
    $path="project_image/";
    if($_FILES['index_image']['name']=="")
    {
      $index_image=$_POST['oldimg'];

    }
    else
    {
      $index_image = $path.$datetime." ".basename($_FILES['index_image']['name']);
      move_uploaded_file($_FILES['index_image']['tmp_name'],"project_image/".$datetime." ".$_FILES['index_image']['name']);
    }
    
    $file_path = "uploads/";
    $file_upload= $file_path.$datetime." ".basename($_FILES['file_upload']['name']);
    
    //$index_image = $_FILES['index_image']['name'];
    $check = $_POST['check'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_id'];
   
    $eid=$_GET['editid'];
    move_uploaded_file($_FILES["file_upload"]["tmp_name"], "uploads/".$datetime." ".$_FILES['file_upload']['name']);
    if ($check == "Free") 
    {
        $query = "UPDATE project_detail SET Pro_Name='$project_name', Pro_Type= '$project_type', Overview='$overview', Developer_Name= '$developer_name', How_To_Run= '$how_to_run', Details='$details', File_Upload= '$file_upload', Index_Image= '$index_image', Pro_Fees = '$check', Pro_Price= '0', Cat_Id= '$cat_id' WHERE Pro_Id='$eid' "; 
          $query_run=mysqli_query($con, $query);
          if ($query_run) 
          {
              echo "<script>alert('Project has been UPDATED.');</script>";
              echo "<script>window.location.href = 'my_account.php'</script>"; 
          }
          else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
          } 
    }
    else
    {
      $query = "UPDATE project_detail SET Pro_Name='$project_name', Pro_Type= '$project_type', Overview='$overview', Developer_Name= '$developer_name', How_To_Run= '$how_to_run', Details='$details', File_Upload= '$file_upload', Index_Image= '$index_image', Pro_Fees = '$check', Pro_Price= '$price', Cat_Id= '$cat_id' WHERE Pro_Id='$eid' "; 
      $query_run=mysqli_query($con, $query);
      if ($query_run) 
      {
        echo "<script>alert('Project has been UPDATED.');</script>";
        echo "<script>window.location.href = 'my_account.php'</script>"; 
      }
      else
      {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
      } 
    }
    
}

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
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Edit Project</span></p>
            <h1 class="mb-3 bread">Edit Project</h1>
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
                $pid=$_GET['editid'];
                $query = "SELECT * FROM  project_detail WHERE Pro_Id='$pid'";
                $ret=mysqli_query($con, $query);
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
              ?> 
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Title</label>
                  <input type="text" name="project_name" class="form-control" value="<?php echo $row['Pro_Name']; ?>" placeholder="Project Title/Name" required="Fill Project Title">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Type</label>
                  <input type="text" name="project_type" class="form-control" value="<?php echo $row['Pro_Type']; ?>" placeholder="Which Framework You Use" required="Fill Project Type">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Project Overview</label>
                  <textarea name="overview" class="form-control" cols="10" rows="5" placeholder="Overview of The Project" required="Fill Project Overview"><?php echo $row['Overview']; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Developer Name</label>
                  <input type="text" name="developer_name" class="form-control" value="<?php echo $row['Developer_Name'] ?>" placeholder="Ex. XYZ" required="Fill Developer Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">How To Run</label>
                  <input type="text" name="how_to_run" class="form-control" value="<?php echo $row['How_To_Run']; ?>" placeholder="How To Run" required="Fill How To Run">
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Details</label>
                  <textarea name="details" class="form-control" cols="30" rows="5" placeholder="Enter Full Details of A Project" required="Fill All Details"><?php echo $row['Details']; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">File Upload</label>
                  <input type="file" name="file_upload" class="form-control" value="<?php echo $row['File_Upload']; ?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Index Image</label>
                  <input type="file" name="index_image" class="form-control" accept=".gif,.jpg,.jpeg,.png" value="<?php echo $row['Index_Image']; ?>">
                  <input type="hidden"  name="oldimg" value="<?php echo $row['Index_Image']; ?>"/>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Free/Paid</label>
                  <select class="form-control" name="check" id="check" required="Select An Option">
                    <option value="<?php echo $row['Pro_Fees']; ?>"><?php echo $row['Pro_Fees']; ?></option>
                    <option disabled="">-- Selected --</option>
                    <option value="Free">Free</option>
                    <option value="Paid">Paid</option>
                  </select>
                </div>
              </div>
                
              <div class="row form-group" id="price">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Price</label>
                  <input type="text" name="price" class="form-control" value="<?php echo $row['Pro_Price']; ?>" placeholder="Price">
                </div>
              </div>      

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname" style="color: black;">Language Name</label>
                  <select class="form-control" name="cat_id" required="Select The Language">
                    <option value="<?php echo $row['Cat_Id']; ?>"><?php echo $row['Cat_Id']; ?></option>
                    <option disabled="">-- Selected --</option>
                    <?php 
                      $query = mysqli_query($con, "SELECT Cat_Name From categories");
                      $row = mysqli_num_rows($con, $query);
                      while ($row= mysqli_fetch_array($query)) 
                      {
                        echo "<option value='".$row['Cat_Name']."'>".$row['Cat_Name']."</option>";
                      }
                    ?>
                    
                  </select>
                </div>
              </div>
              <?php } ?>
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