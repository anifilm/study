<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
  <title>JSP 스크립트 Example</title>
</head>
<body>
  <h1>Script Example1</h1>
<%!
  int one;
  String msgOne;
%>
<%
  int two = 31;
  String msgTwo = "Scriptlet Example";
%>
<%= two + " : " + msgTwo %><br>
<%= application.getRealPath("/") %>
</body>
</html>
