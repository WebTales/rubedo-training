<?php
namespace RubedoTraining\Rest\V1;

use Rubedo\Services\Manager;
use RubedoAPI\Entities\API\Definition\FilterDefinitionEntity;
use RubedoAPI\Entities\API\Definition\VerbDefinitionEntity;
use RubedoAPI\Rest\V1\AbstractResource;
use WebTales\MongoFilters\Filter;

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
                    )->addInputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('ContentId')
                            ->setFilter('\\MongoId')
                            ->setKey('contentId')
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
                    )->addInputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('ContentId')
                            ->setFilter('\\MongoId')
                            ->setKey('contentId')
                            ->setRequired()
                    );
            });
    }

    public function getAction($params)
    {
        $filter=Filter::factory();
        $filter->addFilter(
            Filter::factory("Value")->setName("contentId")->setValue($params["contentId"])
        );
        $comments=Manager::getService("TrainingComments")->getList($filter);
        return array(
            'success' => true,
            'comments'=>$comments["data"]
        );
    }

    public function postAction($params)
    {
        $newComment=Manager::getService("TrainingComments")->create(array(
            "comment"=>$params["comment"],
            "contentId"=>$params["contentId"]
        ));
        return array(
            'success' => true,
        );
    }
}