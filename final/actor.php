<?php
    $page = $_REQUEST["page"] ?? 1;
	$a_name = $_REQUEST["a_name"] ?? "";
	
	require("db_connect.php");
    require("style.php");
	
	$query = $db->query("select * from actor where a_name = '$a_name'");
    
	$row = $query->fetch()
?>   

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table { width:680px; text-align:center; }
        th    { width:100px; background-color:teal; color:white }
        td    { text-align:left; border:1px solid gray; }
    </style>	
</head>
<body>
<table>
    <tr>
        <th>이름</th><td><?=$row["a_name"]?></td>
    </tr>
	<tr>
        <th>사진</th><td><img src = '<?=$row["a_pic"]?>'style="height:500px"/></td>
    </tr>
    <tr>
        <th>출생</th><td><?=$row["a_birth"]?></td>
    </tr>
    <tr>
        <th>데뷔</th><td><?=$row["a_debut"]?></td>
    </tr>
	<tr>
        <th>드라마</th>
            <td>
                <?php 
                    $a_list = explode(', ', $row["a_drama"]);
                    for($i = 0; $i < count($a_list); $i++) {
                ?>
                        <a href="drama.php?title=<?=$a_list[$i]?>"><?=$a_list[$i]?></a>
                <?php
                    }
                ?>
            </td>
    </tr>
    <tr>
        <th>영화</th>
            <td>
                <?php 
                    $a_list = explode(', ', $row["a_movie"]);
                    for($i = 0; $i < count($a_list); $i++) {
                ?>
                        <a href="movie.php?m_title=<?=$a_list[$i]?>"><?=$a_list[$i]?></a>
                <?php
                    }
                ?>
            </td>
    </tr>
</table>

<br>
<input type="button" value="목록"   onclick="location.href='actorlist.php?page=<?=$page?>'">
<input type="button" value="수정"   onclick="location.href='a_write.php?a_name=<?=$a_name?>&page=<?=$page?>'">
<input type="button" value="삭제"   onclick="location.href='delete.php?a_name=<?=$a_name?>'">

</body>
</html>