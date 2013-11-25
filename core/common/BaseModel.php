<?php
namespace core\common;

class BaseModel
{
    protected static $pdoConnection = null;

    public static function getConnection()
    {        
        if (null === self::$pdoConnection) {
            self::$pdoConnection = new \PDO('mysql:host=localhost;dbname=simple_blog', 'root', 'asd123456789', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'));
        }

        return self::$pdoConnection;
    }    
}
