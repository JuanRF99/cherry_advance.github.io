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
  <h3 class="p-5 text-primary-500">Add Employee</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form action="<?php echo site_url('adm/employeedataprocess') ?>" method="post" enctype='multipart/form-data'>
      <div class="nav-wrapper">
        <ul class="nav nav-tabs" id="emptab" >
            <li class="nav-item">
                <a href="#empinfo" class="nav-link" id="info-tab" data-toggle="tab" role="tab" aria-controls="empinfo">Employee Info</a>
            </li>

            <li class="nav-item">
                <a href="#empacc" class="nav-link" id="acc-tab" data-toggle="tab" role="tab" aria-controls="empacc">Employee Account</a>
            </li>

            <li class="nav-item">
                <a href="#empbank" class="nav-link" id="bank-tab" data-toggle="tab" role="tab" aria-controls="empbank">Employee Bank Account</a>
            </li>

            <li class="nav-item">
              <input type="reset" class="btn btn-warning">
            </li>
        </ul>
      </div>
        <div class="tab-content p-4">
            <div class="tab-pane fade" id="empinfo" role="tabpanel" aria-labelledby="info-tab">
            <label for="name">Employee's Name</label>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" required placeholder="ex : annonymous">
            </div>
            <label for="joindate">Join Date</label>
            <div class='form-group'>
              <input type="date" class="form-control" id="joindate" name="joindate" required>
            </div>
            <label for="phone_number">Phone Number</label>
            <div class="form-group">
              <input type="text" maxlength="13" class="form-control" id="phone_number" name="phone_number" required placeholder="08xxxxx">
            </div>
            <div class="form-group">
            <label for="religion">Religion</label>
            <select class="form-control" name="religioncode">
            <?php foreach ($religions as $religion) { ?>
              <option value="<?php echo $religion['code']; ?>" name="religioncode"><?php echo $religion['value']; ?></option>
              <?php  } ?>
            </select>
          </div>
            </div>

            <div class="tab-pane fade" id="empacc" role="tabpanel" aria-labelledby="acc-tab">
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required maxlength="15" placeholder="abcd_alphabet">
            <small><i>Put username with no space</i></small>
          </div>
            <div class="form-group">
            <label for="email">Employee's Email</label>
              <input type="email" class="form-control" name="email" required placeholder="ex : user@mail.com">
            </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="role">Role Employee</label>
            <select class="form-control" name="rolecode">
              <option value="EMP">Employee</option>
              <option value="ADM">Admin</option>
            </select>
          </div>
            </div>

            <div class="tab-pane fade" id="empbank" role="tabpanel" aria-labelledby="bank-tab">
            <div class="form-group">
            <label for="bankname">Bank Name</label>
            <select class="form-control" name="bankname">
              <?php foreach ($banks as $bank) { ?>
              <option value="<?php echo $bank['code']; ?>"><?php echo $bank['value']; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="bankaccount_number">Bank Account Number</label>
            <input type="text" name="bankaccount_number" required class="form-control" placeholder="ex : 909728192312">
          </div>
          <div class="form-group">
            <label for="bankaccount_name">Bank Account Name</label>
            <input type="text" name="bankaccount_name" required class="form-control" placeholder="ex : Account Name">
          </div>
          <div class="form-group">
            <label for="limitcost">Limit Cost</label>
            <input type="number" name="limitcost" required class="form-control">
          </div>
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
        
        <button type="submit" class="btn btn-block" style="width:50%; margin:auto;">
            <i class="fas fa-check-circle"></i> Add Data
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