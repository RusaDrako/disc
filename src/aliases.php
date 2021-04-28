<?php

if (class_exists('RD_Disc', false)) { return; }

$classMap = [
	'RusaDrako\\disc\\disc'       => 'RD_Disc',
];

foreach ($classMap as $class => $alias) {
	class_alias($class, $alias);
}
