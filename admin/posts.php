
  <?php
    include_once 'partials/header.php';
  ?>

<div class="container" ng-app="post_app" ng-controller="postCtrl as postCtr" ng-cloak ng-init="postCtr.initCategories();postCtr.initPosts();">
    <h1>Posts</h1>
    <a href="add_post.php" class="btn btn-sm btn-success" >Add New Post</a>
    
    <div class="pull-right">
      <div class="form-group">
        <label >Filter:</label>
       
        <select class="form-control" ng-model="categorySelected" ng-change="postCtr.initPosts(categorySelected)" 
         data-ng-options="category as category.category_name for category in postCtr.categories">
        <option value="">All Categories</option>
        </select>

    </div>
    </div>

    <div class="alert  alert_padding alert-danger" role="alert"
          ng-if="postCtr.flash.isError">
       <button type="button" class="close" ng-click="postCtr.hideFlash()">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      {{postCtr.flash.flashMessage}}
    </div>

  <div class="alert  alert_padding alert-success" role="alert"
          ng-if="postCtr.flash.isSuccess">
       <button type="button" class="close" ng-click="postCtr.hideFlash()">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      {{postCtr.flash.flashMessage}}
  </div>

    <table class="table">
    <thead >
      <tr>
        <th>#Id</th>
        <th>Post Title</th>
        <th>Date Posted</th>
        <th>Categories</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="post in postCtr.posts">
        <td>{{post.post_id}}</td>
        <td>{{post.post_title}}</td>
        <td>{{post.post_date}}</td>
        <td>{{post.post_categories }}</td>
        <td>
          <a href="add_post.php?post_id={{post.post_id}}" class="btn btn-sm btn-primary" 
            title="Edit" >
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </a>
          <button type="submit" class="btn btn-sm btn-danger" 
          title="Delete" ng-click="postCtr.deletePost(post)">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>
        
      </tr>
      
    </tbody>
  </table>
  
 
</div><!-- /.container -->

<?php
  include_once 'partials/vendor_scripts.php';
?>
<script type="text/javascript" src="script/apps/post/post_app.js"></script>
<?php
  include_once 'partials/footer.php';
?>