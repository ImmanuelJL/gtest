<?php

$str = '{[()]}';
// $str = '{[(])}';
// $str = '{(([])[])[]}';
// $str = '[()]{}{[()()]()}';
// $str = '[(])';

$arr = str_split($str);

$q = ['{', '(','['];
$w = ['}', ')',']'];

foreach ($arr as $keyChar => $char) {
	if (in_array($char, $q)) {
    	$keyQ = array_search($char, $q);

		if (in_array($arr[$keyChar+1], $w) && $arr[$keyChar+1] !== $w[$keyQ]) {
			echo 'NO';

    		return false;
		}
    }
}

echo 'YES';
