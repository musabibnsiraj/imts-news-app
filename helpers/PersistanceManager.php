<?php

require_once __DIR__.'../../config.php';

class PersistanceManager {

    private $pdo;

    public function __construct() {
        try {
            // echo "init connection<br/>";
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCount($query, $param = null) {
        $result = $this->executeQuery($query, $param, true);
        return $result['c'];
    }

    public function run($query, $param = null, $fetchFirstRecOnly = false) {
        return $this->executeQuery($query, $param, $fetchFirstRecOnly);
    }

    public function insertAndGetLastRowId($query, $param = null) {
        return $this->executeQuery($query, $param, true, true);
    }

    private function executeQuery($query, $param = null, $fetchFirstRecOnly = false, $getLastInsertedId = false) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($param);
            if ($getLastInsertedId) {
                return $this->pdo->lastInsertId();
            }
            if ($fetchFirstRecOnly)
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            else
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

}

?>