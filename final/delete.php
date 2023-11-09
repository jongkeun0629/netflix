<?php
	require("db_connect.php");
	
	$title = $_REQUEST["title"] ?? "";
	$m_title = $_REQUEST["m_title"] ?? "";
	$a_name = $_REQUEST["a_name"] ?? "";
	$d_name = $_REQUEST["d_name"] ?? "";

	$page = $_REQUEST["page"] ?? 1;
	
	if($a_name){
		$db->exec("delete from actor where a_name='$a_name'");	
		header("Location:actorlist.php?page=$page");
	}elseif($d_name){
		$db->exec("delete from director where d_name='$d_name'");	
		header("Location:directorlist.php?page=$page");
	}elseif($title){
		$db->exec("delete from drama where title='$title'");
		header("Location:dramalist.php?page=$page");	// 실행이 다 끝나면 list.php의 해당 페이지로
	}elseif($m_title){
		$db->exec("delete from movie where m_title='$m_title'");
		header("Location:movielist.php?page=$page");	// 실행이 다 끝나면 list.php의 해당 페이지로
	}
?>