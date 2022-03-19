<?php


namespace MVC\models;

class Languages extends AbstractModel
{
    public $id;
    public $name;
    public $dir="ltr";

    public static $tableName = 'languages';
    public static $primaryKey = 'id';
    public static $uniqueKey = 'name';
    public static $timeCol = '';
    public static $tableSchema = [
        'id'            =>  self::DATA_TYPE_INT,
        'name'          =>  self::DATA_TYPE_STR,
        'dir'           =>  self::DATA_TYPE_STR
    ];
    public static $tableProbs = [
        'id'    => [
            'INT NOT NULL AUTO_INCREMENT PRIMARY KEY'
            ],
        'name'  => [
            'VARCHAR(2) NOT NULL'
        ],
        'dir'   => [
            'ENUM("ltr","rtl") NOT NULL DEFAULT "ltr"'
        ]
    ];

    public static $tableKey = [];
}
