<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<div class="row mt-5 mb-3">
		<div class="mr-auto ml-3">
			<?php if($this->session->userdata('logged_in') == TRUE): ?>
			<a href="/sns/upload_photo" class="btn btn-primary">새로운 글 작성</a>
			<?php else: ?>
			<a href="/sns/upload_photo" class="btn btn-secondary">새로운 글 작성</a>
			<?php endif ?>
		</div>
		<!--<form id="bd_search" method="GET" class="form-inline my-2 my-lg-0">-->
		<?php
		// CSRF 적용
		$attributes = array('class' => 'form-inline my-2 my-lg-0', 'id' => 'bd_search');
		echo form_open('', $attributes);
		?>
			<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q)" placeholder="Search..." class="form-control mr-sm-2">
			<input type="button" value="검색" id="search_btn" class="btn btn-outline-success my-2 mr-3 my-sm-0">
		</form>
	</div>
	<table cellspacing="0" cellpadding="0" class="table">
		<tbody>
			<tr class="wrdLatest">
			<?php
			$i = 1;
			foreach ($list as $lt):
				$file_info = explode('.', $lt->file_name);
				if (is_file('./static/uploads/'.$file_info[0].'_thumb.'.$file_info[1])) {
					$thumb_img = '/static/uploads/'.$file_info[0].'_thumb.'.$file_info[1];
				}
				else {
					$thumb_img = '/static/uploads/'.$lt->file_name;
				}
			?>
				<th scope="row">
					<a rel="external" href="/sns/view/<?= $lt->id ?>"><img src="<?= $thumb_img ?>" width="300px"></a><br>
					<a rel="external" href="/sns/view/<?= $lt->id ?>"><?= $lt->subject ?></a><br>
					<time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->reg_date)) ?>"><?= date('Y-m-d H:i', human_to_unix($lt->reg_date)) ?></time>
				</th>
			<?php
				if ($i % 2 == 0):
			?>
			</tr>
			<tr class="wrdLatest" id="<?= $i ?>">
			<?php
				endif;
				$i++;
			endforeach;
			?>
			</tr>

			<?php if (!$list): ?>
			<tr>
				<th colspan="5">
					검색 결과가 없습니다.
				</th>
			</tr>
			<?php endif ?>
		</tbody>
	</table>
	<div class="text-center" id="lastPostsLoader"></div>
</article>

<script>
	function board_search_enter(form) {
		var keycode = window.event.keyCode;
		if (keycode == 13) $('#search_btn').click();
	}

	function lastPostFunc()	{
		var last_id = $('.wrdLatest:last').attr('id') ;

		$('div#lastPostsLoader').html('<img src="/static/images/bigLoader.gif">');
		$.post('/ajax_board/more_list/' + last_id, function (data) {
			if (data != '') {
				$('.wrdLatest:last').after(data);
			}
			$('div#lastPostsLoader').empty();
		});
	}

	// 하위의 스크립트를 모두 로드한 이후에 다음을 실행하도록 구성
	// 부트스트랩 제이쿼리 스크립트가 Footer에 위치하기 때문
	window.onload = function () {
		$(document).ready(function () {
			$('#search_btn').click(function () {
				if ($('#q').val() == '') {
					alert('검색어를 입력하세요.');
					return false;
				} else {
					// 특수문자 제거
					var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;
					var word = $('#q').val().replace(regExp, '');

					var act = '/sns/lists/q/' + word + '/';
					$('#bd_search').attr('action', act).submit();
				}
			});
		});

		$(window).scroll(function () {
			if (Math.round($(window).scrollTop()) == $(document).height() - $(window).height()) {
				// jQuery POST 호출시 csrf 적용 필요
				//lastPostFunc();
			}
		});
	}
</script>
