
  <?php
    include_once 'partials/header.php';
  ?>

<div class="container">
    <h1>Categories</h1>
    <button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Add Category</button>
    <table class="table">
    <thead>
      <tr>
        <th>#Id</th>
        <th>Category Name</th>
        
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Mark</td>
        
        <td>
          <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip"  title="Edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
          <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip"  title="Delete">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>
        
      </tr>
      
    </tbody>
  </table>
  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent</label>
            <select class="form-control">
              <option>Select Parent</option>
              <option>Root</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div><!-- /.container -->

<?php
  include_once 'partials/vendor_scripts.php';
?>

<!-- App javascript -->
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>
<!--<script src="scripts/apps/categories/category.min.js"></script>    -->
<?php
  include_once 'partials/footer.php';
?>