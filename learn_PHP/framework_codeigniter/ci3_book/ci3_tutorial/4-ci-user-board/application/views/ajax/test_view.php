<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<title>CodeIgniter Ajax Test</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<style>
		nav > ul li {
			/*list-style-type: none;*/
			display: inline-block;
			margin-right: 20px;
		}
	</style>
</head>
<body>
	<div id="main" class="container">
		<!-- Header Start -->
		<header id="header" data-role="header" data-position="fixed" class="mt-4">
			<blockquote>
				<p>만들면서 배우는 CodeIgniter</p>
				<small>실행 예제</small>
			</blockquote>
		</header>
		<!-- Header End -->

		<!-- gnb Start -->
		<nav id="gnb">
			<ul>
				<li><a rel="external" href="/board/lists">게시판 프로젝트</a></li>
				<li><a rel="external" href="/test">폼 검증 테스트</a></li>
			</ul>
		</nav>
		<!-- gnb End -->

		<div class="my-4">
			<form name="ajax_test" method="POST">
				<label for="name">이름</label>
				<input type="text" id="name" name="name" value="웅파">
				<input type="button" onclick="serverRequest()" value="전송">
			</form>
		</div>

		<div id="contents" class='my-4'>&nbsp;</div>

		<footer id="footer">
			<blockquote>
				<p><a class="azubu" href="http://www.cikorea.net/" target="blank">CodeIgniter 한국사용자포럼</a></p>
				<small>Copyright by <em class="black"><a href="mailto:advisor@cikorea.net">웅파</a></small>
			<blockquote>
		</footer>
	</div>

	<script src="/include/js/httpRequest.js"></script>
	<script>
		function serverRequest() {
			var csrf_token = getCookie('csrf_cookie_name');
			var name = 'name=' + encodeURIComponent(document.ajax_test.name.value) + '&csrf_test_name=' + csrf_token;
			sendRequest('/ajax_board/ajax_action', name, callback_hello, 'POST');
		}

		function callback_hello() {
			if (httpRequest.readyState == 4) {
				if (httpRequest.status == 200) {
					var contents = document.getElementById('contents');
					contents.innerHTML = httpRequest.responseText;
				}
			}
		}

		function getCookie(name) {
			var nameOfCookie = name + '=';
			var x = 0;

			while (x <= document.cookie.length) {
				var y = (x + nameOfCookie.length);

				if (document.cookie.substring(x, y) == nameOfCookie) {
					if ((endOfCookie = document.cookie.indexOf(';', y)) == -1) {
						endOfCookie = document.cookie.length;
					}

					return unescape(document.cookie.substring(y, endOfCookie));
				}

				x = document.cookie.indexOf(' ', x) + 1;

				if (x == 0) break;
			}

			return '';
		}
	</script>
</body>
</html>
