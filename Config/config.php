<?php
$con = mysqli_connect ("localhost", "root", "") or die ("Unable to connect");
mysqli_select_db ($con, 'shiv');

function cat_nm_fun($id,$con)
{
$query = mysqli_query($con, "SELECT * FROM categories where Cat_Id='$id'");
$row = mysqli_fetch_array($query);
$cat_nm=$row['Cat_Name'];
return $cat_nm;

}

function user_name($id,$con)
{
$query = mysqli_query($con, "SELECT * FROM user_master where Id='$id'");
$row = mysqli_fetch_array($query);
$us_nm=$row['UserName'];
return $us_nm;

}

function delete_all_user_detail($id,$con)
{
	$query1 = "SELECT * FROM project_detail WHERE U_Id='$id' ";
	$query_run = mysqli_query($con, $query1);
	while ($after=mysqli_fetch_array($query_run)) {
	        unlink("../".$after['Index_Image']);
	        unlink("../".$after['File_Upload']);
	}
	
	$query = mysqli_query($con, "DELETE FROM project_detail WHERE U_Id='$id'");
	return $query;
}
function delete_all_category_detail($id,$con)
{
	$query1 = "SELECT * FROM project_detail WHERE Cat_Id='$id' ";
	$query_run = mysqli_query($con, $query1);
	while ($after=mysqli_fetch_array($query_run)) {
	        unlink("../".$after['Index_Image']);
	        unlink("../".$after['File_Upload']);
	}
	$query = mysqli_query($con, "DELETE FROM project_detail WHERE Cat_Id='$id'");
	return $query;
}

?>