JSPStudy의 JSP & Servlet 웹프로그래밍 입문 + 활용


마지막 커밋 메시지
study jsp 2021-12-03

다음 학습 내용
JSPStudy - Chapter 5


JSP파일 out.println() cannot resolve method 오류 출력 수정 (pom.xml 의존성 추가)

<dependency>
  <groupId>org.apache.tomcat</groupId>
  <artifactId>tomcat-jsp-api</artifactId>
  <version>9.0.40</version>
</dependency>
