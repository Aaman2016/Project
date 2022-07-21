<?php
	require_once('Config/config.php');
?>

<?php
	$delid=$_GET['delid'];
	$query = "SELECT * FROM project_detail WHERE Pro_Id='$delid' ";
	$query_run = mysqli_query($con, $query);
	$after = mysqli_fetch_assoc($query_run);
	if ($after['Index_Image'] && $after['File_Upload']) {
        unlink($after['Index_Image']);
        unlink($after['File_Upload']);
    }

	$query = "DELETE FROM project_detail WHERE Pro_Id='$delid'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Project Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'my_account.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please Try Again.');</script>";
	}
?>