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
    
    <title>My JSP 'atmeanswerlist.jsp' starting page</title>
    
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
  <center><h2><b>QA</b></h2></center>
    <hr><b>
   User:<s:property value="username"/><a href="index.action">登出</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<s:url action="returnuser.action"><s:param name="username" value="username"></s:param></s:url>">主页</a>
    </b><hr>
   <table border=1 align="CENTER">
    <tr>
    	<td>Num</td>
        <td>ListName</td>
  	</tr>
	<s:iterator value="list" id="listname" status="stuts">
  	 <tr>
  	 	<td><s:property value="#stuts.index+1" /></td>
		<td><a href="<s:url action="answerlist.action"><s:param name="listname" value="%{listname}"></s:param><s:param name="username" value="%{username}"></s:param></s:url>"><s:property value="listname"/></a></td>
  	 </tr>
	</s:iterator>
	</table>
  </body>
</html>
