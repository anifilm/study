<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
  <title>JSP 스크립트 Example</title>
</head>
<body>
  <h1>Declaration Example1</h1>
<%
  String name = team + " Fighting!!!";
%>
<%!
  // 멤버변수 및 메서드를 선언하는 영역
  String team = "Korea";
%>
  출력되는 결과는? <%= name %>
</body>
</html>
