<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<title>CI3 Todo App</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
				<li><a rel="external" href="/todo/index.php/main/lists/">Todo 애플리케이션 프로그램</a></li>
			</ul>
		</nav>
		<!-- gnb End -->

		<article id="board_area">
			<header>
				<h1>Todo 목록</h1>
			</header>
			<table cellspacing="0" cellpadding="0" class="table table-striped">
				<thead>
					<tr>
						<th scope="col">번호</th>
						<th scope="col">내용</th>
						<th scope="col">시작일</th>
						<th scope="col">종료일</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $lt): ?>
						<tr>
							<th scope="row">
								<?= $lt->id; ?>
							</th>
							<td>
                <a rel="external" href="/todo/index.php/main/view/<?= $lt->id; ?>"><?= $lt->content; ?></a>
              </td>
							<td>
                <time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->created_on)); ?>"><?= $lt->created_on; ?></time>
              </td>
							<td>
                <time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->due_date)); ?>"><?= $lt->due_date; ?></time>
              </td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4"><a href="/todo/index.php/main/write/" class="btn btn-primary">일정 추가</a></th>
					</tr>
				</tfoot>
			</table>
			<div>
				<p></p>
			</div>
		</article>

		<footer id="footer">
			<blockquote>
				<p><a class="azubu" href="http://www.cikorea.net/" target="blank">CodeIgniter 한국사용자포럼</a></p>
				<small>Copyright by <em class="black"><a href="mailto:advisor@cikorea.net">웅파</a></small>
				<blockquote>
		</footer>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" 	integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
