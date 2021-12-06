<form action="" method="POST">
  <input type="hidden" name="joke[id]" value="<?= $joke['id'] ?? '' ?>">
  <label for="joketext">유머 글을 입력해주세요: </label>
  <textarea id="joketext" name="joke[joketext]" cols="30" rows="10"><?= $joke['joketext'] ?? '' ?></textarea>
  <input type="submit" value="<?= $button ?>">
</form>
