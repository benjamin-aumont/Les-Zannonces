<?php
namespace petitesAnnonces;

class Entity {
    protected $tableName;
    protected $pkName;
    protected $values;

    protected static function underscore($s){
        $str=preg_replace('/[A-Z]/','_$0',$s);
        $str=strtolower($str);
        $champs=substr($str,4);
        return $champs;

    }

    public function __construct($tableName, $pkName){
        $this->tableName = $tableName;
        $this->pkName = $pkName;
        $this->values = [];

    }

    public function hydrate($values){
        $this->values = $values;
    }

    public function __call($method, $params){
        $type = substr($method, 0, 3);
        if($type == 'get') {
            return $this->values[self::underscore($method)];
        }
        
        elseif($type == 'set'){
            $this->values[self::underscore($method)] = $params[0];
        } 
    }

    public function save(){
        
        $bdd = DB\DbPetitesAnnonces::getInstance();
        $requete = "INSERT INTO ".$this->tableName."(".implode(",",array_keys($this->values)).") 
        VALUES(:".implode(",:",array_keys($this->values)).") ON DUPLICATE KEY UPDATE";
        var_dump($requete);
        
    }

    public function delete(){

    }

}

?>