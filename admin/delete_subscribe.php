<?php
	require_once('../Config/config.php');
?>

<?php
	$sid=$_GET['delid'];
	$query = "DELETE FROM subscribe WHERE S_Id='$sid'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Record Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'subscribe_list.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";
	}
?>