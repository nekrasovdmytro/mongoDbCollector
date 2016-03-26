<?php
/*
 * @author Dmytro Nekrasov <nekrasov.dmytro@gmail.com>
 * @see http://lviniy-web.org
 * */

namespace BigData\MongoDbCollector\Manager;

use BigData\MongoDbCollector\Entity\AbstractEntity;

abstract class AbstractMongoManager extends AbstractManager
{
    protected $entity;
    protected $_id = null;

    public function preset(AbstractEntity $entity)
    {
        $this->entity = $entity;

        return $this;
    }

    protected function getEntityData()
    {
        return $this->entity->getData();
    }

    /*
     * @return bool
     * */
    public function insert()
    {
        $items = $this->getEntityData();

        $this->getMongoCollection()->insert($items);
        $this->_id = $items['_id'];

        return (bool)$this->_id;
    }

    /*
     * @return bool
     * */
    public function remove()
    {
        $criteria = $this->getEntityData();

        return $this->getMongoCollection()->remove($criteria);
    }

    /*
     * @return bool
     * */
    public function removeById($_id)
    {
        $criteria = [
            '_id' => new \MongoId($_id),
        ];

        return $this->getMongoCollection()->remove($criteria);
    }

    public function update()
    {
        $data = $this->getEntityData();

        return $this->getMongoCollection()->save($data);
    }

    /*
     * @param AbstractEntity $entity
     * */
    public function findOne(AbstractEntity $entity)
    {
        $data = $this->getMongoCollection()->findOne($entity->getData());
        $entity->setData($data);

        $this->entity = $entity;

        return $this->entity;
    }

    /*
     * @param array $criteria
     * @param array $retrieveFields, by this param you can set which fields should be retrieved in query
     * */
    public function find(array $criteria = [], array $retrieveFields = [])
    {
        return $this->getMongoCollection()->find($criteria, $retrieveFields);
    }

    /*
     * @return string, should be like a hash
     * */
    public function getInsertId()
    {
        return $this->_id;
    }
}