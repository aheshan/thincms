
  <?php
    include_once 'partials/header.php';
  ?>

<div class="container" ng-app="category_app" ng-controller="categoryCtrl as catCtrl" ng-cloak ng-init="catCtrl.initCategories()">
    <h1>Media</h1>
    <button type="submit" class="btn btn-sm btn-success" data-toggle="modal"
     data-target="#myModal" ng-click="catCtrl.addCategory()">Add New Media</button>
    
    <div class="alert  alert_padding alert-danger" role="alert"
          ng-if="catCtrl.flash.isError">
       <button type="button" class="close" ng-click="catCtrl.hideFlash()">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      {{catCtrl.flash.flashMessage}}
    </div>

  <div class="alert  alert_padding alert-success" role="alert"
          ng-if="catCtrl.flash.isSuccess">
       <button type="button" class="close" ng-click="catCtrl.hideFlash()">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
      </button>
      {{catCtrl.flash.flashMessage}}
  </div>

    <table class="table">
    <thead >
      <tr>
        <th>#Id</th>
        <th>Media Name</th>
        <th>Type</th>
        <th>Link</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="category in catCtrl.categories">
        <td>{{category.category_id}}</td>
        <td>{{category.category_name}}</td>
        <td>{{category.category_name}}</td>
        <td>{{(category.parent_id == null || category.parent_id == 0) ? "Root" : category.parent_id}}</td>
        <td>
          <button type="submit" class="btn btn-sm btn-primary" 
            title="Edit" ng-click="catCtrl.editCategory(category)" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
          <button type="submit" class="btn btn-sm btn-danger" 
          title="Delete" ng-click="catCtrl.deleteCategory(category)">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>
        
      </tr>
      
    </tbody>
  </table>
  
  
  <!-- Modal  to add or edit category form in model-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel" >{{catCtrl.model_title}}</h4>
      </div>
      <div class="modal-body">
        <form role="form" name="category_form">
          
          <div class="form-group" ng-class="{ 'has-error': category_form.cat_name.$invalid 
                    && (category_form.cat_name.$dirty || submitted)}" novalidate>

            <label for="exampleInputEmail1">Category Name
                <span class="text-danger">*</span>
            </label>
            
            <input type="text" class="form-control" id="exampleInputEmail1" name="cat_name"
             ng-model="catCtrl.category_model.cat_name" placeholder="Enter Category name" required>
             
             <p ng-show="category_form.cat_name.$invalid && !category_form.cat_name.$pristine"
              class="help-block">Category name is required.</p>
              
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent</label>
            <select class="form-control" ng-model="catCtrl.category_model.cat_parent_id">
              <option ng-repeat="category in catCtrl.categories" value="{{category.category_id}}">{{category.category_name}}</option>
              <option value="0">Root</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="catCtrl.saveCategory(category_form)" 
        ng-if="catCtrl.category_model.cat_id == 0 ">Save</button>

        <button type="button" class="btn btn-primary" ng-click="catCtrl.updateCategory(category_form)" 
        ng-if="catCtrl.category_model.cat_id != 0 ">Update</button>
      </div>
    </div>
  </div>
</div> <!-- model end -->
</div><!-- /.container -->

<?php
  include_once 'partials/vendor_scripts.php';
?>
<script type="text/javascript" src="script/apps/category/category_app.js"></script
<?php
  include_once 'partials/footer.php';
?>