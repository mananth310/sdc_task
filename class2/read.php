<?php
require('conn.php');
$s=new dbConn();
$conn=$s->Link();
$sql1="select * from student_table";
	$res=mysqli_query($conn,$sql1);
	if($res){
		$out="";
		while($row=mysqli_fetch_assoc($res)){
			$out .="<tr><td>".$row['id']."</td><td>".$row['student_name']."</td><td>".$row['username']."</td><td><button class='btn btn-info' type='button' >Edit</button></td></tr>";
		}
	}
	else{
		$out .="error to get data";
	}
	
$output=["data"=>$out];
echo json_encode($output);
?>