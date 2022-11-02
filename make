#!/usr/bin php
<?php
declare(strict_types=1);

require_once './vendor/makefile/index.php';

array_shift($argv);

try {
	echo (new \MakeFile\MakeFile($argv))->execute();	
} catch(\Exception $exception) {
	echo $exception->getMessage();
}