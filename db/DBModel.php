<?php

namespace aep\phpmvc\db;

use aep\phpmvc\Model;
use aep\phpmvc\Application;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

abstract class DBModel extends Model {
    abstract public static function tableName() : string;
    abstract public function attributes() : array;
    abstract public static function primaryKey() : string;
    
    public function save() {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($m) => ":$m", $attributes);

        $statement = self::prepare("insert into $tableName 
                                    (" . implode(',',$attributes) . ")
                                    values (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function prepare($sql) {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function findOne($where) {
        $tableName = static::tableName();
        $attributes = array_keys($where);

        $sql = implode("AND ", array_map(fn($m) => "$m = :$m", $attributes));
        $statement = static::prepare("select * from $tableName where $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();

        return $statement->fetchObject(static::class);
    }
}

