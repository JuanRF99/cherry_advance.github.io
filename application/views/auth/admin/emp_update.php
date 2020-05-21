<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <!-- Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('message') ) { ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	  <p class="mb-0"><i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('message');?></p>
  </div>
<?php } ?>  
  <h3 class="p-5 text-primary-500">Update Employee Data</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form action="<?php echo site_url('adm/emp_updateprocess'.(isset($profile) && isset($profile) && !!$profile['employeecode'] ? '/'.$profile['employeecode'] : '')) ?>" method="post" enctype='multipart/form-data'>
        <p title="Show/Hide Form"  class="btn" data-toggle="collapse" href="#collapseTarget" role="button" aria-expanded="false" aria-controls="collapseTarget">
        <i title="Show/Hide Form" class="fas fa-eye"></i></i> Employee Early Data </p>
        <div class="collapse" id="collapseTarget">
            <label for="name">Employee's Name</label>
            <div class="form-group">
              <input type="text" class="form-control" name="name" disabled value="<?= $profile['employeename'] ?>">
            </div>
            <label for="phone_number">Phone Number</label>
            <div class="form-group">
              <input type="text" maxlength="13" class="form-control" name="phone_number" value="<?= $profile['phone_number'] ?>">
            </div>
        </div>

        <br>

        <p title="Show/Hide Form" class="btn" data-toggle="collapse" href="#collapseBank" role="button" aria-expanded="false" aria-controls="collapseBank">
        <i title="Show/Hide Form" class="fas fa-eye"></i></i> Employee Bank Data</p>
        <div class="collapse" id="collapseBank">
          <div class="form-group">
            <label for="bankname">Bank Name</label>
            <select class="form-control" name="bankname">
              <?php foreach ($banks as $bank) { ?>
              <option value="<?php echo $bank['code']; ?>"><?php echo $bank['value']; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="bankaccount_number">Bank Account Number</label>
            <input type="text" name="bankaccount_number" class="form-control" value="<?= $profile['bankaccount_number'] ?>">
          </div>
          <div class="form-group">
            <label class="control-label" for="bankaccount_name">Bank Account Name</label>
            <input type="text" name="bankaccount_name" class="form-control" value="<?= $profile['bankaccount_name'] ?>">
          </div>
          <div class="form-group">
            <label class="control-label" for="limitcost">Limit Cost</label>
            <input type="number" name="limitcost" class="form-control" value="<?= $profile['limitcost'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
            <input type="radio" name="employeestatus" value="1"> &nbsp;<i>Activate this employee</i>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="radio" checked name="employeestatus" value="0"> &nbsp;<i>Inactive this employee</i>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block" style="width:50%; margin:auto;">
            <i class="fas fa-check-circle"></i> Update Profile
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