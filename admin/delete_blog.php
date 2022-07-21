<?php
	require_once('../Config/config.php');
?>

<?php
	$bid=$_GET['delid'];
	$query = "SELECT * FROM blog WHERE B_Id='$bid' ";
	$query_run = mysqli_query($con, $query);
	$after = mysqli_fetch_assoc($query_run);
	if ($after['B_Image']) {
        unlink($after['B_Image']);
    }
	$query = "DELETE FROM blog WHERE B_Id='$bid'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Blog Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'blog.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please Try Again.');</script>";
	}
?>