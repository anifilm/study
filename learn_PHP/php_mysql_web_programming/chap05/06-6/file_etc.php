<?php

$filename = 'text.txt'; // 읽어들일 원본 파일명
echo filesize(filename: $filename).'<br>';

$path = '../__using_assets__/ch05/text.txt';
echo basename(path: $path, suffix: '.txt').'<br>';
echo dirname(path: $path);
