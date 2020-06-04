<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <style>
	body{background-image: url("sign in.jpg");}
          </style>
    </head>
    <body>
        <form name="login">
            <center>
            <h1>企业小管家</h1>
            <p>用户名:<input type="text"  id="username" value=""/><br/></p>
            <p>密&emsp;码:<input type="password"  id="password" value=""/><br/></p>
            <p><button type="button" name="lurker" id="lurker">登录</button></p>
            </center>
        </form>
    </body>
    <script>
         document.getElementById('lurker').addEventListener('click',function(){
	var username= document.getElementById("username").value;
	var password= document.getElementById("password").value;
	if(username=="root" && password=="root"){
		window.location.href = "http://localhost/menu.php";
	}
	else{
		alert("用户名或密码错误！");
	}
           });
    </script>
</html>
