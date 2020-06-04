<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="control.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="content-language" content="zh-CN" />
        <meta name="robots" content="index,follow" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="rating" content="general" />
        <meta name="author" content="" />
        <meta name="copyright" content="" />
        <meta name="generator" content="" />
        <title></title>
    </head>
    <p><button type="button" name="return" id="return">返回</button></p>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	window.location.href = "http://localhost/xiaoshou.php";
           });
    </script>
    <body><center><h2>销售单明细</h2>
    <style>body{background-image: url("xiaoshoubg.jpg");}</style>
     <div class="ck">
            <table width="999" border="3 cellspacing="1" cellpadding="0">
	<tr>
	    <td height="25"align="center" >销售单流水号</td>
	    <td height="25"align="center" >产品编号</td>
	    <td height="25"align="center" >单价</td>
	</tr>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$xiaoshou_num=$_POST['xiaonum1'];
	$sql_4='';
	if(isset($_POST['submitBin1'])){	
		if($xiaoshou_num==''){
			echo "<script>alert('请输入正确销售单流水号!')</script>";
			echo "<script>window.location.href = 'http://localhost/xiaoshou.php'</script>";
		}	
		else{	
			$sql_4="SELECT * FROM 销售明细 WHERE 销售单流水号=$xiaoshou_num";
		}
		if($sql_4!=''){
			$result_4=mysqli_query($link,$sql_4);
		}
	}
	while($result_arr4=mysqli_fetch_assoc($result_4)){
		$rss4[]=$result_arr4;
	}
	mysqli_close($link);
              ?>
	<?php for($ii=0;$ii<count($rss4);$ii++) { ?>
	<tr>
	    <td height="25"align="center" ><?php echo $rss4[$ii]['销售单流水号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss4[$ii]['产品编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss4[$ii]['单价']; ?></td>
	</tr>
	<?php } ?>
            </table></div></center>
    </body>
</html>


