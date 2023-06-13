<?php
	$q = [];

	foreach (range('a', 'z') as $w => $e){
		$q[$w+1] = $e;
	}

	$arr1 = [1, 3, 9, 8];
	$arr2 = [];
	$str = 'bbccc';

	foreach (str_split($str) as $keyChar => $char) {
	    $arr2[$keyChar] = $char;
	    
	    if ($keyChar > 0) {
	    	while (($keyChar-strlen(end($arr2)) != -1) && substr($arr2[$keyChar-strlen(end($arr2))], -1) === $char) {
				$arr2[$keyChar] .= $char;
		    }
	    }
	}

	$arr3 = [];

	foreach ($arr2 as $r => $t) {
		if (in_array(str_split($t)[0], $q)) {
			$arr3[$r] = array_search(str_split($t)[0], $q) * strlen($t);
		}
	}

	$result = [];

	foreach ($arr1 as $y => $u) {
		if (in_array($u, $arr3)) {
			$result[$y] = 'YES';
		} else {
			$result[$y] = 'NO';
		}
	}

	var_dump($result);
