(function(category_app){
	
		var categoryCtrl;

		categoryCtrl = function($scope,CategoryService){
		var vm = this;
		
		vm.flash = {
			isError: false,
			isSuccess: false,
			flashMessage: "Sample error message"
		};
		
		vm.category_model = {
			cat_id: 0,
			cat_name: "",
			cat_parent_id: 0
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
			CategoryService
			.getCategories()
			.then(function(payload){//success
				vm.categories = payload.data;
			},function(errorPayload){//error				
				vm.flashErrorMessage("Error while featching categories");
			});
		};
		// add new category click handler
		vm.addCategory = function(){
			vm.category_model.cat_id 		= 0;
			vm.category_model.cat_name 		= "";
			vm.category_model.cat_parent_id = 0;
			vm.model_title 					= "Add New Category";
		};

		// save new category click handler
		vm.saveCategory = function(category_form){
			
			if(category_form.$valid){// if form is valid than save
				CategoryService
				.saveCategory(vm.category_model).success(function(data){
					$('#myModal').modal('hide');
					if(data.status){
						vm.flashSucessMessage(data.response_message);
					}else{
						vm.flashErrorMessage(data.response_message);
					}
					vm.initCategories();
				}).error(function(data){
					console.log("Error:"+data);
					vm.flashErrorMessage("Error while saving new category");
				});
			}
		};
		// edit category click handler
		 vm.editCategory = function(category){
		 	
			vm.category_model.cat_id = category.category_id;
			vm.category_model.cat_name = category.category_name;
			vm.category_model.cat_parent_id = category.parent_id;
			vm.model_title = "Update category '"+category.category_name+"'";
		};

		// save new category click handler
		vm.updateCategory = function(category_form){
			
			if(category_form.$valid){// if form is valid than update
				CategoryService
				.updateCategory(vm.category_model).success(function(data){
					$('#myModal').modal('hide');
					if(data.status){
						vm.flashSucessMessage(data.response_message);
					}else{
						vm.flashErrorMessage(data.response_message);
					}
					vm.initCategories();
				}).error(function(data){
					console.log("Error:"+data);
					vm.flashErrorMessage("Error while saving new category");
				});
			}
		};
		// delete category click handler		
		 vm.deleteCategory = function(category){
		 	
			if(confirm("Are you sure to delete this category?")){
				CategoryService
				.deleteCategory(category).success(function(data){
					if(data.status){
						vm.flashSucessMessage(data.response_message);
					}else{
						vm.flashErrorMessage(data.response_message);
					}
					vm.initCategories();
				}).error(function(data){
					console.log("Error:"+data);
					vm.flashErrorMessage("Error while deleting category");
				});
			}
		};
	};

	//inject dependancies in controller
	categoryCtrl.$inject = ["$scope","CategoryService"];

	
	//Register controller
	category_app.controller("categoryCtrl",categoryCtrl);

}(angular.module("category_app")));