<?php

namespace BigData\Bundle\BigDataBundle\Model\Mongo\Manager;

class PatientManager extends AbstractBaseManager
{
    public function getCollectionName()
    {
        return 'patient';
    }
}