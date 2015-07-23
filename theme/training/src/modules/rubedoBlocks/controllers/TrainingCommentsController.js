angular.module("rubedoBlocks").lazy.controller("TrainingCommentsController",["$scope","CommentsService",
    function($scope,CommentsService){
        var me = this;
        var config = $scope.blockConfig;
        CommentsService.getComments().then(
            function(response){
                me.comments=response.data.comments;
            },
            function(response){

            }

        );
    }]);