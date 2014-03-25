<?php
class Input {
	public static function get($attr, $default = NULL) {
		if (empty($_GET[$attr]))
			return $default;
		return $_GET[$attr];
	}
}
?>