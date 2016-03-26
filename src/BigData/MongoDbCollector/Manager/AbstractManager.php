<?php
/*
 * @author Dmytro Nekrasov <nekrasov.dmytro@gmail.com>
 * @see http://lviniy-web.org
 * */

namespace BigData\MongoDbCollector\Manager;

use \MongoClient as MongoClient;
use \MongoCollection as MongoCollection;

abstract class AbstractManager
{
    protected $connection;
    protected $db;
    protected $collection;


    public function __construct()
    {
        $this->connection = new MongoClient("localhost");
        $this->db = $this->getConnection()->selectDB($this->getMongoDataBaseName());
        $this->collection =  new MongoCollection($this->getMongoDataBase(), $this->getCollectionName());
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
        return $this->db;
    }

    /*
     * @return MongoCollection
     * */
    public function getMongoCollection()
    {
        return $this->collection;
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