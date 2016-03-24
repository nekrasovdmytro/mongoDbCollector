<?php
/*
 * @author Dmytro Nekrasov <nekrasov.dmytro@gmail.com>
 * @see http://lviniy-web.org
 * */

namespace BigData\MongoDbCollector\Manager;

use \MongoClient as MongoClient;

abstract class AbstractManager
{
    protected $connection;


    public function __construct()
    {
        $this->connection = new MongoClient("localhost");
    }

    /*
     * @return MongoClient
     * */
    public function getConnection()
    {
        return $this->connection;
    }

    /*
     * @return MongoDb
     * */
    public function getMongoDataBase()
    {
        return $this->getConnection()->{$this->getMongoDataBaseName()};
    }

    /*
     * @return MongoCollection
     * */
    public function getMongoCollection()
    {
        return $this->getMongoDataBase()->{$this->getCollectionName()};
    }

    /*
     * @return string
     * Method getCollectionName should return name of mongoDB database
     * */
    abstract public function getMongoDataBaseName();

    /*
     * @return string
     * Method getCollectionName should return name of mongoDB collection
     * */
    abstract public function getCollectionName();
}