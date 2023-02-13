<?php

require_once "Logger.php";
require_once __DIR__.'../../config.php';

class FileLogManager implements Logger
{
    public function log($log)
    {
        file_put_contents(LOG_PATH, date('y-m-d h:i:sa', time()) ." - ". $log."\n", FILE_APPEND);
    }
}

?>