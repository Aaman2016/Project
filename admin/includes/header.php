<div class="sticky-header header-section ">
      <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
          <a href="index.php">
            <h1>Project Hub</h1>
            <span>AdminPanel</span>
          </a>
        </div>
        <!--//logo-->
       
       
        <div class="clearfix"> </div>
      </div>
      <div class="header-right">
        <div class="profile_details_left"><!--notifications of menu start -->
          <ul class="nofitications-dropdown">
            <?php
              $query = "SELECT ID,Name FROM admin";
              $ret1=mysqli_query($con, $query);
              $num=mysqli_num_rows($ret1);
            ?>  
          </ul>
          
        </div>
        <!--notification menu end -->
        <div class="profile_details">  
        <?php
$adid=$_SESSION['PID'];
$ret=mysqli_query($con,"select Name from admin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['Name'];

?> 
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/download (1).png" alt="" width="50" height="60"> </span> 
                  <div class="user-name">
                    <p><?php echo $name; ?></p>
                    <span>Administrator</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <li> <a href="change_password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                <li> <a href="admin_profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                <li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div> 
      </div>
      <div class="clearfix"> </div> 
    </div>