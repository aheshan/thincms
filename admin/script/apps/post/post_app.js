!function(){var post_app=angular.module("post_app",[]);post_app.factory("PostService",function($http){return{getCategories:function(){var category_promiss=$http.get("api/category_api.php?action=get_all");return category_promiss},getPosts:function(category){var post_promiss=null;return post_promiss=null!==category&&void 0!==category?$http.get("api/post_api.php?action=get_all&category_id="+category.category_id):$http.get("api/post_api.php?action=get_all")},deletePost:function(post){var post_promiss=$http.post("api/post_api.php?action=delete",post);return post_promiss}}})}();
!function(post_app){var postCtrl;postCtrl=function($scope,PostService){var vm=this;vm.flash={isError:!1,isSuccess:!1,flashMessage:"Sample error message"},vm.post_model={post_id:0},vm.model_title="Add New Category",vm.flashErrorMessage=function(message){vm.flash.isError=!0,vm.flash.isSuccess=!1,message?vm.flash.flashMessage=message:vm.flash.flashMessage="Error while performing operation."},vm.flashSucessMessage=function(message){vm.flash.isError=!1,vm.flash.isSuccess=!0,vm.flash.flashMessage=message},vm.hideFlash=function(){vm.flash.isError=!1,vm.flash.isSuccess=!1,vm.flash.flashMessage=""},vm.initCategories=function(){vm.categories=[],PostService.getCategories().then(function(payload){vm.categories=payload.data},function(errorPayload){vm.flashErrorMessage("Error while featching categories")})},vm.initPosts=function(category){console.log(category),vm.posts=[],PostService.getPosts(category).then(function(payload){vm.posts=payload.data},function(errorPayload){vm.flashErrorMessage("Error while featching posts")})},vm.deletePost=function(post){confirm("Are you sure to delete this post?")&&PostService.deletePost(post).success(function(data){data.status?vm.flashSucessMessage(data.response_message):vm.flashErrorMessage(data.response_message),vm.initPosts()}).error(function(data){console.log("Error:"+data),vm.flashErrorMessage("Error while deleting post")})}},postCtrl.$inject=["$scope","PostService"],post_app.controller("postCtrl",postCtrl)}(angular.module("post_app"));