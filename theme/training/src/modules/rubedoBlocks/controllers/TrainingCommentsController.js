angular.module("rubedoBlocks").lazy.controller("TrainingCommentsController",["$scope","CommentsService",
    function($scope,CommentsService){
        var me = this;
        var config = $scope.blockConfig;
        me.newComment=null;
        me.loadComments=function(){
            CommentsService.getComments().then(
                function(response){
                    me.comments=response.data.comments;
                }
            );
        };
        me.createComment=function(){
            if (me.newComment){
                CommentsService.createComment(me.newComment).then(
                    function(response){
                        me.newComment=null;
                        me.loadComments();
                    }
                );
            }
        };
        me.loadComments();
    }]);