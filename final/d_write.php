<?php	
    require("style.php");

    $page = $_REQUEST["page"];

	$title = $_REQUEST["title"] ?? "";	// 9줄과 동일. 값이 있으면 그대로 쓰고 없으면 0
	
	if($title){	// 글 번호(num)가 주어졌다면. 수정모드로 
		require("db_connect.php");	// db접속
		$query = $db->query("select * from drama where title = '$title'");	// 글 번호에 해당하는 레코드 검색
		if ($row = $query->fetch()) {		
			$title = $row["title"];
			$poster = $row["poster"];
			$genre = $row["genre"];
			$actor = $row["actor"];
			$director = $row["director"];
			$opening = $row["opening"];
			$plot = $row["plot"];
			$action = "update.php?page=$page";
		}
	}elseif(empty($title)){
	    $poster = "";
	    $genre = "";
	    $actor = "";
	    $director = "";
	    $opening = "";
	    $plot = "";
	    $action = "insert.php?page=$page";
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table { width:680px; text-align:center; }
        th    { width:100px; background-color:teal; color:white }
        input[type=text], textarea { width:100%; }
    </style>
</head>
<body>

<form method="post" action="<?=$action?>" enctype="multipart/form-data">
    <table>
        <tr>
            <th>제목</th>
            <td><input type="text" name="title" maxlength="20" value="<?=$title?>"></td>
        </tr>
        <tr>
            <th>포스터</th>
            <td><img src = '<?=$row["poster"]?>'style="height:500px"/></td>
        </tr>
		<tr>
            <th>장르</th>
            <td><input type="text" name="genre" maxlength="30" value="<?=$genre?>"></td>
        </tr>
		<tr>
            <th>배우</th>
            <td><input placeholder="배우가 여러 명일 경우 쉼표로 구분" type="text" name="actor" maxlength="50" value="<?=$actor?>"></td>
        </tr>
		<tr>
             <th>감독</th>
            <td><input type="text" name="director" maxlength="10" value="<?=$director?>"></td>
        </tr>
		<tr>
            <th>개봉일</th>
            <td><input type="text" name="opening" maxlength="10" value="<?=$opening?>"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="plot" rows="5"><?=$plot?></textarea></td>
        </tr>
    </table>

	포스터<br>
	<input type="file" name="poster" id="poster"><br><br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>