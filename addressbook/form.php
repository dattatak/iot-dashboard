<?php

## DB Stuff

$server="localhost";
$user="baddressb";
$pass="curlsbear";
$db="baddressb";

$conn = mysql_connect($server,$user,$pass);

$r=mysql_select_db($db);

function addentry($data){
	
	#$date=strtotime($data['dob']);
	$sql = "INSERT into addresses (name,phone,address,birthday) VALUES ('".$data['name']."','".$data['phone']."','".$data['addr']."','".$data['dob']."')";
	$res = mysql_query($sql);
	return $res;
}

function delentry($id){
	$sql = "DELETE FROM addresses WHERE id=$id";
	$res = mysql_query($sql);
	return $res;
}

if (isset($_POST['submit']) ){

	switch ($_POST['mode']){
	case 1:
		if (delentry($_POST['id'])){
			header("location:index.php");
		}else{
			echo "fucksocks";
		}
		break;
	case 0:
		$form_data=$_REQUEST;
		addentry($form_data);
		header("location:index.php");
		break;
	}
}

?>
