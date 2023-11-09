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
	장르
	<select name="m_genre">
		<option value="">전체</option>
		<option value="액션">액션</option>
		<option value="스릴러">스릴러</option>
		<option value="범죄">범죄</option>
		<option value="로맨스">로맨스</option>
		<option value="시대극">시대극</option>
        <option value="좀비">좀비</option>
	</select>
	개봉일
	<select name="m_opening">
		<option value="desc">최신순</option>
		<option value="asc">과거순</option>
	</select>
	<input type="submit" value="정렬">
</div>
</form>
<?php
	$listSize = 4;		// 한 페이지에 나올 게시글 수
	
	$page = $_REQUEST["page"] ?? 1;		// 값이 있으면 page 불러옴, 없으면 1페이지
	
	$start = ($page - 1) * $listSize;	// 레코드 번호는 0부터 시작	
	
	$m_genre = $_POST['m_genre'] ?? "";
	$m_opening = $_POST['m_opening'] ?? "desc";

	require("db_connect.php");		// db 호출
	require("style.php");

	$query = $db->query("select * from movie where m_genre like '%$m_genre%' order by m_opening $m_opening limit $start, $listSize");
	
    while ($row = $query->fetch()) {
?>
<div style="text-align:center; margin-top:100px">
	<div style="float: left; width: 25%; margin-bottom: 50px">
		<a href="movie.php?m_title=<?=$row["m_title"]?>&page=<?=$page?>"><img src = '<?=$row["m_poster"]?>'style="height:450px"/><br><?=$row["m_title"]?></a>
	</div>
</div>
<?php
	}	// while
?>


<div style="position: absolute; left: 2%; top: 90%">
<a href="m_write.php?page=<?=$page?>">작품 추가</a>
</div>

<div style="position: absolute; left: 50%; top: 90%">
<?php

	$paginationSize = 5;		// 한 번에 보일 페이지 수 
	
	$firstLink = floor(($page - 1) / $paginationSize) * $paginationSize + 1;
	$lastLink = $firstLink + $paginationSize - 1;
	
	$query = $db->query("select count(*) from movie");
	$row = $query->fetch();
	$numRecords = $row[0];
	// $numRecords = $db->query("select count(*) from drama")->fetch()[0];	// 위 세줄과 동일
	$numPages = ceil($numRecords / $listSize);
	
	if ($lastLink > $numPages){
		$lastLink = $numPages;
	}
	
	if($firstLink > 1){
		$link = $firstLink - 1;
		echo "<a href=\"movielist.php?page=$link\">이전 </a>";
	}
	
	for($i = $firstLink; $i <= $lastLink; $i++){
		if($i == $page){
			echo "<a href=\"movielist.php?page=$i\"><u>$i</u></a>";
		}else{
			echo "<a href=\"movielist.php?page=$i\"> $i </a>";
		}
	}
	
	if($lastLink < $numPages){
		$link = $lastLink + 1;
		echo "<a href=\"movielist.php?page=$link\"> 다음</a>";
	}
	
?>
</div>

</body>
</html>