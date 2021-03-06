CREATE DATABASE php_ci_lifecoding CHARACTER SET utf8 COLLATE utf8_general_ci;
use php_ci_lifecoding;


CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

desc topic;

drop table topic;

SELECT * FROM topic;


INSERT INTO `topic` (title,description,created) VALUES ('JavaScript란', '<h2>자바스크립트는</h2><ul><li>브라우저에서 실행되는 언어</li><li>가장 많이 사용되는 언어</li><li>주로 html을 프로그래밍적으로 조작하기 위해서 사용됨</li></ul><h2>예제</h2><ul> <li>자바스크립트는 3가지 방식으로 사용됨</li><li>외부의 파일을 로드</li><li>&lt;script&gt;태그 사이에 기술</li><li>태그에 직접 기술</li></ul><h2>참고링크</h2><ul><li><a href="http://www.maroon.pe.kr/webmaster/java/java_study.html" target="_blank">스크립트 세상</a></li></ul>', now());

INSERT INTO `topic` (title,description,created) VALUES ('변수와 상수', '<p>변수란</p><ul><li>변하는 값</li><li>x = 10 일 때 왼쪽항인 x는 오른쪽 항인 10에 따라 다른 값이 지정된다.</li></ul><p>상수란</p><ul><li>변하지 않는 값</li><li>x = 10 일 때 오른쪽항인 10이 상수가 된다.</li></ul><pre class="brush: xml">&lt;script type=&quot;text/javascript&quot;&gt;&nbsp;&nbsp;&nbsp; // x의 값이 오른쪽 항에 따라서 변한다.&nbsp;&nbsp;&nbsp; // x가 변수라는 명시적인 의미&nbsp;&nbsp;&nbsp; var x = 10;&nbsp;&nbsp;&nbsp; alert(x);&nbsp;&nbsp;&nbsp; var x = 20;&nbsp;&nbsp;&nbsp; alert(x);&lt;/script&gt;</pre><p>&nbsp;</p>', now());

INSERT INTO `topic` (title,description,created) VALUES ('연산자', '<p>연산에 사용되는 기호들. (y = 5 일 때)</p><table class="table"><tbody><tr><th align="left" width="15%">Operator</th><th align="left" width="40%">Description</th><th align="left" width="25%">Example</th><th align="left" width="20%">Result</th></tr><tr><td valign="top">+</td><td valign="top">더하기</td><td valign="top">x=y+2</td><td valign="top">x=7</td></tr><tr><td valign="top">-</td><td valign="top">빼기</td><td valign="top">x=y-2</td><td valign="top">x=3</td></tr></tbody></table>', now());

INSERT INTO `topic` (title,description,created) VALUES ('JSON', '<h2>JSON이란?</h2><p>서로 다른 언어들간에 데이터를 주고 받는 여러 방법이 있다. 대표적인 것이 XML인데, XML은 문법이 복잡하고, 엄격한 표현규칙으로 인해서 json 대비 데이터의 용량이 커진다는 단점이 있다.</p><p>JSON은 경량의 데이터 교환 형식으로 JavaScript에서 숫자와 배열등을 만드는 형식을 차용해서 이것을 다른 언어에서도 사용할 수 있도록 한 텍스트 형식이다.&nbsp;</p><p>아래 예제는 위의 예제에서 전송한 데이터를 받아서 몇가지 부가정보를 추가해서 json으로 인코드한 후에 다시 반환하는 PHP 코드다.&nbsp;</p><p>json.php - (<a href="https://github.com/egoing/codingeverybody_javascript/blob/master/JSON/json.php" target="_blank">github</a>)</p><pre class="brush: php">&lt;?php$userinfo = json_decode($_GET[&#39;data&#39;]);$userinfo-&gt;address = &#39;seoul&#39;;$userinfo-&gt;phonenumber = &#39;01023456789&#39;;echo json_encode($userinfo);?&gt;</pre><h2>json의 형식</h2><h3>object</h3><p>객체는 아래와 같은 문법을 가지고 있다.</p><p>예제</p><p>{&quot;userid&quot;:&quot;egoing&quot;,&quot;pwd&quot;:&quot;12345567&quot;}</p><p><img src="https://www.json.org/img/object.png" width="598" /></p><h3>array</h3><p>배열은 아래와 같은 문법을 가지고 있다.&nbsp;</p><p>예제</p><p>[1,2,3,4]</p><p><img src="https://www.json.org/img/array.png" style="line-height: 1.8em;" width="598" /></p><h3>Value</h3><p>위에서 사용된 Value는 값을 의미하는데&nbsp;큰 따옴표로 묶인 문자나 숫자, 불린 값이 사용된다.</p><p>예제</p><ul><li>문자 : &quot;헬로우 월드&quot;</li><li>숫자 : 1</li> <li>불린 : true</li></ul><p><img src="https://www.json.org/img/value.png" width="598" /></p>', now());


CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_idx` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
