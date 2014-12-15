(function(){
	var post_app = angular.module("post_app",[]);
	
	post_app.factory('PostService', function( $http) {
		return{
			getCategories: function(){
				var category_promiss= $http.get("api/category_api.php?action=get_all");			
				return category_promiss;
			},
			getPosts: function(category){
				var post_promiss = null;
				if(category!== null && category!== undefined)
					post_promiss= $http.get("api/post_api.php?action=get_all&category_id="+category.category_id);			
				else
					post_promiss= $http.get("api/post_api.php?action=get_all");			

				return post_promiss;
			},
			deletePost: function(post){
				var post_promiss = $http.post("api/post_api.php?action=delete",post);			
				return post_promiss;	
			}
		};
	});

}());

