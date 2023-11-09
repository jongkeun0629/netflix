<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table     { width:100%; text-align:center; }
		td    	  { text-align:center; } 
    </style>	
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>"> 
<div style="left: 2%; margin-bottom: 20px">
	이름
	<select name="name">
		<option value="asc">오름차순</option>
		<option value="desc">내림차순</option>
	</select>
	<input type="submit" value="정렬">
</div>
</form>
<?php
	$listSize = 4;		// 한 페이지에 나올 게시글 수
	
	$page = $_REQUEST["page"] ?? 1;		// 값이 있으면 page 불러옴, 없으면 1페이지
	
	$start = ($page - 1) * $listSize;	// 레코드 번호는 0부터 시작	
	
	$name = $_POST['name'] ?? "";

	require("db_connect.php");		// db 호출
	require("style.php");

	$query = $db->query("select * from director order by d_name $name limit $start, $listSize");

	while ($row = $query->fetch()) {
?> 
<div style="text-align:center; margin-top:100px">
	<div style="float: left; width: 25%; margin-bottom: 50px">
		<a href="director.php?d_name=<?=$row["d_name"]?>&page=<?=$page?>"><img src = '<?=$row["d_pic"]?>'style="height:450px"/></a><br><?=$row["d_name"]?>
	</div>
</div>
<?php
	}	// while
?>

<div style="position: absolute; left: 2%; top: 90%">
<a href="di_write.php?page=<?=$page?>">감독 추가</a>
</div>

<div style="position: absolute; left: 50%; top: 90%">
<?php

	$paginationSize = 4;		// 한 번에 보일 페이지 수 
	
	$firstLink = floor(($page - 1) / $paginationSize) * $paginationSize + 1;
	$lastLink = $firstLink + $paginationSize - 1;
	
	$query = $db->query("select count(*) from director");
	$row = $query->fetch();
	$numRecords = $row[0];
	$numPages = ceil($numRecords / $listSize);
	
	if ($lastLink > $numPages){
		$lastLink = $numPages;
	}
	
	if($firstLink > 1){
		$link = $firstLink - 1;
		echo "<a href=\"diretorlist.php?page=$link\">이전 </a>";
	}
	
	for($i = $firstLink; $i <= $lastLink; $i++){
		if($i == $page){
			echo "<a href=\"diretorlist.php?page=$i\"><u>$i</u></a>";
		}else{
			echo "<a href=\"diretorlist.php?page=$i\"> $i </a>";
		}
	}
	
	if($lastLink < $numPages){
		$link = $lastLink + 1;
		echo "<a href=\"diretorlist.php?page=$link\"> 다음</a>";
	}
	
?>

</div>

</body>
</html>