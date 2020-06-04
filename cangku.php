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
        <style type="text/css">
              td{font-sizeL:12px;}
        </style>
    </head><body>
    <p><button type="button" name="return" id="return">返回</button></p>
    <form id="search" name="search" method="post" action="cangku.php">
         <p>产品编号:<input type="text" id="thnum" name="thnum" value=""/>
         <input id="submitBin" name="submitBin" type="submit" value="查询" /></p>
         <p>存储编号:<input type="text" id="cunnum" name="cunnum" value=""/>
         <input id="deleteBin" name="deleteBin" type="submit" value="出库" /></p>
         <p>存储编号:<input type="text" id="存储编号" name="存储编号" value=""/>&emsp;
         产品编号:<input type="text" id="产品编号" name="产品编号" value=""/>&emsp;
         仓库编号:<input type="text" id="仓库编号" name="仓库编号" value=""/>&emsp;
         单价:<input type="text" id="单价" name="单价" value=""/>&emsp;
         生产日期:<input type="text" id="生产日期" name="生产日期" value=""/>&emsp;
         <input id="goinBin" name="goinBin" type="submit" value="入库" /></p>
   </form>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	window.location.href = "http://localhost/menu.php";
           });
    </script>
    <center><h2>仓库表单</h2>
    <style>body{background-image: url("cangkubg.jpg");}</style>
     <div class="ck">
            <table width="999" border="3 cellspacing="1" cellpadding="0">
	<tr>
	    <td height="25"align="center" >存储编号</td>
	    <td height="25"align="center" >产品编号</td>
	    <td height="25"align="center" >仓库编号</td>
	    <td height="25"align="center" >单价</td>
	    <td height="25"align="center" >生产日期</td>
	</tr>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$thing_num=$_POST['thnum'];
	$cunchu=$_POST['存储编号'];
	$chanpin=$_POST['产品编号'];
	$danjia=$_POST['单价'];
	$cangku=$_POST['仓库编号'];
	$riqi=$_POST['生产日期'];
	$cunchu_num=$_POST['cunnum'];
	if($thing_num=='')		$sql_1="SELECT * FROM 库存信息";
	else	$sql_1="SELECT * FROM 库存信息 WHERE 产品编号=$thing_num";
	$sql_2='';
	if(isset($_POST['goinBin'])){	
		if($chanpin=='' || $cunchu=='' || $cangku=='' || $danjia=='' || $riqi=='')   echo "<script>alert('请入库正确商品信息!')</script>";	
		else{	
			$sql_2="INSERT INTO 库存信息 VALUES ('$cunchu', '$chanpin', '$cangku', '$danjia', '$riqi')";
			echo "<script>alert('入库成功!')</script>";
		}
		if($sql_2!=''){
			$result_2=mysqli_query($link,$sql_2);
		}
	}
	$sql11='';
	if(isset($_POST['deleteBin'])){
		if($cunchu_num=='')	echo "<script>alert('请输入存储编号!')</script>";
		else{
			$sql_11="DELETE FROM 库存信息 WHERE 存储编号=$cunchu_num";
		}
		if($sql_11!=''){
			$result_11=mysqli_query($link,$sql_11);
		}
	}
	$result_1=mysqli_query($link,$sql_1);
	
	while($result_arr=mysqli_fetch_assoc($result_1)){
		$rss[]=$result_arr;
	}
	mysqli_close($link);
              ?>
	<?php for($i=0;$i<count($rss);$i++) { ?>
	<tr>
	    <td height="25"align="center" ><?php echo $rss[$i]['存储编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss[$i]['产品编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss[$i]['仓库编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss[$i]['单价']; ?></td>
	    <td height="25"align="center" ><?php echo $rss[$i]['生产日期']; ?></td>
	</tr>
	<?php } ?>
            </table></div></center>
    </body>
</html>

