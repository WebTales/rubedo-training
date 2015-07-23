<?php

namespace RubedoTraining\Backoffice\Controller;

use Rubedo\Backoffice\Controller\DataAccessController;
use Rubedo\Services\Manager;

class TrainingCommentsController extends DataAccessController
{
    public function __construct()
    {
        parent::__construct();
        $this->_dataService = Manager::getService('TrainingComments');
    }
}