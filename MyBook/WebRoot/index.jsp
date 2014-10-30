<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>
 <% request.setCharacterEncoding("utf-8");
response.setContentType("text/html;charset=utf-8");%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>Index page</title>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
  </head>
    <style type="text/css"> 
<!-- 
a:link { 
color: #000000; 
text-decoration: none; 
} 
a:visited { 
color: #000000; 
text-decoration: none; 
} 
a:hover { 
color: #999999; 
text-decoration: none; 
} 
--> 
</style>
  <body>
   <h1><b>Welcome to QA</b></h1>
  <hr>
    <center><h1><b><a href="chooselogin.action">login.</a></b></h1></center>
    <br>
    <center><h1><b><a href="choosesignup.action">sign up.</a></b></h1></center>
    <br />
  </body>
</html>
