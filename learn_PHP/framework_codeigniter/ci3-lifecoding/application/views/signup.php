<div class="modal fade" data-backdrop="static" data-keyboard="false" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>회원가입</h3>
			</div>
			<?= validation_errors(); ?>
			<form class="form-horizontal" action="/auth/signup" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="email">이메일</label>
						<input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
					</div>
					<div class="form-group">
						<label for="username">사용자명</label>
						<input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
					</div>
					<div class="form-group">
						<label for="password">비밀번호</label>
						<div class="controls">
							<input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="re_password">비밀번호 확인</label>
						<div class="controls">
							<input type="password" class="form-control" id="re_password" name="re_password" <?= set_value('re_password'); ?>>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
					<input type="submit" class="btn btn-primary" value="계정 생성" />
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	// 하위의 스크립트를 모두 로드한 이후에 다음을 실행하도록 구성
	// 부트스트랩 제이쿼리 스크립트가 Footer에 위치하기 때문
	window.onload = function() {
		$('#myModal').modal('show'); // 모달창 보여주기
	}
</script>
