<?php
$con = mysql_connect('127.0.0.1', 'root', '')or die('could not connect to database');
mysql_select_db('honey',$con);
mysql_query("set names 'utf8'");
$name = mysql_real_escape_string($_POST['myname']);
$mail = mysql_real_escape_string($_POST['mymail']);
$comment = mysql_real_escape_string($_POST['comment']);
$i = $_POST['myclass'];
if($i%2==1){
	$class = 'odd';
}
else{
	$class = 'even';
}


if(mysql_query("insert into main values(null, '$name','$mail','$comment')")){
	echo '<div class="col-sm col-sm-3 '.$class.'">';
	echo   '<div class="com_name">'.$name.'</div>';
	echo   '<div class="com_mail">'.$mail.'</div>';
	echo   '<div class="com_comment">'.$comment.'</div>';
	echo '</div>';
}
else{
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
        exit();
}

mysql_close($con);


?>