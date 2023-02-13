<?php

require_once "Logger.php";
require_once "PersistanceManager.php";

class DBLogManager implements Logger
{
    private $pm;

    public function __construct($pm)
    {
        $this->pm = $pm;
    }

    public function log($log)
    {
        $param = array(':log' => $log);
        return $this->pm->run("INSERT INTO Logs(log) values(:log)", $param);
    }
}

?>