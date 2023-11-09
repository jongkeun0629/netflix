<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
	require("db_connect.php");		// db 호출
    require("style.php");
?>
<div style="text-align:center">

<form method="post" action="result.php">  
    <select name="cate">
        <option value="drama">드라마</option>
        <option value="movie">영화</option>
        <option value="actor">배우</option>
        <option value="director">감독</option>
    </select>
	<input type="text" name="serch">
	<input type="submit" value="검색">
</form>


</div>
</body>
</html>