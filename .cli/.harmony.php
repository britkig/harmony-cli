<?php namespace CLI;
require_once \dirname( __DIR__).'/.harmony.php';
const Root=__DIR__;

function Log(string $message, ?string $group=null):void{
	echo \String\Format('%s	%s	%s',\date(\DATE_ISO8601), $group, $message).\PHP_EOL;
}

\spl_autoload_register(callback:function(string$_):void{
	if(\is_file($_=\implode(\System\DirSeparator,[Root,\strtolower($_).'.php'])))
		\System\SecureInclude($_);
	}, prepend:true);

\IO\Search($_, \String\JoinA(\System\DirSeparator, Root, '.function'), '/.*\.php$/', true);
foreach($_ as $a)
	\System\SecureInclude($a);

unset($_, $a);
