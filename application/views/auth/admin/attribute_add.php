<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="p-5 text-primary-500">Add New Attribute</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form action="<?php echo site_url('adm/attprocess') ?>" method="post">
        <div class="form-group">
        <input type="text" class="form-control" name="lookupname" placeholder="Set lookup name" required>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="attname" placeholder="Set the name of attribute" required>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="attvalue" placeholder="Set attribute value" required>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block" style="width:50%; margin:auto;">
        <i class="fas fa-check-circle"></i>  Save changes
        </button>
      </form>
      </div>
    </div>
  </div>
  </div>
      <!-- End Content -->
</div>
<!-- Wrapper -->
    </div>
  </div>
</body>
</html>