<?php
ini_set('date.timezone', 'Asia/Kolkata');
class dbConn {
function Link(){
	$link=mysqli_connect("localhost","root","vcew@123","sdc_class");
	if(!$link){
		echo "db not Connected";
	}else{
		return $link;
	}
}
}