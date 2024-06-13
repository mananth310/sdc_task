<?php
require('conn.php');
$s=new dbConn();
$conn=$s->Link();
$sql="select * from student_table where id=".$_POST['id'];
$res=mysqli_query($conn,$sql);
if($res){
	$row=mysqli_fetch_assoc($res);
	echo json_encode($row);
}else{
	echo "error to get data";
}


?>