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
            })->editVerb('post', function(VerbDefinitionEntity &$entity) {
                $entity
                    ->setDescription('Create new comment')
                    ->identityRequired()
                    ->addInputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('Comment')
                            ->setFilter("string")
                            ->setKey('comment')
                            ->setRequired()
                    );
            });
    }

    public function getAction($params)
    {
        $comments=Manager::getService("TrainingComments")->getList();
        return array(
            'success' => true,
            'comments'=>$comments["data"]
        );
    }

    public function postAction($params)
    {
        $newComment=Manager::getService("TrainingComments")->create(array(
            "comment"=>$params["comment"]
        ));
        return array(
            'success' => true,
        );
    }
}