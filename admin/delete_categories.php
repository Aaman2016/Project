<?php
	require_once('../Config/config.php');
?>

<?php
	$eid=$_GET['delid'];
	$res=delete_all_category_detail($eid,$con);
	$query = "DELETE FROM categories WHERE Cat_Id='$eid'";
	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		echo "<script>alert('Record Delete Sucessfully...');</script>"; 
    	echo "<script>window.location.href = 'manage_categories.php'</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";
	}
?>