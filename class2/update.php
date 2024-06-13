<?php
require('conn.php');
$s=new dbConn();
$conn=$s->Link();

$sql="UPDATE `student_table` SET `student_name`='".$_POST['studentNameEdit']."',`username`='".$_POST['usernameEdit']."',`updated_by`='1',`updated_at`='".date('Y-m-d H:i:s')."' WHERE id=".$_POST['studentId'];
$res=mysqli_query($conn,$sql);
if($res){
	$sql1="select * from student_table where id=".$_POST['studentId'];
	$res1=mysqli_query($conn,$sql1);
	if($res1){
		while($row=mysqli_fetch_assoc($res1)){
		$out ="<td></td><td>".$row['student_name']."</td><td>".$row['username']."</td><td><button class='btn btn-info' type='button' onClick='functionEdit(this)' data-id='".$row['id']."'>Edit</button></td><td><button class='btn btn-danger' type='button' onClick='functionDelete(this)' data-id='".$row['id']."'>Delete</button></td>";

		}
		$output = ["status"=>"Done","data"=>$out];
	}else{
		$output = ["status"=>"Failed","msg"=>"error to get data"];
	}
}else{
	$output = ["status"=>"Failed","msg"=>"error to update data"];
}

echo json_encode($output);
?>