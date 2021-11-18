<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('kdate')) {
    function kdate($stamp) {
        return date('Y-m-d H:i', strtotime($stamp));
    }
}
