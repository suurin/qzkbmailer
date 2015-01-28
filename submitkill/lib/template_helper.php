<?php
if(!defined('CHECK'))
	die('403');

function render($path, $data) {
	ob_start();
		include(dirname(dirname(__FILE__)).'/'.$path);
		$rendered = ob_get_contents();
	ob_end_clean();

	return $rendered;
}

function startsWith($haystack, $needle) {
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}