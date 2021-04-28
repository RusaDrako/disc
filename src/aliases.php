<?php

if (class_exists('RD_Obj_Disc', false)) { return; }

$classMap = [
	'RusaDrako\\disc\\disc'       => 'RD_Obj_Disc',
];

foreach ($classMap as $class => $alias) {
	class_alias($class, $alias);
}
