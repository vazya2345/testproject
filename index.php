<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<link rel="stylesheet" type="text/css" href="css/screen.css">

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
	<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">


	<title>Honey Hunter 111</title>
</head>

<body>
<div class="container">
	<div class="header">
		<div class="menu">
			<div class="logo">
				<a href="#"><img src="img/logo.png"></a>
			</div>
		</div>
		<div class="myform">
			<div class="image"></div>
			<div class="myform-content">
				<div class="row">
				  <div class="col-md-6">
				  	<p><label>Имя <span>*</span></label><br><input type="text" required="required" name="myname" id='myname' class="form-control" /></p>
				  	<p><label>Почта <span>*</span></label><br><input type="email" required="required" name="mymail" id='mymail' class="form-control" /></p>
				  </div>
				  <div class="col-md-5 offset-md-1"><label>Комментарий <span>*</span></label><br><textarea name='comment' id='comment' required="required" class="form-control"></textarea></div>
				</div>
				<div class="row">
				  <div class="col-md-2 offset-md-10">
				  	
				  	<button id='inpsubmit' class="col-md-12 btn btn-danger">Записать</button>
				  </div>
				</div>
				
			</div>
		</div>
	</div><!-- header -->




	


</div>


<div class="contentwhite">
	<div class="container">
		<h1>Выводим комментарии</h1>

		<div class="row" id='elements'>
			<?php
			// Вывод данных
			$con = mysql_connect('127.0.0.1', 'root', '')or die('could not connect to database');
			mysql_select_db('honey',$con);
			mysql_query("set names 'utf8'");
			$query = mysql_query("SELECT * FROM main");
			$i = 1;
			while($row = mysql_fetch_array($query))
			{
				if($i%2==1){
					$class = 'odd';
				}
				else{
					$class = 'even';
				}
				echo '<div class="col-sm col-sm-3 '.$class.'">';
			    echo   '<div class="com_name">'.$row['name'].'</div>';
			    echo   '<div class="com_mail">'.$row['email'].'</div>';
			    echo   '<div class="com_comment">'.$row['comment'].'</div>';
			    echo '</div>';
			    $i++;
			}

			mysql_close($con);

			echo '<input type="hidden" id="myclass" value="'.$i.'" />';

			?>
		    
		  </div>
	</div>
</div><!-- content -->

	<div id="footer" class='container'>
		<div class="menu">
			<div class="logo">
				<a href="#"><img src="img/logo.png"></a>

				<div class="social">
    				<a class="btn btn-social btn-vk"><span class="fa fa-vk"></span></a>
    				<a class="btn btn-social btn-facebook"><span class="fa fa-facebook"></span></a>
				</div>
			</div>
		</div>
	</div><!-- footer -->
</body>
</html>



<script type="text/javascript">

	$("#inpsubmit").click(function (e) {

        e.preventDefault();
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;



        var cl = $("#myclass").val();

        if($("#myname").val()==="") //simple validation
        {           
            $("#myname").css('border-color','red');
            return false;
        }

        if($("#mymail").val()==="" || !pattern.test($("#mymail").val())) //simple validation
        {          
        	$("#mymail").css('border-color','red');
            return false;
        }

        if($("#comment").val()==="") //simple validation
        {           
            $("#comment").css('border-color','red');
            return false;
        }


        


        var myData = "comment="+ $("#comment").val() +"&myname="+ $("#myname").val() +"&mymail="+ $("#mymail").val() +"&myclass="+cl; //post variables
        cl = +cl+1;
        jQuery.ajax({
            type: "POST",
            url: "addcomment.php",
            dataType:"text",
            data:myData,
            success:function(response){
            $("#elements").append(response);
            $("#myname").val(''); 
            $("#mymail").val(''); 
            $("#comment").val('');
            $("#myclass").val(cl);
            $("#myname").css('border-color','#ced4da');
            $("#mymail").css('border-color','#ced4da');
            $("#comment").css('border-color','#ced4da');
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });
    });



</script>