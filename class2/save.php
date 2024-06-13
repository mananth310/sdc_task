<?php
ini_set('date.timezone', 'Asia/Kolkata');
$link=mysqli_connect("localhost","root","vcew@123","sdc_class");
// if($link){
// 	echo "db Connected";
// }else{
// 	echo "db not Connected";
// }
// print_r($_POST);
$sql="INSERT INTO `student_table`(`student_name`, `username`, `created_by`, `created_at`) VALUES ('".$_POST['studentname']."','".$_POST['username']."','1','".date('Y-m-d H:i:s')."')";
$result=mysqli_query($link,$sql);
if($result){
	$sql1="select * from student_table where id in (select max(id) from student_table)";
	$res=mysqli_query($link,$sql1);
	if($res){
		$out="";
		while($row=mysqli_fetch_assoc($res)){
			$out .="<tr id='row".$row['id']."'><td></td><td>".$row['student_name']."</td><td>".$row['username']."</td><td><button class='btn btn-info' type='button' onClick='functionEdit(this)' data-id='".$row['id']."'>Edit</button></td><td><button class='btn btn-danger' type='button' onClick='functionDelete(this)' data-id='".$row['id']."'>Delete</button></td></tr>";
		}
	}else{
		echo "data read Eerror ";
	}
}else{
	echo "data not saved ";
}
$output=["status"=>"Done","data"=>$out];
echo json_encode($output)
?>