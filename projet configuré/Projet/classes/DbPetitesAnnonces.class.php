<?php
namespace petitesAnnonces\DB;

class DbPetitesAnnonces extends \PDO{

    private static $instance;

    public function __construct(){
        parent:: __construct('mysql:host=localhost;dbname=mesannonces;charset=utf8mb4', 'root', '');
        $this->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new DbPetitesAnnonces();
        }
        return self::$instance;
    }

    public static function close(){
       self::$instance=null;
    }
}