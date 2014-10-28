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
    
    <title>My JSP 'questionlistsearchresult.jsp' starting page</title>
    
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
    <center><s:property value="question"/></center>
    <center>
  <table border=1>
  <tr>
  <td>Question</td>
  <td>Answer</td>
  </tr>
  <s:iterator value="list" id="question" status="stuts">
  	 <tr>
  	 <td align="center"><s:property value="#question"/></td>
  	 <td align="center"><s:property value="%{answer[#stuts.index]}"/></td>
  	 </tr>
	</s:iterator>
	</table>
	<s:form align="CENTER" action="index.action" ><s:submit value="Return"/></s:form>
	</center>
  </body>
</html>
