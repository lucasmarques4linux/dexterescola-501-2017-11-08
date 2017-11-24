<?php 

namespace Log\LogTrait;

trait LogTrait
{
	public function log($log){
		file_put_contents('Log/log.txt', date('d/m/Y H:i:s') . " : {$log}" . PHP_EOL , FILE_APPEND);
	}
}