<?php
if ($test) {
    echo '<div class="test">if</div>';
}
?>

<?php if($test): ?>
    <div class="test">if 대체 문법</div>
<?php endif ?>

<?php
$score = 80;
if($score == 100):
    echo '점수는 100점 입니다.';
elseif($score == 90):
    echo '점수는 90점 입니다.';
else:
    echo '점수는 90점 미만입니다.';
endif
?>
