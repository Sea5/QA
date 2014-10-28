<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>
<%@ taglib prefix="s" uri="/struts-tags" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>My JSP 'user.jsp' starting page</title>
    
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
    <center><h1><b><s:property value="errorMessage"/></b></h1></center>
    <br>
    User:<s:property value="username"/>
    <hr>
    <center>
    	<h1><b>
    	
    	<a href="<s:url action="seemyquestionlist.action"><s:param name="username" value="username"></s:param></s:url>">我发布的题单.</a><br>
    	<a href="seemyanswerlist.action">我回答的题单.</a><br>
    	<a href="<s:url action="chooseestablishmylist"><s:param name="username" value="username"></s:param></s:url>">发布新题单.</a><br>
    	
    	</b></h1>
    	<s:form align="CENTER" action="index.action" ><s:submit value="Return"/></s:form>
    </center>
  </body>
</html>
