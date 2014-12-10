(function(){
	var category_app = angular.module("category_app",[]);
	
	category_app.factory('CategoryService', function( $http) {
		return{
			getCategories: function(){
				var category_promiss= $http.get("api/category_api.php?action=get_all");			
				return category_promiss;
			},
			updateCategory: function(category){
				var category_promiss= $http.post("api/category_api.php?action=update",category);			
				return category_promiss;
			},
			saveCategory: function(category){
				var category_promiss= $http.post("api/category_api.php?action=save",category);			
				return category_promiss;
			},
			deleteCategory: function(category){
				var category_promiss= $http.post("api/category_api.php?action=delete",category);			
				return category_promiss;	
			}
		};
	});

}());

