<?php
namespace RubedoTraining\Rest\V1;

use Rubedo\Services\Manager;
use RubedoAPI\Entities\API\Definition\FilterDefinitionEntity;
use RubedoAPI\Entities\API\Definition\VerbDefinitionEntity;
use RubedoAPI\Rest\V1\AbstractResource;


class CommentsResource extends AbstractResource {
    function __construct()
    {
        parent::__construct();
        $this->define();
    }

    public function getAction($params)
    {
        $comments=Manager::getService("TrainingComments")->getList();
        return array(
            'success' => true,
            'comments'=>$comments["data"]
        );
    }


    protected function define()
    {
        $this
            ->definition
            ->setName('Comments')
            ->setDescription('Comments for training block ')
            ->editVerb('get', function(VerbDefinitionEntity &$entity) {
                $entity
                    ->setDescription('Get all comments')
                    ->addOutputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('Comments')
                            ->setKey('comments')
                            ->setRequired()
                    );
            });
    }
} 