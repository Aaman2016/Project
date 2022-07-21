<?php
	require_once('../Config/config.php');
?>

<?php
	$did=$_GET['delid'];
	$query = "DELETE FROM contact_us WHERE Cont_Id='$did'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Contact Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'contact_us.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";
	}
?>