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
    public function getData()
    {
        return $this->data;
    }

    /*
     * @parma array data
     * */
    public function setData(array $data)
    {
        $this->data = $data;
    }
}