<?php


function getFasi($id){
	
	$sql = mysql_query("SELECT name FROM facilities WHERE id_facilities = $id");
	$res = mysql_fetch_array($sql);
		
	return $res['name'];
}

function getDetail($id){
	
	$sql = mysql_query("SELECT type FROM detail_facilities WHERE id_detail = $id");
	$res = mysql_fetch_array($sql);
		
	return $res['type'];
}

function getName($id){
	
	$sql = mysql_query("SELECT name FROM users WHERE u_id = $id");
	$res = mysql_fetch_array($sql);
		
	return $res['name'];
}

function getStatus($id){
	if($id == 0){
		$var = "Pending";
	}
	elseif($id == 1){
		$var = "Approved";
	}
	elseif($id == 2){
		$var = "Rejected";
	}
	elseif($id == 3){
		$var = "Canceled";
	}
	return $var;
}
?>