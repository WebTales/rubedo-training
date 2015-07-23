blocksConfig.trainingComments={
    "template": "/templates/blocks/trainingComments.html",
    "internalDependencies":["/src/modules/rubedoBlocks/controllers/TrainingCommentsController.js"]
};

angular.module("rubedoDataAccess").factory('CommentsService', ['$http',function($http) {
    var serviceInstance={};
    serviceInstance.getComments=function(contentId){
        return ($http.get("api/v1/comments",{params:{contentId:contentId}}));
    };
    serviceInstance.createComment=function(comment,contentId){
        return ($http({
            url:"api/v1/comments",
            method:"POST",
            data : {
                comment:comment,
                contentId:contentId
            }
        }));
    };
    return serviceInstance;
}]);