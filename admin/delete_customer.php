<?php
	require_once('../Config/config.php');
?>

<?php
	$did=$_GET['delid'];
	$res=delete_all_user_detail($did,$con);
	$query = "DELETE FROM user_master WHERE Id='$did'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Record Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'customer_list.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";
	}
?>