<?php
require('conn.php');
$s=new dbConn();
$conn=$s->Link();

$sql="DELETE FROM `student_table` WHERE id=".$_GET['id'];
$res=mysqli_query($conn,$sql);
if($res)
{
	$out=["status"=>"Done"];
}else{
	$out=["status"=>"Failed"];
}
echo json_encode($out);
?>