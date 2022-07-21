<?php
	require_once('../Config/config.php');
?>

<?php
	$did=$_GET['delid'];
	
	$query = "SELECT * FROM software WHERE S_Id='$did' ";
	$query_run = mysqli_query($con, $query);
	$after = mysqli_fetch_assoc($query_run);
	if ($after['S_File']) {
        unlink($after['S_File']);
        
    }
	$query = "DELETE FROM software WHERE s_Id='$did'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Software Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'manage_software.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please Try Again.');</script>";
	}
?>