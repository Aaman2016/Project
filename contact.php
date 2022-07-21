<?php
  require_once('Config/config.php');
  include("header/header.php");
  require_once('mail/phpmailer/PHPMailerAutoload.php');
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->
		<section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Sadhu Vaswani Road Rajkot-360005</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+91 98989 89898</a></p>
          </div>
          <div class="col-md-4">
            <p><span>Email:</span> <a href="mailto:projecthub.infoway@gmail.com">projecthub.infoway@gmail.com</a></p>
          </div>
          <div class="col-sd-2">
            <p><span>Website</span> <a href="index.php">projecthub.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form class="bg-white p-5 contact-form" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required="True">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="True">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Your Mobile No." required="True">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea  id="" cols="30" rows="7" name="message" class="form-control" placeholder="Message" required="True"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="contact" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
    
      <?php
        if(isset($_POST['contact']))
        {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $mobile = $_POST['mobile'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];
          
          $query = "INSERT INTO contact_us(Cont_Name, Cont_Email, Cont_Mobile, Cont_Subject, Cont_Message) VALUES ('$name', '$email', '$mobile', '$subject', '$message')";
          $query_run = mysqli_query($con, $query);
          if ($query_run)
          {
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
              $mail->SetFrom($_POST['email'],$_POST['name']);
              $mail->AddAddress('projecthub.info1@gmail.com');
              $mail->AddReplyTo($_POST['email'],$_POST['name']);
              $mail->IsHTML(true);
              $mail->Subject = $subject;
              $mail->Body = $message;
              $mail->WordWrap   = 80;
              if(!$mail->Send())
              {
                echo "<script>alert('Please Check Your Email & Enter Valid Email Id.')</script>";
              }
              else
              { 
                echo "<script>alert('Mail Send Sucessfully....')</script>";
              }
          }
          else
          {
            echo "<script>alert('Error....')</script>";
          }  
            
              
        }
          
        ?>

    <?php
      include("footer/contact_footer.php");
    ?>