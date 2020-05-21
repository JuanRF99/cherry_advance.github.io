<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">

<?php if ($this->session->flashdata('message') ) { ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <p class="mb-0"><i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('message');?></p>
  </div>
<?php } ?>

  <!-- Content -->
  <div class="container-fluid">
  <h3 class="pl-5 pt-4 text-primary-500">Approval
  </h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form method="post" action="<?php echo site_url('adm/approval_process'.(isset($approve) && isset($approve) &&  !!$approve['id'] ? '/'.$approve['id'] :'')) ?>" enctype='multipart/form-data'>
      <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestor">Requestor</label>
              <input type="text" name="requestor" class="form-control" value="<?= $approve['name'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="leavedate">Leave Date</label>
              <input type="text" name="leavedate" id="leavedate" class="form-control" value="<?= $approve['leavedate'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="coveredamount">Approve Amount</label>
              <input type="text" name="coveredamount" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="destination">Destination</label>
              <input type="text" name="destination" class="form-control" id="destination" value="<?= $approve['destination'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="untildate">Until Date</label>
              <input type="text" name="untildate" class="form-control" id="untildate" value="<?= $approve['untildate'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="destination">Notes</label>
              <input type="text" name="notes" class="form-control" id="notes" value="<?= $approve['notes'] ?>" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="purpose">Trip Purpose</label>
              <input type="text" name="trippurpose" class="form-control" id="purpose" placeholder="<?= $approve['trippurpose'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestedcost">Request Amount</label>
              <input type="text" name="requestedcost" id="requestedcost" class="form-control" value="<?= $approve['requestedcost'] ?>" disabled>
            </div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-block" style="width:50%; margin:auto;">
            <i class="fas fa-check-circle"></i> Submit
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