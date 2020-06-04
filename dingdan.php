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
    <form id="search1" name="search1" method="post" action="dingdan.php">
         <p>订单编号:<input type="text" id="dingnum" name="dingnum" value=""/>
         <input id="submitBin" name="submitBin" type="submit" value="查询" />
         <input id="deleteBin" name="deleteBin" type="submit" value="删除" /></p>
         <p>订单编号:<input type="text" id="订单编号" name="订单编号" value=""/>&emsp;
         总金额:<input type="text" id="总金额" name="总金额" value=""/>&emsp;
         订货日期:<input type="text" id="订货日期" name="订货日期" value=""/>&emsp;
         到货日期:<input type="text" id="到货日期" name="到货日期" value=""/>&emsp;
         客户编号:<input type="text" id="客户编号" name="客户编号" value=""/>&emsp;
         <input id="goinBin1" name="goinBin1" type="submit" value="添加" /></p>
   </form>
   <form id="search2" name="search2" method="post" action="mingxi.php">
         <p>订单编号:<input type="text" id="dingnum1" name="dingnum1" value=""/>
         <input id="submitBin1" name="submitBin1" type="submit" value="查询明细" /></p>
    </form>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	window.location.href = "http://localhost/menu.php";
           });
    </script>
    <body><center><h2>订单信息</h2>
    <style>body{background-image: url("bg.jpg");}</style>
     <div class="ck">
            <table width="999" border="3 cellspacing="1" cellpadding="0">
	<tr>
	    <td height="25"align="center" >订单编号</td>
	    <td height="25"align="center" >总金额</td>
	    <td height="25"align="center" >订货日期</td>
	    <td height="25"align="center" >到货日期</td>
	    <td height="25"align="center" >客户编号</td>
	</tr>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$ding_num=$_POST['dingnum'];
	$dingdan=$_POST['订单编号'];
	$jine=$_POST['总金额'];
	$ding=$_POST['订货日期'];
	$dao=$_POST['到货日期'];
	$kehu=$_POST['客户编号'];
	$sql_33='';
	if($ding_num=='')		$sql_3="SELECT * FROM 订单信息";
	else{
		$sql_3="SELECT * FROM 订单信息 WHERE 订单编号=$ding_num";
	}
	$sql_4='';
	if(isset($_POST['goinBin1'])){	
		if($dingdan=='' || $jine=='' || $ding=='' || $dao=='' || $kehu=='')   echo "<script>alert('请输入正确订单信息!')</script>";	
		else{	
			$sql_4="INSERT INTO 订单信息 VALUES ('$dingdan', '$jine', '$ding', '$dao', '$kehu')";
		}
		if($sql_4!=''){
			$result_4=mysqli_query($link,$sql_4);
			echo "<script>window.location.href = 'http://localhost/add_ding.php'</script>";
		}
	}
	$sql11='';
	$sql12='';
	if(isset($_POST['deleteBin'])){
		if($ding_num=='')	echo "<script>alert('请输入订单编号!')</script>";
		else{
			$sql_11="DELETE FROM 订单信息 WHERE 订单编号=$ding_num";
			$sql_12="DELETE FROM 订单明细 WHERE 订单编号=$ding_num";
		}
		if($sql_11!=''){
			$result_11=mysqli_query($link,$sql_11);
			$result_12=mysqli_query($link,$sql_12);
		}
	}
	$result_3=mysqli_query($link,$sql_3);
	while($result_arr1=mysqli_fetch_assoc($result_3)){
		$rss1[]=$result_arr1;
	}
	mysqli_close($link);
              ?>
	<?php for($i=0;$i<count($rss1);$i++) { ?>
	<tr>
	    <td height="25"align="center" ><?php echo $rss1[$i]['订单编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['总金额']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['订货日期']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['到货日期']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['客户编号']; ?></td>
	</tr>
	<?php } ?>
            </table>
            </div></center>
    </body>
</html>


