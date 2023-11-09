<?php
	require("db_connect.php");

	$title = $_REQUEST["title"] ?? "";
	$m_title = $_REQUEST["m_title"] ?? "";
	$a_name = $_REQUEST["a_name"] ?? "";
	$d_name = $_REQUEST["d_name"] ?? "";
	$page = $_REQUEST["page"];

	if($a_name){
		$a_name = $_REQUEST["a_name"];
		$a_pic = $_FILES["a_pic"]["name"];
		$a_birth = $_REQUEST["a_birth"];
		$a_debut = $_REQUEST["a_debut"];
		$a_drama = $_REQUEST["a_drama"];
		$a_movie = $_REQUEST["a_movie"];

		if($a_name && $a_pic && $a_birth && $a_debut && $a_drama && $a_movie){
			$a_pic = "actor/".$a_pic;

		    $db->exec("update actor set a_name='$a_name', a_pic='$a_pic', a_birth='$a_birth', a_debut='$a_debut', a_drama='$a_drama', a_movie='$a_movie' where a_name='$a_name'");

			header("Location:actor.php?a_name=$a_name&page=$page");	// 실행이 다 끝나면 list.php로
			exit;	// html로 넘어가지 않기 위함
		}
	}elseif($d_name){
		$d_name = $_REQUEST["d_name"];
		$d_pic = $_FILES["d_pic"]["name"];
		$d_birth = $_REQUEST["d_birth"];
		$d_drama = $_REQUEST["d_drama"];
		$d_movie = $_REQUEST["d_movie"];

		if($d_name && $d_pic && $d_birth && $d_debut && $a_drama && $a_movie){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$d_pic = "director/".$d_pic;

		    $db->exec("update director set d_name='$d_name', d_pic='$d_pic', d_birth='$d_birth', d_debut='$d_debut', d_drama='$d_drama', d_movie='$d_movie'' where d_name='$d_name'");

			header("Location:director.php?d_name=$d_name&page=$page");	// 실행이 다 끝나면 list.php로
			exit;	// html로 넘어가지 않기 위함
		}
	}elseif($title){
		$title = $_REQUEST["title"];
		$poster = $_FILES["poster"]["name"];	
		$genre = $_REQUEST["genre"];
		$actor = $_REQUEST["actor"];
		$director = $_REQUEST["director"];
		$opening = $_REQUEST["opening"];
		$plot = $_REQUEST["plot"];
		
		if($title && $poster && $genre && $actor && $director && $opening && $plot){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$poster = "poster/".$poster;

		    $db->exec("update drama set title='$title', poster='$poster', genre='$genre', actor='$actor', director='$director', opening='$opening', plot='$plot' where title='$title'");

			header("Location:drama.php?title=$title&page=$page");	// 실행이 끝나면 view의 게시글 및 해당 페이지로
			exit;	// html로 넘어가지 않기 위함
		}
	}elseif($m_title){
		$m_title = $_REQUEST["m_title"];
		$m_poster = $_FILES["m_poster"]["name"];
		$m_genre = $_REQUEST["m_genre"];
		$m_actor = $_REQUEST["m_actor"];
		$m_director = $_REQUEST["m_director"];
		$m_opening = $_REQUEST["m_opening"];
		$m_plot = $_REQUEST["m_plot"];
		
		if($m_title && $m_poster && $m_genre && $m_actor && $m_director && $m_opening && $m_plot){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$m_poster = "movie/".$m_poster;

			$db->exec("update movie set m_title='$m_title', m_poster='$m_poster', m_genre='$m_genre', m_actor='$m_actor', m_director='$m_director', m_opening='$m_opening', m_plot='$m_plot' where m_title='$m_title'");

			header("Location:movie.php?m_title=$m_title&page=$page");	// 실행이 끝나면 view의 게시글 및 해당 페이지로
			exit;	// html로 넘어가지 않기 위함
		}
	}
	// 에러메시지 출력을 위해 html 남겨둠
?>   

<!doctype html>	
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<script>
	alert("모든 항목이 빈 칸 없이 입력되어야 합니다.");
	history.back();
</script>

</body>
</html>