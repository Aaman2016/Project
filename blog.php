<?php
  require_once('Config/config.php');
  include("header/header.php");
?>
<?php 
      
  // Import the file where we defined the connection to Database.   


  $limit = 12;  // Number of entries to show in a page. 
  // Look for a GET variable page if not found default is 1.      
  if (isset($_GET["page"])) 
  {  
    $pn  = $_GET["page"];  
  }  
  else 
  {  
    $pn=1;    
  };   

  $start_from = ($pn-1) * $limit;   

  //$query = "SELECT * FROM project_detail LIMIT $start_from, $limit";   
  //$rs_result = mysqli_query ($con, $query);  

?>
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread">Our Blog</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->
    <?php
      if (isset($_SESSION['Id'])) 
      {
    ?>
		<div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="post_blog.php" class="btn btn-primary py-2">Post Blog</a>
      </div>
    <?php } 
    ?>
    <section class="ftco-section">

      
      <div class="container">
            
        <div class="row d-flex">
           <?php
            $query = mysqli_query($con, "SELECT * FROM blog LIMIT $start_from, $limit");
            $row = mysqli_num_rows($query);
            while ($row = mysqli_fetch_array($query)) {
          ?> 
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.php?bid=<?php echo $row['B_Id'];?>"><img src="<?php echo $row["B_Image"]; ?>"  class="block-20">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <h3><a href=""></a><?php echo $row["B_Title"]; ?></h3>
                  <div><?php echo $row["B_Date"]; ?></div>
                  <div><?php echo user_name($row['U_Id'],$con);?></div>
                  
                </div>
                <h3 class="heading"><?php echo $row["B_Overview"]; ?></h3>
              </div>
            </div>
          </div>
        <?php }?>  
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <?php   
              $query = "SELECT COUNT(*) FROM blog";
                  $rs_result = mysqli_query($con, $query);   
                  $row = mysqli_fetch_row($rs_result);   
                  $total_records = $row[0];   
                    
                  // Number of pages required. 
                  $total_pages = ceil($total_records / $limit);   
                  $pagLink = "";                         
                  for ($i=1; $i<=$total_pages; $i++) { 
                    if ($i==$pn) { 
                      
                        $pagLink .= "<li class='active'><a href='blog.php?page=".$i."'>".$i."</a></li>";  
                      
                    }             
                    else 
                    {
                       
                        $pagLink .= "<li><a href='blog.php?page=".$i."'>".$i."</a></li>";   
                      
                    } 
                  };   
                  echo $pagLink;   
              ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
		
	<?php
    include("footer/footer.php")
  ?>