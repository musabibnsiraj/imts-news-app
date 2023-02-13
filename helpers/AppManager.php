<?php

require_once __DIR__.'../../config.php';
require_once 'PersistanceManager.php';

// application manager
class AppManager {

    private static $pm; // persistance manager
    private static $sm; // session manager
    private static $lm; // log manager

    // get persistance manager
    public static function getPM() {
        if (self::$pm === null) {
            include_once 'PersistanceManager.php';
            self::$pm = new PersistanceManager();
        }
        return self::$pm;
    }

    // get session manager
    public static function getSM() {
        if (self::$sm === null) {
            include_once 'SessionManager.php';
            self::$sm = new SessionManager();
        }
        return self::$sm;
    }

    public static function getLogManager()
    {
        $mode = LOG_MODE;
        if(self::$lm === null)
        {
            if($mode == "db")
            {
                include_once 'DBLogManager.php';
                include_once 'PersistanceManager.php';
                self::$pm = new PersistanceManager();
                self::$lm = new DBLogManager(self::$pm);
            }
            else
            {
                include_once 'FileLogManager.php';
                self::$lm = new FileLogManager();
            }
        }
        return self::$lm;
    }

}
