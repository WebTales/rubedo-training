blocksConfig.trainingComments={
    "template": "/templates/blocks/trainingComments.html",
    "internalDependencies":["/src/modules/rubedoBlocks/controllers/TrainingCommentsController.js"]
};

angular.module("rubedoDataAccess").factory('CommentsService', ['$http',function($http) {
    var serviceInstance={};
    serviceInstance.getComments=function(){
        return ($http.get("api/v1/comments"));
    };
    return serviceInstance;
}]);