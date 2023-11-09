<?php
	require("db_connect.php");

	$title = $_REQUEST["title"] ?? "";
	$m_title = $_REQUEST["m_title"] ?? "";
	$a_name = $_REQUEST["a_name"] ?? "";
	$d_name = $_REQUEST["d_name"] ?? "";

	if($a_name){
		$a_name = $_REQUEST["a_name"];
		$a_pic = $_FILES["a_pic"]["name"];
		$a_birth = $_REQUEST["a_birth"];
		$a_debut = $_REQUEST["a_debut"];
		$a_drama = $_REQUEST["a_drama"];
		$a_movie = $_REQUEST["a_movie"];

		if($a_name && $a_pic && $a_birth && $a_debut && $a_drama && $a_movie){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$a_pic = "actor/".$a_pic;

			$db->exec("insert into actor (a_name, a_pic, a_birth, a_debut, a_drama, a_movie) values 
								('$a_name','$a_pic','$a_birth','$a_debut','$a_drama','$a_movie')");
			header("Location:actorlist.php");	// 실행이 다 끝나면 list.php로
			exit;	// html로 넘어가지 않기 위함
		}
	}
	elseif($d_name){
		$d_name = $_REQUEST["d_name"];
		$d_pic = $_FILES["d_pic"]["name"];
		$d_birth = $_REQUEST["d_birth"];
		$d_debut = $_REQUEST["d_debut"];
		$d_drama = $_REQUEST["d_drama"];
		$d_movie = $_REQUEST["d_movie"];

		if($d_name && $d_pic && $d_birth && $d_debut && $d_drama && $d_movie){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$d_pic = "director/".$d_pic;

			$db->exec("insert into director (d_name, d_pic, d_birth, d_debut, d_drama, d_movie) values 
								('$d_name','$d_pic','$d_birth','$d_debut','$d_drama','$d_movie')");
			header("Location:directorlist.php");	// 실행이 다 끝나면 list.php로
			exit;	// html로 넘어가지 않기 위함
		}
	}
	elseif($title){
		$title = $_REQUEST["title"];
		$poster = $_FILES["poster"]["name"];
		$genre = $_REQUEST["genre"];
		$actor = $_REQUEST["actor"];
		$director = $_REQUEST["director"];
		$opening = $_REQUEST["opening"];
		$plot = $_REQUEST["plot"];

		if($title && $poster && $genre && $actor && $director && $opening && $plot){		// 값이 있으면 참(공백은 거짓으로. exit가 실행되지 않음 > html로(에러)
			$poster = "poster/".$poster;

			$db->exec("insert into drama (title, poster, genre, actor, director, opening, plot) values 
								('$title','$poster','$genre','$actor','$director','$opening','$plot')");
			header("Location:dramalist.php");	// 실행이 다 끝나면 list.php로
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

			$db->exec("insert into movie (m_title, m_poster, m_genre, m_actor, m_director, m_opening, m_plot) values 
								('$m_title','$m_poster','$m_genre','$m_actor','$m_director','$m_opening','$m_plot')");
			header("Location:movielist.php");	// 실행이 다 끝나면 list.php로
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