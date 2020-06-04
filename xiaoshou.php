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
    <form id="search1" name="search1" method="post" action="xiaoshou.php">
         <p>&emsp;流水号:<input type="text" id="xiaonum" name="xiaonum" value=""/>
         <input id="submitBin" name="submitBin" type="submit" value="查询" />
         <input id="deleteBin" name="deleteBin" type="submit" value="删除" /></p>
         <p>&emsp;流水号:<input type="text" id="销售单流水号" name="销售单流水号" value=""/>&emsp;
         &emsp;收银员:<input type="text" id="收银员工号" name="收银员工号" value=""/>&emsp;
         总金额:<input type="text" id="总金额" name="总金额" value=""/>&emsp;
         客户编号:<input type="text" id="客户编号" name="客户编号" value=""/>&emsp;
         客户类型:<input type="text" id="类型" name="类型" value=""/></p>
         <p>实收金额:<input type="text" id="实收金额" name="实收金额" value=""/>&emsp;
         销售日期:<input type="text" id="销售日期" name="销售日期" value=""/>&emsp;
         <input id="goinBin1" name="goinBin1" type="submit" value="添加" /></p>
   </form>
   <form id="search2" name="search2" method="post" action="mingxi1.php">
         <p>&emsp;流水号:<input type="text" id="xiaonum1" name="xiaonum1" value=""/>
         <input id="submitBin1" name="submitBin1" type="submit" value="查询明细" /></p>
    </form>
    <script>
         document.getElementById('return').addEventListener('click',function(){
	window.location.href = "http://localhost/menu.php";
           });
    </script>
    <body><center><h2>销售单信息</h2>
    <style>body{background-image: url("xiaoshoubg.jpg");}</style>
     <div class="ck">
            <table width="999" border="3 cellspacing="1" cellpadding="0">
	<tr>
	    <td height="25"align="center" >销售单流水号</td>
	    <td height="25"align="center" >收银员工号</td>
	    <td height="25"align="center" >总金额</td>
	    <td height="25"align="center" >客户编号</td>
	    <td height="25"align="center" >类型</td>
	    <td height="25"align="center" >实收金额</td>
	    <td height="25"align="center" >销售日期</td>
	</tr>
            <?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	$link=mysqli_connect("localhost","root","");
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,"company");
	$xiao_num=$_POST['xiaonum'];
	$liushui=$_POST['销售单流水号'];
	$syy=$_POST['收银员工号'];
	$zong=$_POST['总金额'];
	$kehu=$_POST['客户编号'];
	$leixing=$_POST['类型'];
	$shi=$_POST['实收金额'];
	$riqi=$_POST['销售日期'];
	$sql_33='';
	if($xiao_num=='')		$sql_3="SELECT * FROM 销售单信息";
	else{
		$sql_3="SELECT * FROM 销售单信息 WHERE 销售单流水号=$xiao_num";
	}
	$sql_4='';
	if(isset($_POST['goinBin1'])){	
		if($liushui=='' || $syy=='' || $zong=='' || $kehu=='' || $leixing=='' || $shi=='' || $riqi=='')   echo "<script>alert('请输入正确销售单信息!')</script>";	
		else{	
			$sql_4="INSERT INTO 销售单信息 VALUES ('$liushui', '$syy','$zong', '$kehu', '$leixing', '$shi','$riqi')";
		}
		if($sql_4!=''){
			$result_4=mysqli_query($link,$sql_4);
			echo "<script>window.location.href = 'http://localhost/add_xiao.php'</script>";
		}
	}
	$sql11='';
	$sql12='';
	if(isset($_POST['deleteBin'])){
		if($xiao_num=='')	echo "<script>alert('请输入流水号!')</script>";
		else{
			$sql_11="DELETE FROM 销售单信息 WHERE 销售单流水号=$xiao_num";
			$sql_12="DELETE FROM 销售明细 WHERE 销售单流水号=$xiao_num";
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
	    <td height="25"align="center" ><?php echo $rss1[$i]['销售单流水号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['收银员工号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['总金额']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['客户编号']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['类型']; ?></td>
	    <td height="25"align="center" ><?php echo $rss1[$i]['实收金额']; ?></td>
                    <td height="25"align="center" ><?php echo $rss1[$i]['销售日期']; ?></td>
	</tr>
	<?php } ?>
            </table>
            </div></center>
    </body>
</html>


