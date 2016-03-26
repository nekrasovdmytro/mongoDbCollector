<?php

namespace BigData\Bundle\BigDataBundle\Model\Mongo\Entity;

use BigData\MongoDbCollector\Entity\AbstractEntity;

class Patient extends AbstractEntity
{
    protected $name;
    protected $birthday;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
}