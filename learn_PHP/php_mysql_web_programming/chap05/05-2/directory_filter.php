<?php

$dp = opendir(directory: '../__using_assets__/ch05');
//$file = readdir(dir_handle: $dp);
//echo $file.'<br>';

while(($file = readdir(dir_handle: $dp)) !== false) {
    if (fnmatch(pattern: '*', filename: $file, flags: FNM_CASEFOLD)) {
        echo '파일이름: '.$file.'<br>';
    }
}
closedir(dir_handle: $dp);

$list = glob(pattern: '../__using_assets__/ch05/*[Aa]rray*');
echo '<pre>';
print_r($list);
echo '</pre>';
