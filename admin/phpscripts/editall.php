<?php
	include('connect.php');

	$tbl = $_POST['tbl'];
	$col = $_POST['col'];
	$id = $_POST['id'];
	unset($_POST['tbl']);
	unset($_POST['col']);
	unset($_POST['id']);
	unset($_POST['submit']);
	//echo count($_POST);
	$num = count($_POST);
	$count=0;
	$qstring = "UPDATE {$tbl} SET ";
	foreach($_POST as $key => $value){
		$count++;
		if($count !=$num){
			$qstring .= $key."='".$value."',";
		}else{
			$qstring .= $key."='".$value."' ";
		}
	}
	$qstring .= "WHERE {$col}={$id}";
	//echo $qstring;
	$updatequery = mysqli_query($link, $qstring);
	if($updatequery){
		header("Location:../../index.php");
	}else{
		echo "There was a problem with the server, please contact the web admin...Adam";
	}
	mysqli_close($link);
?>