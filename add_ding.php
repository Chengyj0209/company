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
    <body><center><h2>登记账单流水</h2>
    <style>body{background-image: url("bg.jpg");}</style>
    <form id="search1" name="search1" method="post" action="add_ding.php">
         <p>流水号:<input type="text" id="流水号" name="流水号" value=""/>&emsp;
         订单编号:<input type="text" id="订单编号" name="订单编号" value=""/>&emsp;
         产品编号:<input type="text" id="产品编号" name="产品编号" value=""/>&emsp;
         单价:<input type="text" id="单价" name="单价" value=""/>&emsp;
         <input id="goinBin1" name="goinBin1" type="submit" value="登记" /></p>
   </form></center>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$liushui=$_POST['流水号'];
	$dingdan=$_POST['订单编号'];
	$chanpin=$_POST['产品编号'];
	$danjia=$_POST['单价'];
	$sql_4='';
	if(isset($_POST['goinBin1'])){	
		if($liushui=='' || $dingdan=='' || $chanpin=='' || $danjia=='')   echo "<script>alert('请输入正确流水单信息!')</script>";	
		else{	
			$sql_4="INSERT INTO 订单明细 VALUES ('$liushui', '$dingdan', '$chanpin', '$danjia')";
		}
		if($sql_4!=''){
			$result_4=mysqli_query($link,$sql_4);
		}
	}
	mysqli_close($link);
              ?>
    <center><p><button type="button" name="return" id="return">登记完成</button></p></center>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	alert('添加成功!');
	window.location.href = "http://localhost/dingdan.php";
           });
    </script>
    </body>
</html>


