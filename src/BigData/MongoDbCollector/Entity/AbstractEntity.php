<?php
/*
 * @author Dmytro Nekrasov <nekrasov.dmytro@gmail.com>
 * @see http://lviniy-web.org
 * */

namespace BigData\MongoDbCollector\Entity;


abstract class AbstractEntity
{
    /*
     * @var array $data
     * */
    protected $data;

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /*
     * @return mixed
     * */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /*
     * @return array
     * */
    final public function getData()
    {
        $properties = $this->getProperties();

        return array_merge($properties, $this->data);
    }

    /*
     * @parma array data
     * */
    final public function setData(array $data)
    {
        $this->data = $data;
    }

    protected function getProperties()
    {
        $properties = get_object_vars($this);
        unset($properties['data']);

        return $properties;
    }
}