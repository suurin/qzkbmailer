<?php
define('CHECK', true);
/*
* Timezone
* By default - GMT+0 (Eve Time)
*/
date_default_timezone_set('Europe/London');
/*
* PASSWORD_ENABLED - true of false, enables or disables the password check.
* PASSWORD_HASH - password that would be used to ensure that only official fc's can submit a kill. Also should help prevent spam.
* You should generate one using any online md5 hash generator (like that one http://www.miraclesalad.com/webtools/md5.php)
*/
define('PASSWORD_ENABLED', true);
define('PASSWORD_HASH', 'CHANGE_ME');
/*
* MAIL_TO - recipient email address
* MAILER_FROM - address of the mail bot (ie submit@thebombersbar.com)
* MAILER_NAME - bot name
* MAILER_SUBJECT - message subject
*/
define('MAIL_TO', 'CHANGE_ME');
define('MAILER_FROM', 'CHANGE_ME');
define('MAILER_NAME', 'BB Killboard');
define('MAILER_SUBJECT', '[BB Killboard] New kill submission');
/*
* SMTP settings
* SMTP_ADDRESS - SMTP server address
* SMTP_PORT - SMTP server port
* SMTP_USERNAME - SMTP auth username
* SMTP_PASSWORD - SMTP auth password
* SMTP_SECURITY - SMTP auth security
*/
define('SMTP_ADDRESS', 'CHANGE_ME');
define('SMTP_PORT', 25);
define('SMTP_USERNAME', 'CHANGE_ME');
define('SMTP_PASSWORD', 'CHANGE_ME');
define('SMTP_SECURITY', 'CHANGE_ME'); //ssl or tls