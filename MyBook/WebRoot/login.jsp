<%@ page language="java" import="java.util.*" pageEncoding="ISO-8859-1"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>
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
    <h1><b>Log in</b></h1>
  <hr>
   <center><h1><b><s:property value="errorMessage"/></b></h1></center>
  <center>
  <s:form action="login">
  	<table>
  	<tr><td>User Name:</td></tr>
  	<tr><td><s:textfield name="username"/></td></tr>
  	<tr><td>Pass Word:</td></tr>
  	<tr><td><s:textfield name="password"/></td></tr>
  	</table>
  <s:submit />
  </s:form>
  <s:form align="CENTER" action="index.action" ><s:submit value="Return"/></s:form>
  </center>
  </body>
</html>
