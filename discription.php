<?php
  require_once("Config/config.php");
  include("header/header.php");
  require_once('mail/phpmailer/PHPMailerAutoload.php');
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
    </div>
<!-- End Header -->
		<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <form method="POST" enctype="multipart/form-data">
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
            <h4>Download Link:</h4>
            <?php
              if (isset($_SESSION['Id']) && $row["Pro_Fees"]=='Free' ) 
              {
            ?>
              <a href="<?php echo $row['File_Upload'];?>" class="btn btn-primary py-2">Download</a>
            <?php
              }
              elseif(isset($_SESSION['Id']) && $row["Pro_Fees"]=='Paid')
              {
            ?>
              <h5 style="color: red;">Please Click Send Button To Get An Information About Project Owner.</h5>
              <input type="submit" value="Send" name="send" class="btn btn-primary py-2">
              
              
            <?php  }
              else
              {
            ?>
              <a href="login.php">Login First Than Downlod</a>
            <?php } ?>

          
            
            <?php
            $cnt = $cnt+1;
              }
              
            ?>
          </form>
          
          <div class="pt-5 mt-5">
              <h3 class="mb-5">Comments</h3>
              <ul class="comment-list">
                <?php
                  $pro_id = $_GET['pro_id'];
                  $query = "SELECT * FROM pro_review WHERE Pro_Id = '$pro_id' ORDER BY Date DESC LIMIT 2";
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
              <?php } ?>
              </ul>
              <?php
            if (isset($_SESSION['Id'])) 
            {
            
          ?>
          <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form class="p-5 bg-light" method="POST">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['UserName'];?>" disabled="">
                    <input type="hidden" class="form-control" name="u_name" value="<?php echo $_SESSION['UserName'];?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['Email'];?>" disabled="">
                    <input type="hidden" class="form-control" name="u_email" value="<?php echo $_SESSION['Email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message"cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="comment" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>
                </form>
              </div>
            <?php }?>
          </div>
            <?php
              if (isset($_POST['comment'])) 
              {
                $pro_id = $_GET['pro_id'];
                $u_name = $_POST['u_name'];
                $u_email = $_POST['u_email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $query = "INSERT INTO pro_review(Name, Email, Subject, Message, Pro_Id, U_Id)VALUES('$u_name', '$u_email', '$subject', '$message', '$pro_id', $_SESSION[Id])";
                
                $query_run = mysqli_query($con, $query);
                if ($query_run) 
                {
                  echo "<script>alert('Comment Send Successfully..');</script>"; 
                }
                else
                {
                  echo "<script>alert('Something Want's Wrong. Please Try Again Later..!);</script>";
                }


              }
            ?>
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 pl-md-5 sidebar ftco-animate">

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-3">Recent Project</h3>
              <?php
                  $query = "SELECT * FROM project_detail ORDER BY Pro_Date DESC LIMIT 6";
                  $query_run = mysqli_query($con, $query);
                
                  while($row = mysqli_fetch_array($query_run))
                  {
                ?>
              <div class="block-21 mb-4 d-flex">
                <img src="<?php echo $row["Index_Image"]; ?>" class="blog-img mr-4" />
                <div class="text">
                  <h3 class="heading"><a href="discription.php?pro_id=<?php echo $row['Pro_Id'];?>"><?php echo $row["Pro_Name"]; ?></a></h3><br>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $row["Pro_Date"]; ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo $row["Developer_Name"]; ?></a></div>
                    
                  </div>
                </div>
              </div>
              <?php } ?>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
		<?php
    
      if (isset($_SESSION['Id'])) 
      {
      
      
      if(isset($_POST['send']))
      {
        
        $pro_id = $_GET['pro_id'];
        
        $query = "SELECT * FROM project_detail INNER JOIN user_master ON project_detail.U_Id = user_master.Id WHERE Pro_Id = '$pro_id' ";
        //echo $query;
        $query_run = mysqli_query($con,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
          
            $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
            //$_SESSION['Id'] = $row['Id'];
            //echo $_SESSION['UserName'] = $row['UserName'];
            //echo $_SESSION['Email'] = $row['Email'];
            //echo $_SESSION['Mobile'] = $row['Mobile'];

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port     = 587;  
            $mail->Username = 'projecthub.info1@gmail.com';
            $mail->Password = 'Neha@7801802437';
            $mail->Host     = 'smtp.gmail.com';
            $mail->Mailer   = 'smtp';
            $mail->SetFrom('projecthub.info1@gmail.com','Project Hub');
            $mail->AddAddress($_SESSION['Email']);
            $mail->AddReplyTo('projecthub.info1@gmail.com');
            $mail->IsHTML(true);
            $mail->Subject = "Project Owner Details";
            $mail->Body = "<h2>Project Name. " .$row['Pro_Name']."</h2><h3>Owner Name is. ".$row['UserName']."</h3><br><h3>Email is. ".$row['Email']."</h3><br><h3>Mobile No. ".$row['Mobile']."</h3>";
            
            //$mail->WordWrap   = 80;
            if(!$mail->Send())
            { 
              echo "<script>alert('Please Enter Valid Email.')</script>";
            }
            else
            { 
              echo "<script>alert('Project Owner Details is Send in Your Email .')</script>";
              //header("Location: login.php");
            }
            
            
          
        }
        else
        {
          echo '<script type="text/javascript">alert("Database Error")</script>';
        }
      }
    }
      else
      {
      }
    
    ?>
	<?php
    include("footer/footer.php")
  ?>