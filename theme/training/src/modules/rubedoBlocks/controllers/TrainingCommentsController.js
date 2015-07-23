angular.module("rubedoBlocks").lazy.controller("TrainingCommentsController",["$scope","CommentsService","$route",
    function($scope,CommentsService,$route){
        var me = this;
        var config = $scope.blockConfig;
        me.newComment=null;
        me.loadComments=function(){
            CommentsService.getComments(me.contentId).then(
                function(response){
                    me.comments=response.data.comments;
                }
            );
        };
        me.createComment=function(){
            if (me.newComment){
                CommentsService.createComment(me.newComment,me.contentId).then(
                    function(response){
                        me.newComment=null;
                        me.loadComments();
                    }
                );
            }
        };
        var routeArray=angular.copy($route.current.params.routeline).split("/");
        me.contentId=routeArray[routeArray.length-2];
        me.loadComments();
    }]);