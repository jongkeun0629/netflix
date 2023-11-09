<?php	
	require("style.php");

    $page = $_REQUEST["page"];
    
	$a_name = $_REQUEST["a_name"] ?? "";	// 9줄과 동일. 값이 있으면 그대로 쓰고 없으면 0
	
	if($a_name){	// 글 번호(num)가 주어졌다면. 수정모드로 
		require("db_connect.php");	// db접속
		$query = $db->query("select * from actor where a_name = '$a_name'");	// 글 번호에 해당하는 레코드 검색
		if ($row = $query->fetch()) {		
			$a_name = $row["a_name"];
			$a_pic = $row["a_pic"];
			$a_birth = $row["a_birth"];
			$a_debut = $row["a_debut"];
			$a_drama = $row["a_drama"];
            $a_movie = $row["a_movie"];
			$action = "update.php?page=$page";
		}
	}elseif(empty($a_name)){
        $a_pic = "";
        $a_birth = "";
        $a_debut = "";
        $a_drama = "";
        $a_movie = "";
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
            <td><input type="text" name="a_name" maxlength="10" value="<?=$a_name?>"></td>
        </tr>
        <tr>
            <th>사진</th>
            <td><img src = '<?=$row["a_pic"]?>'style="height:500px"/></td>
        </tr>
		<tr>
            <th>출생</th>
            <td><input type="text" name="a_birth" maxlength="10" value="<?=$a_birth?>"></td>
        </tr>
		<tr>
            <th>데뷔</th>
            <td><input type="text" name="a_debut" maxlength="50" value="<?=$a_debut?>"></td>
        </tr>
		<tr>
            <th>드라마</th>
            <td><input placeholder="작품이 여러 개일 경우 쉼표로 구분" type="text" name="a_drama" maxlength="50" value="<?=$a_drama?>"></td>
        </tr>
        <tr>
            <th>영화</th>
            <td><input placeholder="작품이 여러 개일 경우 쉼표로 구분" type="text" name="a_movie" maxlength="50" value="<?=$a_movie?>"></td>
        </tr>
    </table>

    사진<br>
	<input type="file" name="a_pic" id="a_pic"><br><br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>