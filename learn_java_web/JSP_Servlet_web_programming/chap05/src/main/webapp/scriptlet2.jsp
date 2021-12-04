<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
  <title>JSP 스크립트 Example</title>
</head>
<body>
  <h1>Script Example2</h1>
<%
  float f = 2.3f;
  int i = Math.round(f);
  java.util.Date date = new java.util.Date();
%>
  실수 f의 반올림 값은? <%= i %><p>
  현재의 날짜와 시간은? <%= date.toString() %>
</body>
</html>
