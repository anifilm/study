<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// smtp 메일 서버 설정
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_timeout'] = '20';
$config['smtp_user'] = getenv('GMAIL_USERNAME');
$config['smtp_pass'] = getenv('GMAIL_PASSWORD');
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
