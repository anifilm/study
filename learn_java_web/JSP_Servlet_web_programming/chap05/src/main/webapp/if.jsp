<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
  <title>JSP 스크립트 Example</title>
</head>
<body>
  <h1>If-else Example</h1>
<%!
   String msg;
%>
<%
  // 인코딩 설정
  request.setCharacterEncoding("UTF-8");

  String name = request.getParameter("name");
  String color = request.getParameter("color");

  if (color.equals("blue")) {
      msg = "파란색";
  } else if (color.equals("red")) {
      msg = "붉은색";
  } else if (color.equals("orange")) {
      msg = "오렌지색";
  } else {
      color = "white";
      msg = "기타색";
  }
%>
  <b><%= name %></b>님이 좋아하는 색깔은 <span style="color: <%= color %>"><b><%= msg %></b></span>입니다.
</body>
</html>
