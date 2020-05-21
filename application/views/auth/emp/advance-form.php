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
  <h3 class="pl-5 pt-4 text-primary-500">Advance Form</h3>
  <h6 class="pl-5"><?= $newID ?></h6>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form action="<?php echo site_url('emp/advanceprocess') ?>" method="post" enctype='multipart/form-data'>
        <input type="text" name="formcode" value="<?= $newID ?>" hidden>
        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestor">Requestor</label>
              <input type="text" name="requestor" class="form-control" value="<?= $this->session->userdata('nama') ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="leavedate">Leave Date</label>
              <input type="date" name="leavedate" id="leavedate" class="form-control">
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestedcost">Request Amount</label>
              <input type="number" name="requestedcost" id="requestedcost" class="form-control">
              <input type="text" name="reqamt" id="reqamt" class="form-control" value="<?= $lcost['lcost'] ?>" hidden>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="destination">Destination</label>
              <input type="text" name="destination" class="form-control" id="destination" placeholder="ex : Surabaya, Jakarta, etc..">
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="untildate">Until Date</label>
              <input type="date" name="untildate" class="form-control" id="untildate">
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="notes">Notes</label>
              <input type="text" name="notes" class="form-control" id="notes">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="purpose">Trip Purpose</label>
              <input type="text" name="trippurpose" class="form-control" id="purpose" placeholder="ex : Meeting, UAT, etc..">
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="reminder">Set Reminder Date</label>
              <input type="date" name="reminderdate" class="form-control" id="reminder">
            </div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-block" style="width:50%; margin:auto;" id="advanceform">
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