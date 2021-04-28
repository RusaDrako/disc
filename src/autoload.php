<?php

namespace RusaDrako\disc;

$arr_load = [
	'/disc.php',
	'/folder.php',
	'/file.php',
];

foreach($arr_load as $k => $v) {
	require_once(__DIR__ . '/' . $v);
}



require_once('aliases.php');
