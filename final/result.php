<?php
    $cate = $_POST['cate'];
    $serch = $_POST['serch'];

    require("db_connect.php");
    require("style.php");
    
    if($cate == "actor"){
        $query = $db->query("select * from actor where a_name like '%$serch%'");
        while ($row = $query->fetch()) {
?>   
<div style="text-align:center; margin-top:100px">
    <div style="float: left; width: 25%;">
        <a href="actor.php?a_name=<?=$row["a_name"]?>"><img src = '<?=$row["a_pic"]?>'style="height:450px"/></a><br><?=$row["a_name"]?>
    </div>
</div>
<?php
        }
    }elseif($cate == "drama"){
        $query = $db->query("select * from drama where title like '%$serch%'");
        while ($row = $query->fetch()) {
    ?>
<div style="text-align:center; margin-top:100px">   
    <div style="float: left; width: 25%;">
        <a href="drama.php?title=<?=$row["title"]?>"><img src = '<?=$row["poster"]?>'style="height:450px"/></a><br><?=$row["title"]?>
    </div>
</div>
<?php
       }
    }elseif($cate == "movie"){
        $query = $db->query("select * from movie where m_title like '%$serch%'");
        while ($row = $query->fetch()) {
    ?>
<div style="text-align:center; margin-top:100px">   
    <div style="float: left; width: 25%;">
        <a href="movie.php?m_title=<?=$row["m_title"]?>"><img src = '<?=$row["m_poster"]?>'style="height:450px"/></a><br><?=$row["m_title"]?>
    </div>
</div>
<?php
       }
    }elseif($cate == "director"){
        $query = $db->query("select * from director where d_name like '%$serch%'");
        while ($row = $query->fetch()) {
    ?>
<div style="text-align:center; margin-top:100px">   
    <div style="float: left; width: 25%;">
        <a href="director.php?d_name=<?=$row["d_name"]?>"><img src = '<?=$row["d_pic"]?>'style="height:450px"/></a><br><?=$row["d_name"]?>
    </div>
</div>
<?php
       }
    }
    
    if(empty($serch)){
?>
<script>
	alert("한 글자 이상 입력하세요.");
	history.back();
</script>
<?php        
    }
?>
<div style="position: absolute; left: 2%; top: 90%">
    <input type="button" value="뒤로" onclick="history.back()">
</div>