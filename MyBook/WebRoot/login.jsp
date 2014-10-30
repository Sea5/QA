<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>
 <% request.setCharacterEncoding("utf-8");
response.setContentType("text/html;charset=utf-8");%>
<%@ taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>Log in</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

  </head>
  
   <body>
  <center><h2><b>QA</b></h2></center>
    <hr>
    <b>Log in</b>
  <hr>
   <center><b><s:property value="errorMessage"/></b></center>
  <center>
  <s:form action="login">
  	<table>
  	<tr><td>User Name:</td></tr>
  	<tr><td><s:textfield name="username"/></td></tr>
  	<tr><td>Pass Word:</td></tr>
  	<tr><td><s:password name="password"/></td></tr>
  	</table>
  <s:submit />
  </s:form>
  <s:form align="CENTER" action="index.action" ><s:submit value="Return"/></s:form>
  </center>
  </body>
</html>
