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
    
    <title>My JSP 'answerlist.jsp' starting page</title>
    
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
    <b>
    User:<s:property value="username"/><a href="index.action">登出</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<s:url action="returnuser.action"><s:param name="username" value="username"></s:param></s:url>">主页</a>
    </b>
    <hr>
    <center><h1><b><s:property value="errorMessage"/></b></h1></center>
    <center>
    <s:form action="finished.action"> 
    <input type="hidden" name="username" value=${username}  />
  	<table border=1>
  	<s:iterator value="list" id="question" status="stuts">
  	 <tr>
  	 <td align="center">问题<s:property value="#stuts.index+1"/>：<s:property value="#question"/></td>
  	 </tr>
  	 <tr>
  	 <td align="center"><s:textfield name="%answer[#stuts.index]" /></td>
  	 </tr>
	</s:iterator>
	</table>
	<s:submit />
	</s:form>
	</center>
  </body>
</html>
