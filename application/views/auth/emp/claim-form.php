<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="pl-5 pt-4 text-primary-500">Claim Form
      <br><span><small><i>Fill this form completely!</i></small></span>
  </h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <form method="post" action="<?php echo site_url('emp/claimprocess'.(isset($claim) && isset($claim) &&  !!$claim['id'] ? '/'.$claim['id'] :'')) ?>" enctype='multipart/form-data'>
      <input type="hidden" name="leavecode" value="<?= $claim['leaveCode'] ?>">
      <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestor">Requestor</label>
              <input type="text" name="requestor" class="form-control" value="<?= $claim['name'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="leavedate">Leave Date</label>
              <input type="text" name="leavedate" id="leavedate" class="form-control" value="<?= $claim['leavedate'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="coveredamount">Covered Amount</label>
              <input type="text" name="coveredamount" class="form-control" value="<?= $claim['approvedcost'] ?>" id="coveredamount" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="destination">Destination</label>
              <input type="text" name="destination" class="form-control" id="destination" value="<?= $claim['destination'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="untildate">Until Date</label>
              <input type="text" name="untildate" class="form-control" id="untildate" value="<?= $claim['untildate'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="attachment">Attach</label>
              <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="purpose">Trip Purpose</label>
              <input type="text" name="trippurpose" class="form-control" id="purpose" placeholder="<?= $claim['trippurpose'] ?>" disabled>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="requestedcost">Request Amount</label>
              <input type="text" name="requestedcost" id="requestedcost" class="form-control" value="<?= $claim['requestedcost'] ?>" disabled>
            </div>
          </div>
        </div>

        <p><small>Description of Purchase <i class="text-danger">(You can add a row by clicking the add button)</i></small></p>
        <table id="detailrow" class="table table-bordered table-striped text-primary">
          <thead>
          <tr>
            <th>
            <a class="btn text-success" id="addbut"><i class="fas fa-plus-circle"></i></a>
            <a class="btn text-danger" id="deletebut"><i class="fas fa-minus-circle"></i></a>
            </th>
            <th>Description</th>
            <th>Amount</th>
            <th>Notes / Comment</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <input type="checkbox" class="form-control" name="actionrows">
            </td>
            <td>
              <input type="text" class="form-control" name="description[]" required>
              <input type="hidden" name="jumlahrow[]" id="jumlahrow" value="0">
            </td>
            <td>
              <input type="number" class="form-control" name="amount[]" id="amount" required>
            </td>
            <td>
              <input type="text" class="form-control" name="notes[]">
            </td>
          </tr>
          </tbody>
        </table>
        
        </div>
        </div>
        <button type="submit" class="btn btn-block" id="ac" style="width:50%; margin:auto;">
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