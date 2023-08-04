IntelliJ Java Maven Spring 프로젝트 설정 방법

1. New Project

2. Maven

3. 프로젝트명 지정

[프로젝트 생성]


4. pom.xml dependency 추가

  <!-- xml에서 사용할 속성들 -->
  <properties>
    <maven.compiler.source>11</maven.compiler.source>
    <maven.compiler.target>11</maven.compiler.target>
    <!-- 스프링 버전 -->
    <org.springframework-version>5.1.9.RELEASE</org.springframework-version>
    <org.slf4j-version>1.7.26</org.slf4j-version>
    <ch.qos.logback-version>1.2.3</ch.qos.logback-version>
  </properties>

  <!-- 프로젝트에서 사용할 라이브러리 정보 -->
  <dependencies>
    <!-- spring context -->
    <dependency>
      <groupId>org.springframework</groupId>
      <artifactId>spring-context</artifactId>
      <version>${org.springframework-version}</version>
    </dependency>
    <!-- slf4j -->
    <dependency>
      <groupId>org.slf4j</groupId>
      <artifactId>slf4j-api</artifactId>
      <version>${org.slf4j-version}</version>
    </dependency>
    <!-- logback -->
    <dependency>
      <groupId>ch.qos.logback</groupId>
      <artifactId>logback-classic</artifactId>
      <version>${ch.qos.logback-version}</version>
      <exclusions>
        <exclusion>
          <groupId>org.slf4j</groupId>
          <artifactId>slf4j-api</artifactId>
        </exclusion>
      </exclusions>
      <scope>runtime</scope>
    </dependency>
  </dependencies>

[파일 수정 후]


5. pom.xml 오른 클릭 -> Maven -> Reload project 선택

6. 기본 폴더 및 파일 생성
    src / main / java / beans  ->  TestBean.java
                        config ->  beans.xml  (SpringConfig)
                        main   ->  Main.java

7. Resource Folders 설정 (File / Project Structure)
    Project Settings
        Modules
            프로젝트 명 선택
                config 폴더 선택 후 Resources 클릭하여 폴더 추가
                    (Main.java 에서 다음과 같이 사용 가능)
                    ClassPathXmlApplicationContext ctx = new
                        ClassPathXmlApplicationContext("beans.xml");
