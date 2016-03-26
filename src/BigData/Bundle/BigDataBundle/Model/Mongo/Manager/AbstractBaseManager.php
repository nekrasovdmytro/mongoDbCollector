<?php

namespace BigData\Bundle\BigDataBundle\Model\Mongo\Manager;

use BigData\MongoDbCollector\Manager\AbstractMongoManager;

abstract class AbstractBaseManager extends AbstractMongoManager
{
    public function getMongoDataBaseName()
    {
        return 'maindb';
    }
}