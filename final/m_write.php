<?php	
    require("style.php");

    $page = $_REQUEST["page"];

	$m_title = $_REQUEST["m_title"] ?? "";	// 9줄과 동일. 값이 있으면 그대로 쓰고 없으면 0
	
	if($m_title){	// 글 번호(num)가 주어졌다면. 수정모드로 
		require("db_connect.php");	// db접속
		$query = $db->query("select * from movie where m_title = '$m_title'");	// 글 번호에 해당하는 레코드 검색
		if ($row = $query->fetch()) {		
			$m_title = $row["m_title"];
			$m_poster = $row["m_poster"];
			$m_genre = $row["m_genre"];
			$m_actor = $row["m_actor"];
			$m_director = $row["m_director"];
			$m_opening = $row["m_opening"];
			$m_plot = $row["m_plot"];
			$action = "update.php?page=$page";
		}
	}elseif(empty($m_title)){
        $m_poster = "";
        $m_genre = "";
        $m_actor = "";
        $m_director = "";
        $m_opening = "";
        $m_plot = "";
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
            <td><input type="text" name="m_title" maxlength="20" value="<?=$m_title?>"></td>
        </tr>
        <tr>
            <th>포스터</th>
            <td><img src = '<?=$row["m_poster"]?>'style="height:500px"/></td>
        </tr>
		<tr>
            <th>장르</th>
            <td><input type="text" name="m_genre" maxlength="30" value="<?=$m_genre?>"></td>
        </tr>
		<tr>
            <th>배우</th>
            <td><input placeholder="배우가 여러 명일 경우 쉼표로 구분" type="text" name="m_actor" maxlength="50" value="<?=$m_actor?>"></td>
        </tr>
		<tr>
             <th>감독</th>
            <td><input type="text" name="m_director" maxlength="10" value="<?=$m_director?>"></td>
        </tr>
		<tr>
            <th>개봉일</th>
            <td><input type="text" name="m_opening" maxlength="10" value="<?=$m_opening?>"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="m_plot" rows="5"><?=$m_plot?></textarea></td>
        </tr>
    </table>

	포스터<br>
	<input type="file" name="m_poster" id="m_poster"><br><br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>