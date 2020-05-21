<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="p-5 text-primary-500">Update Attribute</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form action="<?php echo site_url('adm/att_update_process'.(isset($lookups) && isset($lookups) && !!$lookups['code'] ? '/'.$lookups['code'] : '')) ?>" method="post">
        <div class="form-group">
        <input type="text" class="form-control" name="lookupname" value="<?= $lookups['lookupname'] ?>">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="attname" value="<?= $lookups['name'] ?> ">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="attvalue" value="<?= $lookups['value'] ?>">
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