<?php
    $page = $_REQUEST["page"] ?? 1;
	$title = $_REQUEST["title"];    
	
	require("db_connect.php");
    require("style.php");

	$query = $db->query("select * from drama where title = '$title'");
	$row = $query->fetch()
?>   

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table { text-align:center;  }
        th    { width:100px; background-color:teal; color:white}
        td    { width:600px; text-align:left; border:1px solid gray; }
    </style>	
</head>
<body>
<table>
    <tr>
        <th>제목</th><td><?=$row["title"]?></td>
    </tr>
    <tr>
        <th>포스터</th><td><img src = '<?=$row["poster"]?>'style="height:500px"/>
        <br><a href="http://www.netflix.com/search?q=<?=$row["title"]?>" target='_blank'>보러가기</a></td>
    </tr>
    <tr>
        <th>장르</th>
        <td>
            <form method="post" action="dramalist.php">
            <?php 
                $b_list = explode(', ', $row["genre"]);
                for($i = 0; $i < count($b_list); $i++) {
            ?>
                    <input type="submit" name="genre" value="<?=$b_list[$i]?>">
            <?php
                }
            ?>
            </form>
        </td>
    </tr>
	<tr>
        <th>배우</th>
            <td>
                <?php 
                    $a_list = explode(', ', $row["actor"]);
                    for($i = 0; $i < count($a_list); $i++) {
                ?>
                        <a href="actor.php?a_name=<?=$a_list[$i]?>"><?=$a_list[$i]?></a>
                <?php
                    }
                    echo "외";
                ?>
            </td>
    </tr>
	<tr>
        <th>감독</th><td><a href="director.php?d_name=<?=$row["director"]?>"><?=$row["director"]?></a></td>
    </tr>
	<tr>
        <th>개봉일</th><td><?=$row["opening"]?></td>
    </tr>
	<tr>
        <th>내용</th><td><?=$row["plot"]?></td>
    </tr>
</table>

<br>
<input type="button" value="목록"     onclick="location.href='dramalist.php?page=<?=$page?>'">
<input type="button" value="수정"     onclick="location.href='d_write.php?title=<?=$title?>&page=<?=$page?>'">
<input type="button" value="삭제"     onclick="location.href='delete.php?title=<?=$title?>'">

</body>
</html>