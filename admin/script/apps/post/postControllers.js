(function(post_app){
	
		var postCtrl;

		postCtrl = function($scope,PostService){
		var vm = this;
		
		vm.flash = {
			isError: false,
			isSuccess: false,
			flashMessage: "Sample error message"
		};
		
		vm.post_model = {
			post_id: 0
		};

		vm.model_title = "Add New Category";
		
		vm.flashErrorMessage = function(message){
			vm.flash.isError 		= true;
			vm.flash.isSuccess 		= false;
			if(message)
				vm.flash.flashMessage 	= message;
			else
				vm.flash.flashMessage 	= "Error while performing operation.";
		};

		vm.flashSucessMessage = function(message){
			vm.flash.isError 		= false;
			vm.flash.isSuccess 		= true;
			vm.flash.flashMessage 	= message;
		};

		vm.hideFlash = function(){
			vm.flash.isError 		= false;
			vm.flash.isSuccess 		= false;
			vm.flash.flashMessage 	= "";
		};
		//fetching categories through api
		vm.initCategories = function(){
			vm.categories = [];
			PostService
			.getCategories()
			.then(function(payload){//success
				vm.categories = payload.data;
			},function(errorPayload){//error				
				vm.flashErrorMessage("Error while featching categories");
			});
		};
		
		//fetching posts through api
		vm.initPosts = function(category){
			console.log(category);
			vm.posts = [];
			PostService
			.getPosts(category)
			.then(function(payload){//success
				vm.posts = payload.data;
			},function(errorPayload){//error				
				vm.flashErrorMessage("Error while featching posts");
			});
		};
		
		// delete post click handler		
		 vm.deletePost = function(post){
		 	
			if(confirm("Are you sure to delete this post?")){
				PostService
				.deletePost(post).success(function(data){
					if(data.status){
						vm.flashSucessMessage(data.response_message);
					}else{
						vm.flashErrorMessage(data.response_message);
					}
					vm.initPosts();
				}).error(function(data){
					console.log("Error:"+data);
					vm.flashErrorMessage("Error while deleting post");
				});
			}
		};
	};

	//inject dependancies in controller
	postCtrl.$inject = ["$scope","PostService"];

	
	//Register controller
	post_app.controller("postCtrl",postCtrl);

}(angular.module("post_app")));