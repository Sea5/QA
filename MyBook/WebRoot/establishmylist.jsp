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
    
    <title>My JSP 'establishmylist.jsp' starting page</title>
    
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
  <s:form action="establishmylist" >
  <input type="hidden" name="username" value=${username}  />
  <table>
  <tr><td>题单名</td></tr>
   <tr><td><s:textfield name="listname"/></td></tr>
  	<tr><td>问题1:：</td></tr>
  	<tr><td><s:textfield name="question1"/></td></tr>
  	<tr><td>答案1:</td></tr>
  	<tr><td><s:textfield name="answer1"/></td></tr>
  	<tr><td>问题2:：</td></tr>
  	<tr><td><s:textfield name="question2"/></td></tr>
  	<tr><td>答案2:</td></tr>
  	<tr><td><s:textfield name="answer2"/></td></tr>
  	<tr><td>问题3:：</td></tr>
  	<tr><td><s:textfield name="question3"/></td></tr>
  	<tr><td>答案3:</td></tr>
  	<tr><td><s:textfield name="answer3"/></td></tr>
  	<tr><td>问题4:：</td></tr>
  	<tr><td><s:textfield name="question4"/></td></tr>
  	<tr><td>答案4:</td></tr>
  	<tr><td><s:textfield name="answer4"/></td></tr>
  	<tr><td>问题5:：</td></tr>
  	<tr><td><s:textfield name="question5"/></td></tr>
  	<tr><td>答案5:</td></tr>
  	<tr><td><s:textfield name="answer5"/></td></tr>
  	<tr><td>问题6:：</td></tr>
  	<tr><td><s:textfield name="question6"/></td></tr>
  	<tr><td>答案6:</td></tr>
  	<tr><td><s:textfield name="answer6"/></td></tr>
  	</table>
  <s:submit />
  </s:form>
  <s:form align="CENTER" action="returnuser.action" >
  <input type="hidden" name="username" value=${username}  />
  <s:submit value="Return"/></s:form>
  </center>
  </body>
</html>
