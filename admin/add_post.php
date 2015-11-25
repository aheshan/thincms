<?php
require '../vendor/autoload.php';

include_once 'api/add_post_api.php';
include_once 'partials/header.php';
?>
 <link rel="stylesheet" type="text/css" href="css/vendor/trix.css">
<div class="container" >

  <ul class="breadcrumb breadcrumb_pad">
    <li><a href="posts.php">All Posts</a></li>
    <li class="active"><?php echo $page_title;?></li>
  </ul>
  <h1><?php echo $page_title;?></h1>
  
  <?php
    if(!empty($response["response_message"] )){
      if($response["status"]){
     ?>
      <div class="alert  alert_padding alert-success" role="alert"
              ng-if="catCtrl.flash.isSuccess">
           <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <?php echo $response["response_message"];?>
      </div>
    <?php
       }else{
     ?>
      <div class="alert  alert_padding alert-danger" role="alert"
              ng-if="catCtrl.flash.isError">
           <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
         <?php echo $response["response_message"];?>
        </div>
  <?php
      } 
    }
   ?>

  <form class="form" method="post">
  <div class="col-lg-9">
    
      <!-- Text input-->
      <div class="form-group">
        <label class="control-label" for="post_title">Post Title</label>
        
        <input id="textinput" name="post_title" type="text" placeholder="Post Title" 
        class="form-control input-md" required="" value="<?php echo $post_obj->getPost_title();?>">
        
        
      </div>
      <!-- Textarea -->
      <div class="form-group">
        <label class="control-label" for="post_description">Post Description</label>
        <input id="post_description" name="post_description" value="<?php echo $post_obj->getPost_description();?>" type="hidden" name="content">
        <trix-editor input="post_description" style="min-height: 350px;"></trix-editor>
      </div>
    
  </div>
  <div class="col-lg-3">
    <div class="panel panel-default">
      <div class="panel-heading">Categories</div>
    <div class="panel-body">
      <?php foreach ($categories_objs as $categories_obj) { ?>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="<?php echo $categories_obj['category_id']?>" name="post_categories[]" 
            <?php if(in_array($categories_obj['category_id'], $post_obj_categories)) echo "checked"; else echo""; ?>/>
            <?php echo $categories_obj['category_name']?>
          </label>
        </div>
      <?php } ?>
    
    </div>
    </div>
    <input type="submit" class="btn btn-primary " value="Save" />
  </div>
  </form>
  </div><!-- /.container -->
  <?php
  include_once 'partials/vendor_scripts.php';
  ?>
  <script type="text/javascript" src="script/vendor/trix.js"></script>
  <?php
  include_once 'partials/footer.php';
  ?>