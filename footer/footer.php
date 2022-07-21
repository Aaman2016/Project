
<?php
	require_once('Config/config.php');
	require_once('mail/phpmailer/PHPMailerAutoload.php');			
  	if(isset($_POST['subscribe']))
	{
		$email = $_POST['email'];
		if ($email == $email) 
		{
			$query = "SELECT * FROM subscribe WHERE S_Email = '$email' LIMIT 1";
			$query_run = mysqli_query($con, $query);
			if (mysqli_num_rows($query_run)>0)
            {
                  
                echo "<script>alert('This Email Already Subscribe Please Try Another Email...');</script>";
            }
            else
            {
            	$query = "INSERT INTO subscribe (S_Email) VALUES ('$email')";
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
					$mail->SetFrom('projecthub.info1@gmail.com','Project Hub');
					$mail->AddAddress($email);
					$mail->AddReplyTo('projecthub.info1@gmail.com');
					$mail->IsHTML(true);
					$mail->Subject = "Subscribe The Website";
					$mail->Body = "<h1>All Update Will Send You..</h1><br><h3>Thank You For Subscribe Our Website....</h3>";
					$mail->WordWrap   = 80;
					
					if(!$mail->Send())
					{ 
						echo "<script>alert('Please Check Your Email & Enter Valid Email Id.')</script>";
					}
					else
					{ 
						echo "<script>alert('Subscribe Sucessfully....')</script>";
					}
	           	}    
            }
		}
		
		
	}

  ?>

<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form class="subscribe-form" method="POST" enctype="multipart/form-data">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" name="email" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3" name="subscribe">
                    </div>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-4">
        	<div class="col-md">
             <div class="ftco-footer-widget mb-3">
              <h2 class="ftco-heading-2">Project Hub</h2>
              <p>ProjectHub is a global company that provides hosting for software development version control using Project. ProjectHub offers plans for free, professional, and enterprise accounts.</p>
			  <p>Free ProjectHub accounts are commonly used to host open source projects. It provides access control and several collaboration features such as bug tracking, feature requests, task management, and wikis for every project.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md">
		  <?php
			if(isset($_SESSION['Id']))
			{
			
		  ?>
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Candidate</h2>
              <ul class="list-unstyled">
                <li><a href="project.php" class="pb-1 d-block">Browse Project</a></li>
                <li><a href="software.php" class="pb-1 d-block">Browse Software</a></li>
                <li><a href="post_project.php" class="pb-1 d-block">Post Project</a></li>
                <li><a href="post_blog.php" class="pb-1 d-block">Post Blog</a></li>
                
                
              </ul>
            </div>
			<?php
			}
			else
			{
				
			
			?>
			<div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Candidate</h2>
              <ul class="list-unstyled">
                <li><a href="project.php" class="pb-1 d-block">Browse Project</a></li>
                
                <li><a href="software.php" class="pb-1 d-block">Browse Software</a></li>
                
              </ul>
            </div>
			<?php }?>
          </div>
          <div class="col-md">
		  <?php 
			if(isset($_SESSION['Id']))
			{
				
				
			
		  ?>
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Account</h2>
              <ul class="list-unstyled">
                <li><a href="my_account.php" class="pb-1 d-block">My Account</a></li>
                
                <li><a href="logout.php" class="pb-1 d-block">Logout</a></li>
              </ul>
            </div>
			<?php 
			} 
			else
			{
			?>
			<div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Account</h2>
              <ul class="list-unstyled">
               
                <li><a href="login.php" class="pb-1 d-block">Sign In</a></li>
                <li><a href="register.php" class="pb-1 d-block">Create Account</a></li>
                
              </ul>
            </div>
			<?php }?>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">105 Vardhman Complex, Sadhu Vaswani Road, Rajkot-360005</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 98989 89898</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">projecthub.infoway@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by <b> <a href="index.php" target="_blank">Project Hub</a></b>
  </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    

  </body>
</html>
