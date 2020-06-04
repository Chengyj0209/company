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
    <form id="search1" name="search1" method="post" action="customer.php">
         <p>客户编号:<input type="text" id="penum" name="penum" value=""/>
         <input id="submitBin" name="submitBin" type="submit" value="查询" />
         <input id="deleteBin" name="deleteBin" type="submit" value="删除" /></p>
         <p>客户编号:<input type="text" id="客户编号" name="客户编号" value=""/>&emsp;
         姓名:<input type="text" id="姓名" name="姓名" value=""/>&emsp;
         类型:<input type="text" id="类型" name="类型" value=""/>&emsp;
         联系电话:<input type="text" id="联系电话" name="联系电话" value=""/>&emsp;
         地址:<input type="text" id="地址" name="地址" value=""/>&emsp;
         <input id="goinBin1" name="goinBin1" type="submit" value="登记" /></p>
   </form>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	window.location.href = "http://localhost/menu.php";
           });
    </script>
    <body><center><h2>客户名单</h2>
    <style>body{background-image: url("kehubg.jpg");}</style>
     <div class="ck">
            <table width="999" border="3 cellspacing="1" cellpadding="0">
	<tr>
	    <td height="25"align="center" >客户编号</td>
	    <td height="25"align="center" >姓名</td>
	    <td height="25"align="center" >类型</td>
	    <td height="25"align="center" >联系电话</td>
	    <td height="25"align="center" >地址</td>
	</tr>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$people_num=$_POST['penum'];
	$kehu=$_POST['客户编号'];
	$xingming=$_POST['姓名'];
	$leixing=$_POST['类型'];
	$dianhua=$_POST['联系电话'];
	$dizhi=$_POST['地址'];
	if($people_num=='')		$sql_3="SELECT * FROM 客户信息";
	else	$sql_3="SELECT * FROM 客户信息 WHERE 客户编号=$people_num";
	$sql_4='';
	if(isset($_POST['goinBin1'])){	
		if($kehu=='' || $xingming=='' || $leixing=='' || $dianhua=='' || $dizhi=='')   echo "<script>alert('请输入正确客户信息!')</script>";	
		else{	
			$sql_4="INSERT INTO 客户信息 VALUES ('$kehu', '$xingming', '$leixing', '$dianhua', '$dizhi')";
			echo "<script>alert('登记成功!')</script>";
		}
		if($sql_4!=''){
			$result_4=mysqli_query($link,$sql_4);
		}
	}
	$sql11='';
	if(isset($_POST['deleteBin'])){
		if($people_num=='')	echo "<script>alert('请输入客户编号!')</script>";
		else{
			$sql_11="DELETE FROM 客户信息 WHERE 客户编号=$people_num";
		}
		if($sql_11!=''){
			$result_11=mysqli_query($link,$sql_11);
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
	    <td height="25"align="center" ><?php echo $rss1[$i]['客户编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['姓名']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['类型']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['联系电话']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['地址']; ?></td>
	</tr>
	<?php } ?>
            </table></div></center>
    </body>
</html>


