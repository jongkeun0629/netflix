<?php	
    require("style.php");

    $page = $_REQUEST["page"];

	$d_name = $_REQUEST["d_name"] ?? "";	// 9줄과 동일. 값이 있으면 그대로 쓰고 없으면 0
	
	if($d_name){	// 글 번호(num)가 주어졌다면. 수정모드로 
		require("db_connect.php");	// db접속
		$query = $db->query("select * from director where d_name = '$d_name'");	// 글 번호에 해당하는 레코드 검색
		if ($row = $query->fetch()) {		
			$d_name = $row["d_name"];
			$d_pic = $row["d_pic"];
			$d_birth = $row["d_birth"];
			$d_debut = $row["d_debut"];
			$d_drama = $row["d_drama"];
            $d_movie = $row["d_movie"];
			$action = "update.php?page=$page";
		}
	}elseif(empty($d_name)){
        $d_pic = "";
        $d_birth = "";
        $d_debut = "";
        $d_drama = "";
        $d_movie = "";
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
            <th>이름</th>
            <td><input type="text" name="d_name" maxlength="10" value="<?=$d_name?>"></td>
        </tr>
        <tr>
            <th>사진</th>
            <td><img src = '<?=$row["d_pic"]?>'style="height:500px"/></td>
        </tr>
		<tr>
            <th>출생</th>
            <td><input type="text" name="d_birth" maxlength="10" value="<?=$d_birth?>"></td>
        </tr>
		<tr>
            <th>데뷔</th>
            <td><input type="text" name="d_debut" maxlength="50" value="<?=$d_debut?>"></td>
        </tr>
		<tr>
            <th>드라마</th>
            <td><input placeholder="작품이 여러 개일 경우 쉼표로 구분" type="text" name="d_drama" maxlength="50" value="<?=$d_drama?>"></td>
        </tr>
        <tr>
            <th>영화</th>
            <td><input placeholder="작품이 여러 개일 경우 쉼표로 구분" type="text" name="d_movie" maxlength="50" value="<?=$d_movie?>"></td>
        </tr>
    </table>

	사진<br>
	<input type="file" name="d_pic" id="d_pic"><br><br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>