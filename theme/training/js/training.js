blocksConfig.trainingComments={
    "template": "/templates/blocks/trainingComments.html",
    "internalDependencies":["/src/modules/rubedoBlocks/controllers/TrainingCommentsController.js"]
};

angular.module("rubedoDataAccess").factory('CommentsService', ['$http',function($http) {
    var serviceInstance={};
    serviceInstance.getComments=function(){
        return ($http.get("api/v1/comments"));
    };
    serviceInstance.createComment=function(comment){
        return ($http({
            url:"api/v1/comments",
            method:"POST",
            data : {
                comment:comment
            }
        }));
    };
    return serviceInstance;
}]);