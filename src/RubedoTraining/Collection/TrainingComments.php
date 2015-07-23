<?php

namespace RubedoTraining\Collection;
use Rubedo\Collection\AbstractCollection;

class TrainingComments extends AbstractCollection
{
    public function __construct()
    {
        $this->_collectionName = 'TrainingComments';
        parent::__construct();
    }
}